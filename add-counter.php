<?php 
	include('head.php');
	// standard page template
	if (isset($_POST['name'])) {
		$name = trim($_POST['name']);
		$query = "INSERT INTO bt_item (id, type, name , remark) VALUES ";
		$query .= "('', 1, '" . $name . "', '0')";
		mysql_query($query);
		$id = mysql_insert_id();
		$query = "INSERT INTO bt_relate (rid, rtype, aid, bid) VALUES ";
		$query .= "('', 5, " . $cook_uid . ", " . $id . ")";
		mysql_query($query);
		echo "<script>location.href='counter.php';</script>";
	}
?>
<article class="container">
	<form name="add-counter" method="post" action="">
		<input name="name" type="text" required>
		<input type="submit" value="提交" class="btn">
	</form>
</article>
<?php 
	include('footer.php');
?>
</body>
</html>