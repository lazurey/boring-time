<?php 
include 'head-clean.php';

if (isset($_POST['aid'])) {
	$aid = intval(trim($_POST['aid']));
	$uid = $cook_uid;
	$query = "INSERT INTO bt_relate (rid, rtype, aid, bid) VALUES ('', 2, " . $uid . ", " . $aid . ")";
	mysql_query($query);
	
} else if (isset($_POST['bid'])) {
	$bid = intval(trim($_POST['bid']));
	$type = intval(trim($_POST['type']));
	$query = "INSERT INTO bt_relate (rid, rtype, aid, bid) VALUES ";
	$query .= "('', " . $type . ", " . $cook_uid . ", " . $bid . ")";
	mysql_query($query);
	$update = "";
	if ($type == 3) {
		$update = " good = good + 1 ";
	} else if ($type == 4) {
		$update = " bad = bad + 1 ";
	}
	$query = "UPDATE bt_thing SET " . $update . " WHERE tid = " . $bid;
	mysql_query($query);
}
?>