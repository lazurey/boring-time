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
?>