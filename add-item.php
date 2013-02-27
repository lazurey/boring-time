<?php 
include 'head-clean.php';

if (isset($_POST['type'])) {
	$type = intval(trim($_POST['type']));
	$title = trim($_POST['title']);
	$desc = trim($_POST['desc']);
	$uid = $cook_uid;
	$cat = trim($_POST['cat']);
	$tag = trim($_POST['tag']);
	$status = trim($_POST['status']);

	$query = "INSERT INTO bt_thing (tid, title, type, tag, cat, description, uid, one_word, contact, status, good, bad) VALUES ";

	if ($type == 1 || $type == 2) { // suggestion || request
		$query .= " ('', '" . $title . "', " . $type . ", '" . $tag . "', " . $cat . ", '" . $desc . "', ";
		$query .= $uid . ", '', '', " . $status . ", 0, 0)";
		
		mysql_query($query);
	} else if ($type == 3) { // project
		$word = checkEmpty(trim($_POST['word']));
		$contact = checkEmpty(trim($_POST['contact']));
		$query .= " ('', '" . $title . "', " . $type . ", '" . $tag . "', " . $cat . ", '" . $desc . "', ";
		$query .= $uid . ", '" . $word . "', '" . $contact . "', " . $status . ", 0, 0)";
		mysql_query($query);
	}
} else {
}
?>