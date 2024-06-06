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
    #mysqli_connect() 用於建立到 MySQL 資料庫的連接
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 構建新增使用者的 SQL 命令
    #mysqli_query() 用於執行 SQL 查詢
    #SQL 命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
    $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
    
    // 顯示 SQL 命令，用於除錯
    #echo $sql;

    // 執行 SQL 命令並檢查結果
    if (!mysqli_query($conn, $sql)) {
        // 如果執行 SQL 命令失敗，顯示錯誤訊息
        echo "新增命令錯誤";
    }
    else {
        // 如果執行 SQL 命令成功，顯示成功訊息並在3秒後跳轉到 18.user.php 頁面
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
}
?>
