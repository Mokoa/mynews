<?php
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("news", $con);
require_once 'curl.func.php';
$appkey = '4e3126e08fe8ad8d';//你的appkey
$channel='女性';//utf8 新闻频道(头条,财经,体育,娱乐,军事,教育,NBA,股票,星座,女性,健康,育儿)
$url = "http://api.jisuapi.com/news/get?channel=$channel&appkey=$appkey&num=20";
$result = curlOpen($url);
$jsonarr = json_decode($result, true);
if($jsonarr['status'] != 0)
{
    echo $jsonarr['msg'];
    exit();
}
$result = $jsonarr['result'];
echo $result['channel'].' '.$result['num']. '<br>';
foreach($result['list'] as $val)
{
    echo $val['title'].' '.$val['time'].' '.$val['src'].' '.$val['category'].' '.$val['pic'].' '.$val['content'].' '.$val['url'].' '.$val['weburl'] . '<br>';
    $sql="insert into news (title,channel,time,src,category,pic,content,url,weburl) values ('{$val['title']}','$channel','{$val['time']}','{$val['src']}','{$val['category']}','{$val['pic']}','{$val['content']}','{$val['url']}','{$val['weburl']}' )";
    mysql_query( $sql );
    // mysql_query("INSERT INTO news (title,channel,time,src,category,pic,content,url,weburl) VALUES ('哈哈','哈哈','time','src','category','pic','content','url','weburl')");

}
echo '全部插入';
mysql_close($con);
?>