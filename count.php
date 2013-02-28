<?php 
include 'head-clean.php';

if (isset($_POST['type']) && isset($_POST['id'])) {
	$type = trim($_POST['type']);
	$id = trim($_POST['id']);
	$uid = $cook_uid;

	$condition = "";

	if ($type == 1) { // plus
		$condition = "remark + 1";
	} else { // minus
		$condition = "remark - 1";
	}
	$query = "UPDATE bt_item SET remark = " . $condition . " WHERE id = " . $id;
	mysql_query($query);
}
?>