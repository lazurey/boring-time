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
	<!-- <div class="span4" id="tag-cloud">
		<a href="/" rel="1">ww</a>
		<a href="/" rel="21">aaaaa</a>
		<a href="/" rel="13">ddd</a>
		<a href="/" rel="14">asdf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="20">daf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="2">daf</a>
		<a href="/" rel="29">daf</a>
		<a href="/" rel="30">dfa</a>
		<a href="/" rel="34">efffff</a>
	</div> -->
	</article>
<?php 
	include('footer.php');
?>
</body>
</html>