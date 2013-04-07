<?php 
	include 'db.inc.php';
	mysql_query("SET NAMES 'utf8'");
	include 'func.php';

	$loginFlag = false;
	$reqUrl = trim($_SERVER["REQUEST_URI"]);
	$frontFlag = false;
	if (preg_match("/index.php/i", $reqUrl) || preg_match("/register.php/i", $reqUrl)
			|| preg_match("/ie-die.php/i", $reqUrl)) {
		$frontFlag = true;
	}
	if (isset($_COOKIE['uid'])) {
		$loginFlag = true;
		$cook_uid = $_COOKIE['uid'];
		$cook_name = $_COOKIE['uname'];
	} else {
		if (!$frontFlag) {
			echo "<script> location.href='login.php';</script>";
		}
	}

	if (isset($_POST['user_id'])) {
		$new_id = trim($_POST['user_id']);
		if ($new_id != "" && strlen($new_id) > 0) {
			setcookie("uname", trim($_POST['user_id']), time() + 31536000);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<!--[if lte IE 8]>
		<?php 
		if (!preg_match("/ie-die.php/i", $reqUrl)) {
			echo "<script> location.href='ie-die.php';</script>"; 
		} ?>
	<![endif]-->

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>无聊之集 - 碎片时间整理利用</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.tagsinput.css" />
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/boring.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="js/jquery.tagcloud.js"></script>
</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">
		    <a class="brand" href="index.php">无聊之集</a>
			<ul class="nav">
				<li><a href="boring-list.php?type=1">建议</a></li>
				<li><a href="boring-list.php?type=2">跪求</a></li>
				<li><a href="boring-list.php?type=3">项目</a></li>
				<li><a class="feature" href="achievement-list.php">成就 <sup>new</sup></a></li>
				<li><a href="about.php">关于</a></li>
			</ul>
			<ul class="nav" style="float:right;">
				<?php if ($loginFlag) { ?> 
					<li><a href="my-setting.php"><i class="icon-wrench"></i>&nbsp;<?php print $cook_name; ?></a></li>
					<li><a href="logout.php">退出</a></li>
				<?php } else { ?> 
					<li><a href="login.php">登陆</a></li>
					<li><a href="register.php">注册</a></li>
				<?php } ?>
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