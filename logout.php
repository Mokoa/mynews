<?php require 'header.php' ?>
<?php
    $_SESSION['log_status']=false;
    unset($_SESSION['userID']);
    unset($_SESSION['userName']);
    echo "<SCRIPT LANGUAGE=\"JavaScript\">window.location.href='index.php'</SCRIPT>"
?>
<?php require 'footer.php' ?>