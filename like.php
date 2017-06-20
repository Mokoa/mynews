<center>
  <form method="post" class="am-form" action="psnInfo.php">
      <div class="am-form-group">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$checkbox_select=$_POST["checkbox"];
$arrlength=count($checkbox_select);
$tmp=array(0,0,0,0,0,0,0,0,0);
for($x=0;$x<$arrlength;$x++) {
    switch ($checkbox_select[$x]) {
        case 'option1':
            $tmp[1]=true;
            break;
        case 'option2':
            $tmp[2]=true;
            break;
        case 'option3':
            $tmp[3]=true;
            break;
        case 'option4':
            $tmp[4]=true;
            break;
        case 'option5':
            $tmp[5]=true;
            break;
        case 'option6':
            $tmp[6]=true;
            break;
        case 'option7':
            $tmp[7]=true;
            break;
        case 'option8':
            $tmp[8]=true;
            break;
        default:
            break;
    }
}
mysql_select_db("news", $con);
$sql="update users set toutiao={$tmp[1]},caijing={$tmp[2]},tiyu={$tmp[3]},yule={$tmp[4]},junshi={$tmp[5]},jiaoyu={$tmp[6]},gupiao={$tmp[7]},xingzuo={$tmp[8]} where userID={$_SESSION['userID']}";
// echo $sql;
$result = mysql_query($sql);
if($result!=false){
}
}
?>

<?php
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("news", $con);
$sql="select * from users where userID={$_SESSION['userID']}";
// echo $sql;
$result = mysql_query($sql);
if($result!=false){
  $row = mysql_fetch_array($result);
?>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['toutiao']){echo 'checked="true" ';} ?> value="option1"> 头条
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['caijing']){echo 'checked="true" ';} ?> value="option2"> 财经
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['tiyu']){echo 'checked="true" ';} ?> value="option3"> 体育
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['yule']){echo 'checked="true" ';} ?> value="option4"> 娱乐
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['junshi']){echo 'checked="true" ';} ?> value="option5"> 军事
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['jiaoyu']){echo 'checked="true" ';} ?> value="option6"> 教育
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['gupiao']){echo 'checked="true" ';} ?> value="option7"> 股票
        </label>
      </div>
      <div>
        <label class="am-checkbox-inline">
          <input name="checkbox[]" type="checkbox" <?php if($row['xingzuo']){echo 'checked="true" ';} ?> value="option8"> 星座
        </label>
      </div>
<?php
mysql_close($con);
}
else{
}
?>
      <br>
      <div class="am-cf">
          <input type="submit" name="" value="订 阅" class="am-btn am-btn-primary am-btn-md am-round">
      </div>

  </form>
</center>