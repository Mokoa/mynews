<?php 
require 'header.php';

?>
<?php
require 'base.php';
$ID = $_GET["id"];
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("news", $con);
$sql="update news set clicks=clicks+1 where newsID={$ID};";
$result = mysql_query($sql);
$sql="select * from news where newsID=".$ID;
$result = mysql_query($sql);

$row = mysql_fetch_array($result);
?>
<div class="am-g am-container">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
        <div class="newstitles">
            <h2><?php echo $row['title'];?></h2>
            <span><?php echo $row['src'];?></span>
            时间：<?php echo $row['time'];?>   阅读：<?php echo $row['clicks']; ?>
        </div>
        <center><img style="max-height:450px;width:auto;" src="<?php echo $row['pic'];?>" class="am-img-responsive" width="100%"/></center>

        <div class="contents">
            <?php echo $row['content'];?>
        </div>
        <center>
<?php
if(!empty($_SESSION['log_status'])&&$_SESSION['log_status']==true){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $con = mysql_connect("127.0.0.1:3306","root","root");
        if (!$con)
        {
        die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("news", $con);
        if(!empty($_GET['drop'])){
            $sql="delete from collection where newsID={$ID} and userID={$_SESSION['userID']};";
            $result = mysql_query($sql);
        }
        else if(!empty($_GET['add'])){
            $sql="insert into collection (newsID,userID) values ({$ID},{$_SESSION['userID']});";
            $result = mysql_query($sql);
        }
    }
    $sql="select * from collection where newsID={$ID} and userID={$_SESSION['userID']};";
    $result = mysql_query($sql);
    if($result!=false){
        $cnt=mysql_num_rows($result);
        if($cnt!=0){
            echo
        '<form method="post" action="'.$_SERVER['PHP_SELF'].'?id='.$ID.'&drop=1">
            <button class="am-btn am-btn-primary am-topbar-btn am-btn-md am-round"><span class="am-icon-star"></span>&nbsp取消收藏</button>
        </form>';
        }
        else{
            echo
        '<form method="post" action="'.$_SERVER['PHP_SELF'].'?id='.$ID.'&add=1">
            <button class="am-btn am-btn-primary am-topbar-btn am-btn-md am-round"><span class="am-icon-star-o"></span>&nbsp收藏</button>
        </form>';
        }
    }
    mysql_close();
}
?>
        </center>
        
    </div>

    </div>
    </div>
</div>
<?php require 'footer.php' ?>