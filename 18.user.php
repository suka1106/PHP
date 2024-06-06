<html>
    <head>
        <title>使用者管理</title>
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
            // 如果已登入，顯示使用者管理頁面
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] 
                [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            // 建立資料庫連結
            $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

            // 查詢 user 表格中的所有資料
            $result = mysqli_query($conn, "select * from user");

            // 遍歷查詢結果，並顯示每一筆使用者資料
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>
                        <a href=19.user_edit_form.php?id={$row['id']}>修改</a>||
                        <a href=17.user_delete.php?id={$row['id']}>刪除</a>
                      </td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }

            // 結束表格
            echo "</table>";
        }
    ?> 
    </body>
</html>
