<?php 
function getItemsQuerySql($type, $start, $sum, $tag = 0) {
	$query = "SELECT t.* FROM bt_thing t WHERE 1 = 1 ";
	if ($tag > 0) {
		$query = "SELECT t.* FROM bt_thing t, bt_item i WHERE t.tag LIKE CONCAT('%', i.name, '%') and i.id = " . $tag;
		//select t.*, i.name from bt_thing t, bt_item i where t.tag like CONCAT('%', i.name, '%') and i.id = 13	
	}
	if ($type > 0 && $type < 4) {
		$query .= " and t.type = " . $type . " ";
	}
	$query .= "ORDER BY t.tid DESC ";
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

function saveTags($tagStr) {
	$tagArr = explode(',', $tagStr);
	foreach ($tagArr as $tag) {
		if(strlen(trim($tag)) > 0) {
			$query = "SELECT * FROM bt_item WHERE type = 3 AND name = '" . $tag . "'";
			$result = mysql_query($query);
			if (mysql_num_rows($result) < 1) {
				$insertSql = "INSERT INTO bt_item () VALUES ";
				$insertSql .= "('', 3, '" . $tag . "', '1')";
				mysql_query($insertSql);
			} else {
				$query = "UPDATE bt_item set remark = remark + 1 WHERE type = 3 and name = '" . $tag . "'";
				mysql_query($query);
			}
		}
	}
}

/*
$condition = " AND a = b "
$sort = "order by id desc"
*/
function getBtItem ($type, $condition = " 1 = 1 ", $sort = " ORDER BY id DESC") {
	$query = "SELECT * FROM bt_item WHERE type =  " . $type . " AND " . $condition . $sort;
	return $query;
}
?>