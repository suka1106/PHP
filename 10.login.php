<?php
    // 建立資料庫連線
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 從資料庫中查詢用戶資料
    $result = mysqli_query($conn, "SELECT * FROM user");

    // 初始化登入狀態為 FALSE
    $login = FALSE;

    // 使用 while 迴圈遍歷查詢結果中的每一條資料
    while ($row = mysqli_fetch_array($result)) {
        // 檢查使用者提交的帳號和密碼是否與資料庫中的任何一組匹配
        if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
            // 如果匹配，設置登入狀態為 TRUE
            $login = TRUE;
        }
    }

    // 如果登入成功
    if ($login == TRUE) {
        // 開始新的 session 或者恢復之前的 session
        session_start();

        // 將用戶的帳號存儲在 session 中
        $_SESSION["id"] = $_POST["id"];

        // 顯示登入成功的訊息
        echo "登入成功";

        // 使用 meta 標籤設置網頁重新導向，在 3 秒後將用戶重定向到 11.bulletin.php 頁面
        echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
    } else {
        // 如果登入失敗，顯示錯誤訊息
        echo "帳號/密碼 錯誤";

        // 使用 meta 標籤設置網頁重新導向，在 3 秒後將用戶重定向到 2.login.html 頁面
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
?>
