<?php
$con = mysql_connect("127.0.0.1:3306","root","root");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("news", $con);
if ($_SERVER["REQUEST_METHOD"] == "POST"&&!empty($_POST["password-old"])) {
    if(empty($_POST["password-old"])||empty($_POST['password-new'])||empty($_POST['password-new'])){
        if(empty($_POST["password-new"])){
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>新密码不可为空</p>
</div>';
        }
        else if(empty($_POST["password-new2"])){
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>请重复输入新密码</p>
</div>';
        }
    }
    else{
        $sql="select * from users where userId={$_SESSION['userID']};";
        $result=mysql_query($sql);
        if($result!=false){
            $row = mysql_fetch_array($result);
            if($row['password']==md5(md5($_POST['password-old']))){
                if($_POST['password-new']==$_POST['password-new2']){
                    $password=md5(md5($_POST['password-new']));
                    $sql="update users set password='{$password}' where userID={$_SESSION['userID']} ;";
                    $result=mysql_query($sql);
                    echo "修改成功，请重新登录";
                    $_SESSION['log_status']=false;
                    // unset($_SESSION['log_status']);
                    unset($_SESSION['userID']);
                    unset($_SESSION['userName']);
                    echo "<SCRIPT LANGUAGE=\"JavaScript\">window.location.href='login.php'</SCRIPT>";
                }
                else{
                    echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>两次输入的新密码不同</p>
</div>';
                }
            }
            else{
                echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>密码不正确</p>
</div>';
            }
        }
        else{
            echo "error";
        }
    }
}

?>
<form method="post" class="am-form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
  <label for="password">原密码:</label>
  <input class="am-form-field am-round" type="password" name="password-old" id="password-old" value="">
  <br>
  <label for="password">新密码:</label>
  <input class="am-form-field am-round" type="password" name="password-new" id="password-new" value="">
  <br>
  <label for="password">重复新密码:</label>
  <input class="am-form-field am-round" type="password" name="password-new2" id="password-new2" value="">
  <br />
  <div class="am-cf">
    <input type="submit" name="" value="确认修改" class="am-btn am-btn-primary am-btn-md am-fl am-round">
  </div>
</form>