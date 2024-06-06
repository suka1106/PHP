<html>
    <head>
        <title>修改使用者</title>
    </head>
    <body>
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

        // 查詢指定 id 的使用者資料
        $result = mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        $row = mysqli_fetch_array($result);

        // 顯示修改使用者資料的表單
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
