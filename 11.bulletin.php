<?php
    // 關閉錯誤報告，避免顯示可能的錯誤訊息
    error_reporting(0);

    // 開始新的 session 或者恢復之前的 session
    session_start();

    // 檢查用戶是否已登入
    if (!$_SESSION["id"]) {
        // 如果未登入，顯示請先登入的訊息
        echo "請先登入";

        // 使用 meta 標籤設置網頁重新導向，在 3 秒後將用戶重定向到 2.login.html 頁面
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    } else {
        // 如果已登入，顯示歡迎訊息和相關操作連結
        echo "歡迎, " . $_SESSION["id"] . "[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";

        // 建立資料庫連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 從資料庫中查詢佈告資料
        $result = mysqli_query($conn, "SELECT * FROM bulletin");

        // 輸出佈告資料的 HTML 表格
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

        // 使用 while 迴圈遍歷查詢結果中的每一條資料
        while ($row = mysqli_fetch_array($result)){
            // 輸出每一條佈告資料的 HTML 表格行
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];       // 顯示佈告編號
            echo "</td><td>";
            echo $row["type"];      // 顯示佈告類別
            echo "</td><td>"; 
            echo $row["title"];     // 顯示標題
            echo "</td><td>";
            echo $row["content"];   // 顯示佈告內容
            echo "</td><td>";
            echo $row["time"];      // 顯示發佈時間
            echo "</td></tr>";
        }
        echo "</table>";
    }
?>
