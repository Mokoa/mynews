<?php
    session_start();
    $_SESSION['log_status']=false;
    // unset($_SESSION['log_status']);
    unset($_SESSION['userID']);
    unset($_SESSION['userName']);
    // echo "???";
    // echo $_SESSION['log_status']==false;
    echo "<SCRIPT LANGUAGE=\"JavaScript\">window.location.href='index.php'</SCRIPT>"
?>