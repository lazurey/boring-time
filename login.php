<?php
  include("db.inc.php");
  $loginFlag = false;
  if (isset($_COOKIE['uid'])) {
    $loginFlag = true;
  }
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM bt_user WHERE email = '" . $email . "' AND pwd = '" . $password . "'";
    mysql_query("SET NAMES utf8");
    $result = mysql_query($sql);
    if (mysql_num_rows($result) == 1) {
      $row = mysql_fetch_array($result);
      setcookie("uid", $row['uid'], time() + 31536000);
      setcookie("uname", $row['name'], time() + 31536000);
      echo "<script>location.href='index.php';</script>";
    } else {
      echo "<script>$('#error-msg').append('账号或密码错误, 忘记密码请联系鹳狸猿.');</script>";
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>无聊之集 - 碎片时间整理利用</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="js/boring.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="index.php">无聊之集</a>
      <ul class="nav">
        <li>
          <a href="index.php">首页</a>
        </li>
        <li><a href="#">建议</a></li>
        <li><a href="#">跪求</a></li>
        <li><a href="#">项目</a></li>
        <li><a href="about.php">关于</a></li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
      </ul>
    </div>
  </div>
  <header class="container home-title clearfix">
    <div class="span6">
      <h1>无聊的我</h1>
    </div>
    <div class="span4">
      <a class="btn btn-large btn-block start-btn" href="start-page.php">Start to kill it</a>
    </div>
    <div class="span12">
      <p class="boring-line">我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/我是无聊的分割线\/</p>
    </div>
  </header>  
    <div class="no-head-container container">
      <div class="control-group error">
        <span id="error-msg"></span>
      </div>
      <form class="form-horizontal" action="" method="post" name="loginForm">
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input type="text" id="inputEmail" placeholder="Email" name="email">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" id="inputPassword" placeholder="Password" name="password">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn">Sign in</button>
            <div class="warning" style="padding:5px;">
              <p>还没有账号? <a href="register.php">注册一个</a>吧~</p>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php
      include("footer.php");
    ?>
  </body>
</html>