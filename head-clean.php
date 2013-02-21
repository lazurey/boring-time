<?php 
	include 'db.inc.php';
	mysql_query("SET NAMES 'utf8'");

	$loginFlag = false;
	$reqUrl = trim($_SERVER["REQUEST_URI"]);
	$frontFlag = false;
	if (preg_match("/index.php/i", $reqUrl) || preg_match("/register.php/i", $reqUrl)) {
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
?>