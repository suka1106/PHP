<?php
    // 關閉錯誤報告
    error_reporting(0);

    // 開始一個新的或恢復現有的 session
    session_start();

    // 檢查是否已登入（是否有設定 session 中的 "id" 變數）
    if (!$_SESSION["id"]) {
        // 如果尚未登入，顯示提示訊息並在3秒後跳轉到登入頁面
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 如果已登入，建立資料庫連結
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 查詢指定 bid 的佈告資料
        $result = mysqli_query($conn, "select * from bulletin where bid={$_GET['bid']}");
        $row = mysqli_fetch_array($result);

        // 根據佈告的類型設定選中的 radio 按鈕
        $checked1 = $row['type'] == 1 ? "checked" : "";
        $checked2 = $row['type'] == 2 ? "checked" : "";
        $checked3 = $row['type'] == 3 ? "checked" : "";

        // 顯示修改佈告資料的表單
        echo "
        <html>
            <head><title>修改佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value='{$row['title']}'><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
