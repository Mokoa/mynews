<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
            <h2 class="am-titlebar-title ">
            <?php echo $channels[$x]; ?>
            </h2>
            <nav class="am-titlebar-nav">
<?php
echo '<a href="newsList.php?channel='.$channels[$x].'">more &raquo;</a>';
?>

            </nav>
        </div>

        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
<?php
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("news", $con);
$sql="select * from news where channel='{$channels[$x]}' order by clicks desc limit 1;";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
?>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="<?php echo 'news.php?id='.$row['newsID']; ?>">
                                <img style="max-height:200px;" src="<?php echo $row['pic']; ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="<?php echo 'news.php?id='.$row['newsID']; ?>"><?php echo $row['title']; ?></a></h3>
                            <div class="am-list-item-text"><?php echo $row['content']; ?></div>
                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo $row['time']; ?></i>
                        <i class="am-icon-hand-pointer-o"><?php echo $row['clicks']; ?></i>
                    </div>
<?php
}
?>

                </ul>
            </div>
        </div>