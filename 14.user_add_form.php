<html>
    <head>
        <title>新增使用者</title>
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
        // 如果已登入，顯示新增使用者的表單
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
