<?php 
	include('head.php');
	// standard page template
	$type = 1;
	if (isset($_GET['type'])) {
		$type = intval(trim($_GET['type']));
	}
	if ($type == 3) {
	?>
		<article class="container min-main boring-project-list">
		<?php
			$query = getItemsQuerySql($type, 0, 20);
			$result = mysql_query($query);
			$html = "<ul>";
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_array($result)) {
					$title = "<span class='one-word'>" . $row['one_word'] . "</span>";
					$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "' title='" . $row['title'] . "'>" . $title . "</a></li>";
				}
			}
			$html .= "</ul>";
			echo $html;

	} else {
	?>
		<article class="container min-main boring-list">
		<?php
			$query = getItemsQuerySql($type, 0, 20);
			$result = mysql_query($query);
			$html = "<ul>";
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_array($result)) {
					$title = $row['title'];
					$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "'>" . $title . "</a></li>";
				}
			}
			$html .= "</ul>";
			echo $html;
	}
?>
</article>
<?php 
	include('footer.php');
?>
</body>
</html>