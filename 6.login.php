<?php
    // 使用 mysqli_connect() 函式建立資料庫連線
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 使用 mysqli_query() 函式從資料庫中查詢資料
    $result = mysqli_query($conn, "SELECT * FROM user");

    // 初始化登入狀態為 FALSE
    $login = FALSE;

    // 使用 while 迴圈遍歷查詢結果中的每一條資料
    while ($row = mysqli_fetch_array($result)) {
        // 檢查使用者提交的帳號和密碼是否與資料庫中的任何一組匹配
        if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
            // 如果匹配，將登入狀態設置為 TRUE
            $login = TRUE;
        }
    }

    // 根據登入狀態顯示相應的訊息
    if ($login == TRUE)
        echo "登入成功";
    else
        echo "帳號/密碼 錯誤";
?>
