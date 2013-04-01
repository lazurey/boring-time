<?php 
function getItemsQuerySql($type, $start, $sum) {
	$query = "SELECT * FROM bt_thing WHERE 1 = 1 ";
	if ($type > 0 && $type < 4) {
		$query .= " and type = " . $type . " ";
	}
	$query .= "ORDER BY tid DESC ";
	if (is_int($start) && is_int($sum)) {
		$query .= " LIMIT " . $start . ", " . $sum . " ";
	}
	return $query;
}

function getItemQuerySql ($tid) {
	$query = "SELECT t.*, u.name FROM bt_thing t, bt_user u WHERE t.tid = " . $tid;
	$query .= " AND t.uid = u.uid";
	return $query;
}

function checkEmpty($str) {
	if ($str == "" || strlen($str) < 1) {
		return "";
	} else {
		return $str;
	}
}

function adminGroupCheck ($uid) {
	$admin_array = array(1, 8);
	if (in_array($uid, $admin_array)) {
		return true;
	}
	return false;
}

function checkScore($uid, $tid) {
	$query = "SELECT * FROM bt_relate where rtype in (3, 4) and aid = " . $uid . " and bid = " . $tid;
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0) {
		$score = mysql_fetch_array($result);
		if ($score['rtype'] == 3) { // good
			return 1;
		} else { // bad
			return 2;
		}
	} else { // didn't give a score
		return 0;
	}
	return 0;
}

function getTodayBest() {
	$query = "SELECT DISTINCT (t.type), MAX(t.tid) as tid, MAX(t.title) as title, MAX(t.good) as good "
		. "FROM bt_thing t WHERE t.good > 0 GROUP BY t.type ORDER BY t.type, t.good DESC";
	//print $query;
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0) {
		return $result;
	} else {
		return false;
	}
}
?>