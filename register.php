<?php require 'header.php' ?>
<center>
<div class="header">
  <div class="am-g">
    <h1>注册</h1>
    <!-- <p>Integrated Development Environment<br/>代码编辑，代码生成，界面设计，调试，编译</p> -->
  </div>
  <hr />
</div>
</center>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
   <!--  <h3>注册</h3>
    <hr>
    <div class="am-btn-group">
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-qq am-icon-sm"></i> QQ</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-wechat am-icon-sm"></i> 微信</a>
      
      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-weibo am-icon-sm"></i> 新浪微博</a>
    </div> -->
<?php
require 'base.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username=$email=$password='';
    if(empty($_POST["username"])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['password2'])){
        //警告 不可为空
        if(empty($_POST["username"])){
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>用户名不可为空</p>
</div>';
        }
        else if(empty($_POST['email'])){
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
        else if(empty($_POST['password2'])){
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>请重复输入密码</p>
</div>';
        }
    }
    else{

        
        if(checkUserInput($_POST['username'])&&IsUsername($_POST['username'])){
            $username=$_POST["username"];
            if(checkUserInput($_POST['email'])&&IsMail($_POST['email'])){
                $email=$_POST['email'];
                if(checkUserInput($_POST["password"])&&checkUserInput($_POST["password"])&&IsPassword($_POST["password"])&&IsPassword($_POST["password2"])&&IsSame($_POST['password2'],$_POST['password'])){
                    $password=md5(md5($_POST["password"]));
                    // echo $username.$email.$password;
                    $con = mysql_connect("127.0.0.1:3306","root","root");
                    if (!$con){
                        die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("news", $con);
                    $sql="insert into users (userName,password,email) values ('{$username}','{$password}','{$email}')";
                    $result=mysql_query($sql);
                    if($result==true){
                        echo "请登录";
                        echo "<SCRIPT LANGUAGE=\"JavaScript\">window.location.href='login.php'</SCRIPT>";
                    }
                    else{
                        echo '<div class="am-alert am-alert-secondary" data-am-alert>
                          <button type="button" class="am-close">&times;</button>
                          <p>用户名或邮箱地址已被使用</p>
                        </div>';
                    }
                }
                else{
                    echo '<div class="am-alert am-alert-secondary" data-am-alert>
                          <button type="button" class="am-close">&times;</button>
                          <p>密码不合法或两次输入的密码不匹配</p>
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
        else{
            echo '<div class="am-alert am-alert-secondary" data-am-alert>
  <button type="button" class="am-close">&times;</button>
  <p>用户名不合法</p>
</div>';
        }
    }
};

?>

    <form name="RegForm" method="post" class="am-form" action="<?php echo $_SERVER['PHP_SELF']?>">
      <label for="username">用户名:</label>
      <input class="am-form-field am-round" type="text" name="username" id="username" value="" placeholder="大小写字母、数字或下划线组成，6-16字符">
      <br>
      <label for="email">邮箱:</label>
      <input class="am-form-field am-round" type="email" name="email" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input class="am-form-field am-round" type="password" name="password" id="password" value=""  placeholder="大小写字母、数字组成，6-16字符">
      <br>
      <label for="password2">重复输入密码:</label>
      <input class="am-form-field am-round" type="password" name="password2" id="password2" value="">
      <br>
      <div class="am-cf">
        <input type="submit" name="" value="注 册" class="am-btn am-btn-primary am-btn-block am-fl am-round">
      </div>
    </form>
    <hr>
  </div>
</div>


<?php require 'footer.php' ?>