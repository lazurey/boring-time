<?php 
include 'head-clean.php';

if (isset($_POST['aid'])) {
	$aid = intval(trim($_POST['aid']));
	$uid = $cook_uid;
	$query = "INSERT INTO bt_relate (rid, rtype, aid, bid) VALUES ('', 2, " . $uid . ", " . $aid . ")";
	mysql_query($query);
	
}
?>