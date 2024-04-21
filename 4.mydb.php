<?php
    // 使用 mysqli_connect() 函式建立資料庫連線
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 使用 mysqli_query() 函式從資料庫中查詢資料
    $result = mysqli_query($conn, "SELECT * FROM user");

    // 使用 mysqli_fetch_array() 函式從查詢結果中抓取每一條資料
    $row = mysqli_fetch_array($result);

    // 顯示第一條資料的帳號和密碼
    echo $row["id"] . " " . $row["pwd"] . "<br>";

    // 再次使用 mysqli_fetch_array() 函式抓取下一條資料
    $row = mysqli_fetch_array($result);

    // 顯示第二條資料的帳號和密碼
    echo $row["id"] . " " . $row["pwd"];
?>
