<?php
    // 開始新的 session 或者恢復之前的 session
    session_start();

    // 檢查是否已設置了計數器
    if (!isset($_SESSION["counter"]))
        $_SESSION["counter"] = 1; // 如果未設置，將計數器設置為 1
    else
        $_SESSION["counter"]++; // 如果已設置，將計數器值加 1

    // 顯示計數器的值
    echo "counter=" . $_SESSION["counter"];
    echo "<br><a href='9.reset_counter.php'>重置counter</a>"; // 提供重置計數器的連結
?>
