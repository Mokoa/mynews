<?php
require 'header.php';
?>
<center>
<div class="header">
  <div class="am-g">
    <h1>登录</h1>
    <!-- <p>Integrated Development Environment<br/>代码编辑，代码生成，界面设计，调试，编译</p> -->
  </div>
  <hr />
</div>
</center>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <!-- <h3>登录</h3>
    <hr>
    <div class="am-btn-group">
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-qq am-icon-sm"></i> QQ</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-wechat am-icon-sm"></i> 微信</a>

      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-weibo am-icon-sm"></i> 新浪微博</a>
    </div> -->
    <!-- <br> -->
    <!-- <br> -->
<?php
function checkUserInput($inputString){
    if (strpos('script', $inputString)!=false){ 
        return FALSE;
    }else if (strpos('iframe', $inputString)!=false){
        return FALSE;
    }else {
        return TRUE;
    }
};
function IsSame($ArgvOne,$ArgvTwo,$Force=false){
     return $Force?$ArgvOne===$ArgvTwo:$ArgvOne==$ArgvTwo;
};
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$password='';
    if(empty($_POST['email'])||empty($_POST['password'])){
        //警告 不可为空
        if(empty($_POST['email'])){
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>邮箱不可为空</p>
</div>';
        }
        else if(empty($_POST['password'])){
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>密码不可为空</p>
</div>';
        }
    }
    else{
        if(checkUserInput($_POST['email'])){
            $email=$_POST['email'];
            if(checkUserInput($_POST["password"])){
                $password=$_POST["password"];
                // echo $username.$email.$password;
                $con = mysql_connect("127.0.0.1:3306","root","root");
                if (!$con){
                    die('Could not connect: ' . mysql_error());
                }
                mysql_select_db("news", $con);
                $sql="select * from users where email='{$email}'";
                $result=mysql_query($sql);
                if($result!=false){
                    $row = mysql_fetch_array($result);
                    if($row['password']==$password){
                        echo '登录成功';
                        $_SESSION['log_status']=true;
                        $_SESSION['userID']=$row['userID'];
                        $_SESSION['userName']=$row['userName'];
                        echo "<SCRIPT LANGUAGE=\"JavaScript\">window.location.href='index.php'</SCRIPT>";
                        // echo $_SESSION['log_status'];
                    }
                    else{
                        echo '<div class="am-alert am-alert-secondary" data-am-alert>
                          <button type="button" class="am-close">&times;</button>
                          <p>密码不正确</p>
                        </div>';
                    }
                }
                else{
                    echo '<div class="am-alert am-alert-secondary" data-am-alert>
                      <button type="button" class="am-close">&times;</button>
                      <p>用户不存在</p>
                    </div>';
                }
            }
            else{
                echo '<div class="am-alert am-alert-secondary" data-am-alert>
                      <button type="button" class="am-close">&times;</button>
                      <p>密码不合法</p>
                    </div>';
            }
        }
        else{
             echo '<div class="am-alert am-alert-secondary" data-am-alert>
                      <button type="button" class="am-close">&times;</button>
                      <p>邮箱不合法</p>
                    </div>';
        }
    }
};

?>
    <form method="post" class="am-form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      
      <label for="email">邮箱:</label>
      <input class="am-form-field am-round" type="email" name="email" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input class="am-form-field am-round" type="password" name="password" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-md am-fl am-round">
        <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-md am-fr am-round">
      </div>
    </form>
    <hr>
  </div>
</div>


<?php require 'footer.php' ?>