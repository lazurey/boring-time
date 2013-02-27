<?php 
include 'head-clean.php';

if (isset($_POST['title'])) {
	$title = trim($_POST['title']);
	$desc = trim($_POST['desc']);
	$uid = $cook_uid;

	$query = "INSERT INTO bt_achievement (aid, title, description, uid) VALUES ";
	$query .= "('', '" . $title . "', '" . $desc . "', " . $uid . ")";
	mysql_query($query);
}
?>