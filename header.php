<?php session_start();?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--360 browser -->
    <meta name="renderer" content="webkit">
    <meta name="author" content="wos">
    <!-- Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/i/app.png">
    <!--Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="images/i/app.png">
    <!--Win8 or 10 -->
    <meta name="msapplication-TileImage" content="images/i/app.png">
    <meta name="msapplication-TileColor" content="#e1652f">

    <link rel="icon" type="image/png" href="images/i/favicon.png">
    <link rel="stylesheet" href="assets/css/amazeui.min.css">
    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="css/personal.css">
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="assets/js/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script src="assets/js/amazeui.min.js"></script>
    <script src="js/public.js"></script>
</head>

<body>

<!-- <header class="am-topbar am-topbar-fixed-top wos-header"> -->
<header class="am-topbar am-topbar-fixed-top wos-header">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a href="index.php">MYNEWS</a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-warning am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">
<?php
$channels = array('头条','财经','体育','娱乐','军事','教育','股票','星座');
$arrlength=count($channels);
if(empty($_GET['channel'])){

?>
    <li class="am-active"><a href="index.php">首页</a></li>
<?php
    for($x=0;$x<$arrlength;$x++) {
        echo '<li><a href="newsList.php?channel='.$channels[$x].'">'.$channels[$x].'</a></li>';
    }
}
else{
    $channel=$_GET['channel'];
?>
    <li><a href="index.php">首页</a></li>
<?php
    for($x=0;$x<$arrlength;$x++) {
        if($channel!=$channels[$x]){
            echo '<li><a href="newsList.php?channel='.$channels[$x].'">'.$channels[$x].'</a></li>';
        }
        else{
            echo '<li class="am-active"><a href="newsList.php?channel='.$channels[$x].'">'.$channels[$x].'</a></li>';
        }
    }
}

?>
            </ul>
<script type="text/javascript">
    function logout(){
        $('#my-confirm').modal({
            relatedTarget: this,
            onConfirm: function(options) {
                window.location.href='logout.php';
            },
            // closeOnConfirm: false,
            onCancel: function() {
            }
          });
    };
</script>

<?php
if(empty($_SESSION['log_status'])||$_SESSION['log_status']==false){
?>
            <div class="am-topbar-right">
                <button class="am-btn am-btn-default am-topbar-btn am-btn-sm am-round"onclick="window.location.href='register.php'"><span class="am-icon-pencil"></span> 注册</button>
            </div>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-danger am-topbar-btn am-btn-sm am-round" onclick="window.location.href='login.php'"><span class="am-icon-user"></span> 登录</button>
            </div>
            

<?php
}
else{
?>
            <div class="am-topbar-right">
                <button id="logout-confirm" class="am-btn am-btn-default am-topbar-btn am-btn-sm am-round" onclick="logout()" ><span class="am-icon-sign-out"></span>&nbsp注销</button>
            </div>
            
            <div class="am-topbar-right">
                <button class="am-btn am-btn-default am-topbar-btn am-btn-sm am-round" onclick="window.location.href='psnInfo.php'"><span class="am-icon-user"></span>&nbsp<?php echo $_SESSION['userName']; ?></button>
            </div>
            <div class="am-topbar-right">
                <button id="logout-confirm" class="am-btn am-btn-default am-topbar-btn am-btn-sm am-round" onclick="window.location.href='collection.php'"><span class="am-icon-star"></span>&nbsp收藏夹</button>
            </div>
<?php
}
?>
        </div>
    </div>
</header>
<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd"><?php echo $_SESSION['userName'] ?></div>
    <div class="am-modal-bd">
      确定注销登录吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>