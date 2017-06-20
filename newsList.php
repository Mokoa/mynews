<?php require 'header.php' ?>
<?php
$channel=$_GET['channel'];
?>
<!--banner-->
<!-- <div class="banner">
    <div class="am-g am-container padding-none">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8 padding-none">
            <div data-am-widget="slider" class="am-slider am-slider-c1" data-am-slider='{"directionNav":false}' >
                <ul class="am-slides">
                    <li>
                        <img src="Temp-images/tad3.png">
                        <div class="am-slider-desc">远方 有一个地方 那里种有我们的梦想</div>
                    </li>
                    <li>
                        <img src="Temp-images/tad3.png">
                        <div class="am-slider-desc">某天 也许会相遇 相遇在这个好地方</div>

                    </li>
                    <li>
                        <img src="Temp-images/tad3.png">
                        <div class="am-slider-desc">不要太担心 只因为我相信 终会走过这条遥远的道路</div>

                    </li>
                    <li>
                        <img src="Temp-images/tad3.png">
                        <div class="am-slider-desc">OH PARA PARADISE 是否那么重要 你是否那么地遥远</div>

                    </li>
                </ul>
            </div>

        </div>
        <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 padding-none lrad">
            <ul class="am-avg-sm-1 am-avg-md-2 am-avg-lg-1">
                <li class="ms"><img src="Temp-images/tad3.png" class="am-img-responsive"></li>
                <li><img src="Temp-images/tad3.png" class="am-img-responsive"></li>
            </ul>
        </div>
    </div>
</div> -->

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

    $sql="select * from news where channel='".$channel."'";
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
    $sql="select newsID,title,time,pic,content from news where channel='".$channel."' limit $offset,$pageSize";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)){
?>
    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" >
        <div class="am-u-sm-5 am-list-thumb">
            <a target="_blank" href="news.php?id=<?php echo $row['newsID'];?>">
                <img style="max-height:200px;" src="<?php echo $row['pic'];?>"/>
            </a>
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
                    <a href="?channel='.$channel.'&page='.$x.'" class="am-hide-sm">'.$x.'</a>
                </li>';
    else
        echo '<li >
                <a href="?channel='.$channel.'&page='.$x.'" class="am-hide-sm">'.$x.'</a>
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
    <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 am-hide-sm">
        <div class="tag bgtag">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
                <h2 class="am-titlebar-title ">
                    热门标签
                </h2>
            </div>
            <ul>
                <li class="active"><a href="#">的房间打开</a></li>
                <li><a href="#">阿斯达</a></li>
                <li><a href="#">恩恩</a></li>
                <li><a href="#">十二分</a></li>
                <li><a href="#">爱妃</a></li>
                <li><a href="#">而非</a></li>
                <li><a href="#">为非</a></li>
                <li><a href="#">二位</a></li>
                <li><a href="#">维吾尔</a></li>
                <li><a href="#">玩儿玩儿</a></li>
            </ul>
            <div class="am-cf"></div>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>