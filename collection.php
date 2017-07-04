<?php require 'header.php' ?>
<div class="am-g am-container padding-none">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
        <div data-am-widget="list_news" class="am-list-news am-list-news-default ">
            <div class="am-list-news-bd">
                <ul class="am-list">
<?php
    $con = mysql_connect("127.0.0.1:3306","root","root");
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }
    mysql_select_db("news", $con);

    $sql="select * from collection,news where userID={$_SESSION['userID']} and collection.newsID=news.newsID;";
    $result = mysql_query($sql);
    $count=mysql_num_rows($result);
    $pageSize=7;
    $pageCount=ceil($count/$pageSize);
    $init=1;
    if(empty($_GET['page']) || $_GET['page']<0){
        $page=1;
    }
    else if($_GET['page']>$pageCount){
        $page=$pageCount;
    }else{
        $page=$_GET['page'];
    }
    $offset=$pageSize*($page-1);
    $sql="select * from collection,news where userID={$_SESSION['userID']} and collection.newsID=news.newsID limit $offset,$pageSize;";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)){
?>
    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" >
        <div class="am-u-sm-5 am-list-thumb">
<?php
if($row['pic']){
?>
            <a target="_blank" href="news.php?id=<?php echo $row['newsID'];?>">
                <img style="max-height:200px;" class="am-img-thumbnail am-radius" src="<?php echo $row['pic'];?>"/>
            </a>
<?php
}
?>
        </div>
        <div class=" am-u-sm-7 am-list-main">
            <h3 class="am-list-item-hd"><a target="_blank" href="news.php?id=<?php echo $row['newsID'];?>"><?php echo $row['title'];?></a></h3>

            <div class="am-list-item-text"><?php echo $row['content'];?></div>

        </div>
    </li>
    <div class="newsico am-fr">
        <i class="am-icon-clock-o"><?php echo $row['time'];?></i>
        <!-- 点击量 -->
        <!-- <i class="am-icon-hand-pointer-o">12322</i> -->
    </div>
<?php
    }
    mysql_close();
?>
                </ul>

                <ul data-am-widget="pagination" class="am-pagination am-pagination-default">

                    <li class="am-pagination-first">
                        <a href="?channel=<?php echo $channel ?>&page=1" class="am-hide-sm">第一页</a>
                    </li>

                    <li class="am-pagination-prev ">
                        <a href="?channel=<?php echo $channel ?>&page=<?php echo $page-1; ?>" class="">上一页</a>
                    </li>
<?php
for ($x=1; $x<=$pageCount; $x++) {
    if($x==$page)
          echo '<li class="am-active">
                    <a href="page='.$x.'" class="am-hide-sm">'.$x.'</a>
                </li>';
    else
        echo '<li >
                <a href="page='.$x.'" class="am-hide-sm">'.$x.'</a>
            </li>';
} 
?>
                    <li class="am-pagination-next ">
                        <a href="?channel=<?php echo $channel ?>&page=<?php echo $page+1; ?>" class="">下一页</a>
                    </li>
                    <li class="am-pagination-last ">
                        <a href="?channel=<?php echo $channel ?>&page=<?php echo $pageCount; ?>" class="am-hide-sm">最末页</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php require 'hotlabel.php' ?>
</div>

<?php require 'footer.php' ?>