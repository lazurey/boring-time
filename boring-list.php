<?php 
	include('head.php');
	// standard page template
	?>
	<article class="container min-main">
	<?php
	if (isset($_GET['type'])) {
		$type = intval(trim($_GET['type']));
		$query = getItemsQuerySql($type, 0, 20);
		$result = mysql_query($query);
		$html = "<ul>";
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				if ($type == 3) {
					$title = $row['one_word'];
				} else {
					$title = $row['title'];
				}
				$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "'>" . $title . "</a></li>";
			}
		}
		$html .= "</ul>";
		echo $html;

	} else {
		echo "<script>location.href='index.php';</script>";
	}
?>
</article>
<?php 
	include('footer.php');
?>
</body>
</html>