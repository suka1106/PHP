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
        // 如果已登入，顯示新增佈告的表單
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=23.bulletin_add.php>
                    標    題：<input type=text name=title><br>
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    發布時間：<input type=date name=time><p></p>
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
