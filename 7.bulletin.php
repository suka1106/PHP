<?php
    // 關閉錯誤報告，避免顯示可能的錯誤訊息
    error_reporting(0);

    // 建立資料庫連線
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 從資料庫中查詢佈告資料
    $result = mysqli_query($conn, "SELECT * FROM bulletin");

    // 輸出 HTML 表格的開始標籤
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

    // 使用 while 迴圈遍歷查詢結果中的每一條資料
    while ($row = mysqli_fetch_array($result)){
        // 輸出表格的每一行
        echo "<tr><td>";
        echo $row["bid"];      // 顯示佈告編號
        echo "</td><td>";
        echo $row["type"];     // 顯示佈告類別
        echo "</td><td>"; 
        echo $row["title"];    // 顯示標題
        echo "</td><td>";
        echo $row["content"];  // 顯示佈告內容
        echo "</td><td>";
        echo $row["time"];     // 顯示發佈時間
        echo "</td></tr>";
    }

    // 輸出 HTML 表格的結束標籤
    echo "</table>";
?>
