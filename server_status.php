<?php
header('Content-Type: application/json');

// 获取CPU使用率
function getCpuUsage() {
    $load = sys_getloadavg();
    return $load[0]; // 返回1分钟负载平均值
}

// 获取内存使用率
function getMemoryUsage() {
    $memInfo = file_get_contents('/proc/meminfo');
    if ($memInfo) {
        preg_match_all('/(\w+):\s+(\d+)/', $memInfo, $matches);
        $memory = array_combine($matches[1], $matches[2]);
        $totalMemory = isset($memory['MemTotal']) ? $memory['MemTotal'] : 0;
        $freeMemory = isset($memory['MemFree']) ? $memory['MemFree'] : 0;
        $buffers = isset($memory['Buffers']) ? $memory['Buffers'] : 0;
        $cached = isset($memory['Cached']) ? $memory['Cached'] : 0;

        // 计算内存使用率（不使用缓存）
        $usedMemory = $totalMemory - ($freeMemory + $buffers + $cached);
        if ($totalMemory > 0) {
            $memoryUsage = ($usedMemory / $totalMemory) * 100;
            return round($memoryUsage, 2);
        }
    }
    return 0; // 如果无法计算内存使用率，返回0
}

// 获取磁盘使用率
function getDiskUsage() {
    $diskFree = disk_free_space("/");
    $diskTotal = disk_total_space("/");
    if ($diskTotal > 0) {
        $diskUsage = (($diskTotal - $diskFree) / $diskTotal) * 100;
        return round($diskUsage, 2);
    }
    return 0; // 如果无法计算磁盘使用率，返回0
}

// 获取服务器运行时间（秒）
function getUptime() {
    if (file_exists('/proc/uptime')) {
        $uptime = file_get_contents('/proc/uptime');
        return $uptime ? round(explode(' ', $uptime)[0]) . " seconds" : "Unknown";
    }
    return "Unknown"; // 如果无法读取系统时间，返回"Unknown"
}

// 获取网络流量（以KB/s为单位）
function getNetworkTraffic() {
    // 读取 /proc/net/dev 文件获取网络流量数据
    $netDev = file_get_contents('/proc/net/dev');
    if ($netDev) {
        $lines = explode("\n", $netDev);
        foreach ($lines as $line) {
            if (strpos($line, 'eth0:') !== false || strpos($line, 'enp0s3:') !== false) { // 适配常见的网络接口名称
                $parts = explode(':', $line);
                $data = array_map('trim', explode(' ', $parts[1]));
                $rxBytes = $data[0]; // 接收字节数
                $txBytes = $data[8]; // 发送字节数
                $totalBytes = $rxBytes + $txBytes; // 总流量（字节）
                return round($totalBytes / 1024, 2); // 转换为KB
            }
        }
    }
    return 0; // 如果无法获取网络流量数据，返回0
}

// 获取服务器负载（1分钟、5分钟、15分钟）
function getLoadAverage() {
    $load = sys_getloadavg();
    return round($load[0], 2); // 返回1分钟负载
}

// 组装返回数据
$status = [
    'cpu' => getCpuUsage(),
    'memory' => getMemoryUsage(),
    'disk' => getDiskUsage(),
    'uptime' => getUptime(),
    'network' => getNetworkTraffic(),
    'loadAverage' => getLoadAverage()
];

echo json_encode($status);
?>
