<?php
$con = mysql_connect("127.0.0.1:3306","root","root");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("news", $con);

$sql="select title,channel,time,src,category,pic,content,url,weburl from news";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
        echo $row['title'].' '.$row['channel'].' '.$row['time'].' '.$row['src'].' '.$row['category'].' '.$row['pic'].' '.$row['content'].' '.$row['url'].' '.$row['weburl'] . '<br>';

}
mysql_close();
?>