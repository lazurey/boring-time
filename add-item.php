<?php 
echo "<script>alert(2);</script>";
include 'head-clean.php';

function checkEmpty($str) {
	if ($str == "" || strlen($str) < 1) {
		return "";
	} else {
		return $str;
	}
}
echo "<script>alert(1);</script>";
if (isset($_GET['type'])) {
	$type = intval(trim($_GET['type']));
	$title = trim($_GET['title']);
	$desc = trim($_GET['desc']);
	$uid = 1;
	$cat = trim($_GET['cat']);
	$tag = trim($_GET['tag']);
	$status = trim($_GET['status']);

	$query = "INSERT INTO bt_thing (tid, title, type, tag, cat, description, uid, one_word, contact, status, good, bad) VALUES ";

	if ($type == 1 || $type == 2) { // suggestion || request
		$query .= " ('', '" . $title . "', " . $type . ", '" . $tag . "', " . $cat . ", '" . $desc . "', ";
		$query .= $uid . ", '', '', " . $status . ", 0, 0)";
		mysql_query($query);
	} else if ($type == 3) { // project
		$word = checkEmpty(trim($_GET['word']));
		$contact = checkEmpty(trim($_GET['contact']));
		$query .= " ('', '" . $title . "', " . $type . ", '" . $tag . "', " . $cat . ", '" . $desc . "', ";
		$query .= $uid . ", '" . $word . "', '" . $contact . "', " . $status . ", 0, 0)";
		mysql_query($query);
	}
} else {
}
?>