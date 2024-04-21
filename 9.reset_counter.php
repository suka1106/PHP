<?php
    // 開始新的 session 或者恢復之前的 session
    session_start();

    // 刪除 session 中的計數器值
    unset($_SESSION["counter"]);

    // 顯示重置成功的訊息
    echo "counter重置成功....";

    // 使用 meta 標籤設置網頁重新導向，在 2 秒後將用戶重定向到 8.counter.php 頁面
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";
?>
