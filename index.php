<?php require 'header.php' ?>
<div class="banner">
    <div class="am-g am-container">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
            <div data-am-widget="slider" class="am-slider am-slider-c1" data-am-slider='{"directionNav":false}' >
                <ul class="am-slides">
<?php
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("news", $con);
$sql="select * from news where pic!='' order by clicks desc limit 4;";
$result = mysql_query($sql);
$cnt=mysql_num_rows($result);
while($row = mysql_fetch_array($result)){
?>
                    <li>
                        <a href="<?php echo 'news.php?id='.$row['newsID']; ?>"><img src="<?php echo $row['pic']; ?>"></a>
                        <div class="am-slider-desc"><?php echo $row['title']; ?></div>

                    </li>
<?php
}
?>
                </ul>
            </div>
        </div>
        <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 padding-none">
            <div class="star am-container"><span><img src="images/star.png">热门</span></div>
            <ul class="padding-none am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-2 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
<?php
$sql="select * from news where pic!='' order by clicks desc limit 4,4 ;";
// echo $sql;
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
?>
                <li>
                    <div class="am-gallery-item">
                        <a href="<?php echo 'news.php?id='.$row['newsID']; ?>">
                            <img style="width:100%;height: 170px" src="<?php echo $row['pic']; ?>"/>
                            <h3 class="am-gallery-title"><?php echo $row['title']; ?></h3>
                            <div class="am-gallery-desc"><?php echo $row['time']; ?></div>
                        </a>
                    </div>
                </li>
<?php
}
?>
            </ul>
        </div>
    </div>
</div>

<!--banner2-->
<div class="am-container">
    <ul class="padding-none banner2 am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-4 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
<?php
if(!empty($_SESSION['log_status'])&&$_SESSION['log_status']==true){
    $sql="select toutiao,caijing,tiyu,yule,junshi,jiaoyu,gupiao,xingzuo from users where userID={$_SESSION['userID']};";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $sql="select * from news where channel in (";
    $sql_t=$sql;
    if($row['toutiao']>0){
        if($sql==$sql_t){
            $sql=$sql."'头条'";
        }
        else{
            $sql=$sql.",'头条'";
        }
    }
    if($row['caijing']>0){
        if($sql==$sql_t){
            $sql=$sql."'财经'";
        }
        else{
            $sql=$sql.",'财经'";
        }
    }
    if($row['tiyu']>0){
        if($sql==$sql_t){
            $sql=$sql."'体育'";
        }
        else{
            $sql=$sql.",'体育'";
        }
    }
    if($row['yule']>0){
        if($sql==$sql_t){
            $sql=$sql."'娱乐'";
        }
        else{
            $sql=$sql.",'娱乐'";
        }
    }
    if($row['junshi']>0){
        if($sql==$sql_t){
            $sql=$sql."'军事'";
        }
        else{
            $sql=$sql.",'军事'";
        }
    }
    if($row['jiaoyu']>0){
        if($sql==$sql_t){
            $sql=$sql."'教育'";
        }
        else{
            $sql=$sql.",'教育'";
        }
    }
    if($row['gupiao']>0){
        if($sql==$sql_t){
            $sql=$sql."'股票'";
        }
        else{
            $sql=$sql.",'股票'";
        }
    }
    if($row['xingzuo']>0){
        if($sql==$sql_t){
            $sql=$sql."'星座'";
        }
        else{
            $sql=$sql.",'星座'";
        }
    }
    $sql_t=$sql;
    $sql=$sql.") and pic!='' order by clicks desc limit 4;";
    // echo $sql;
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)){
?>
        <li>
            <div class="am-gallery-item">
                <a href="<?php echo 'news.php?id='.$row['newsID']; ?>">
                    <img style="width: 100%;height: 180px" src="<?php echo $row['pic']; ?>"/>
                    <h3 class="am-gallery-title"><?php echo $row['title']; ?></h3>
                    <div class="am-gallery-desc"><?php echo $row['time']; ?></div>
                </a>
            </div>
        </li>
<?php
    }
}
?>
    </ul>
</div>
<!--news-->

<div class="am-g am-container newatype">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8 oh">
<?php
for($x=0;$x<$arrlength;$x++) {
    include 'column.php';
}

?>
        
    </div>
<?php require 'hotlabel.php' ?>
</div>
<?php require 'footer.php' ?>
