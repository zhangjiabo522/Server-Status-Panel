Server-Status-Panel
服务器健康监测面板 - 介绍文档

Server Health Monitoring Dashboard - Introduction


---

📌 概述 | Overview

本服务器健康监测面板是一款轻量级的网页应用，可实时展示服务器的运行状态，包括 CPU 使用率、服务器运行时间等关键指标。适用于站长、运维人员或开发者，帮助他们快速掌握服务器的健康状况。

The Server Health Monitoring Dashboard is a lightweight web application that provides real-time server status, including CPU usage and uptime. It is ideal for website administrators, DevOps professionals, and developers to monitor server health efficiently.


---

🚀 主要功能 | Key Features

✅ 实时 CPU 监控 - 显示服务器 CPU 使用率，以百分比形式直观呈现。
✅ 服务器运行时间 - 以天、小时、分钟的格式显示服务器已运行时长。
✅ 黑暗模式 - 提供亮色和暗色主题，可自由切换。
✅ 自动刷新 - 每 5 秒自动更新数据，无需手动刷新页面。
✅ 错误处理 - 当服务器无法获取数据时，显示 "ERR" 并标记错误状态。

✅ Real-time CPU Monitoring - Displays the server’s CPU usage as a percentage.
✅ Server Uptime - Shows the server’s uptime in days, hours, and minutes.
✅ Dark Mode Support - Offers both light and dark themes with a toggle option.
✅ Auto Refresh - Updates data every 5 seconds without manual refresh.
✅ Error Handling - Displays "ERR" when the server data cannot be retrieved.


---

🖥️ 使用方法 | How to Use

1️⃣ 打开面板 - 在浏览器中访问网页，即可查看服务器状态。
2️⃣ 切换主题 - 点击右上角的 🌙 / ☀️ 按钮，可在亮暗模式之间切换。
3️⃣ 查看数据 - 面板会每 5 秒自动更新数据，无需手动刷新。
4️⃣ 检查错误 - 若某项数据显示 "ERR"，请检查服务器 API 是否正常运行。

1️⃣ Open the Dashboard - Access the webpage in your browser to view server status.
2️⃣ Switch Themes - Click the 🌙 / ☀️ button in the top-right corner to toggle between light and dark modes.
3️⃣ Monitor Data - The panel updates automatically every 5 seconds, no need for manual refresh.
4️⃣ Check Errors - If a metric shows "ERR", verify if the server API is functioning correctly.


---

⚙️ 技术支持 | Technical Support

前端技术 | Front-end: HTML, CSS, JavaScript

后端接口 | Back-end API: 服务器状态数据由 server_status.php 提供

兼容性 | Compatibility: 适用于 PC 和移动端浏览器（Chrome, Edge, Firefox, Safari）

托管 | Hosting: 可部署在任何支持 PHP 的服务器上

Front-end: HTML, CSS, JavaScript

Back-end API: Server status data provided by server_status.php

Compatibility: Works on PC and mobile browsers (Chrome, Edge, Firefox, Safari)

Hosting: Can be deployed on any PHP-supported server



---

🔧 自定义与扩展 | Customization & Extensions

📌 支持自定义 API - 你可以修改 fetchServerStatus() 方法，将数据源更换为自己的 API。
📌 新增指标 - 可在 status-grid 内添加更多 status-card，例如 内存占用、磁盘使用率、网络流量 等。
📌 UI 主题调整 - 可修改 CSS 变量，如 --primary, --success，来自定义配色方案。
📌 刷新频率 - 在 setInterval(fetchServerStatus, 5000); 处调整数据刷新间隔。

📌 Custom API Support - Modify the fetchServerStatus() function to fetch data from your own API.
📌 Additional Metrics - Add more status-card components in status-grid for metrics like memory usage, disk space, network traffic, etc.
📌 UI Theme Adjustments - Modify CSS variables like --primary, --success to customize the color scheme.
📌 Refresh Frequency - Adjust setInterval(fetchServerStatus, 5000); to change the update interval.


---

📄 许可协议 | License

本项目基于 MIT 许可证 开源，可自由修改和使用，但请保留原始作者署名。

This project is open-source under the MIT License. You are free to modify and use it, but please retain the original author attribution.




