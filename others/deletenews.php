<?php
$con = mysql_connect("127.0.0.1:3306","root","root");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("news", $con);

require_once 'curl.func.php';
 
$sql="delete from news where channel='股票'";
mysql_query( $sql );
echo '已删除';
mysql_close($con);
?>