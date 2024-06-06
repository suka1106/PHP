<?php
    // 關閉錯誤報告
    error_reporting(0);

    // 開始一個新的或恢復現有的 session
    session_start();

    // 檢查是否已登入（是否有設定 session 中的 "id" 變數）
    if (!$_SESSION["id"]) {
        // 如果尚未登入，顯示提示訊息並在3秒後跳轉到登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        // 如果已登入，建立資料庫連結
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 構建刪除佈告的 SQL 命令
        $sql = "delete from bulletin where bid='{$_GET["bid"]}'";
        
        // 執行 SQL 命令並檢查結果
        if (!mysqli_query($conn, $sql)) {
            // 如果執行 SQL 命令失敗，顯示錯誤訊息
            echo "佈告刪除錯誤";
        } else {
            // 如果執行 SQL 命令成功，顯示成功訊息
            echo "佈告刪除成功";
        }
        
        // 在3秒後跳轉到佈告欄列表頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
