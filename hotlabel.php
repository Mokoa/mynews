
<div class="am-u-sm-0 am-u-md-0 am-u-lg-4 am-hide-sm">

    <div class="tag bgtag">
        <form method="post" action="search.php" class="am-form am-form-horizonal">
          <div class="am-form-group am-form-icon">
            <i class="am-icon-search"></i>
            <input name="keystr" id="keystr" type="text" class="am-form-field am-round" placeholder="搜索您感兴趣的内容...">
          </div>
        </form>
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
            <h2 class="am-titlebar-title ">
                热门标签
            </h2>
        </div>
        <ul>
<?php
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("news", $con);
$sql="select * from labels order by clicks desc limit 10;";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
?>
            <li><a href="search.php?keystr=<?php echo $row['label'];?>"><?php echo $row['label'];?></a></li>
<?php
}
?>
        </ul>
        <div class="am-cf"></div>
    </div>
</div>