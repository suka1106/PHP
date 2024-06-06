<?php
    // 開始一個新的或恢復現有的 session
    session_start();

    // 移除 session 中的 "id" 變數，實現登出功能
    unset($_SESSION["id"]);

    // 顯示登出成功的訊息
    echo "登出成功....";

    // 使用 meta 標籤設定網頁在3秒後自動跳轉到 2.login.html 頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>