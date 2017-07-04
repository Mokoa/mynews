<?php require 'header.php' ?>

<div class="banner">
    <div class="am-g am-container">
        <div class="am-u-sm-12 am-u-md-12">
              <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
              <ul class="am-tabs-nav am-cf">
                  <li class="am-active"><a href="[data-tab-panel-0]">订阅栏目</a></li>
                  <li><a href="[data-tab-panel-1]">修改个人密码</a></li>
              </ul>
              <div class="am-tabs-bd">
                  <div data-tab-panel-0 class="am-tab-panel am-active">
                    <?php require 'like.php' ?>
                  </div>
                  <div data-tab-panel-1 class="am-tab-panel ">
                    <?php require 'changeInfo.php' ?>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>