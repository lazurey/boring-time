<?php 
	include('head.php');
	// standard page template
	$type = 1;
	$tag = 0;
	if (isset($_GET['type'])) {
		$type = intval(trim($_GET['type']));
	}

	if (isset($_GET['tag'])) {
		$tag = intval($_GET['tag']);
	}
	if ($type == 3) {
	?>
	<article class="container min-main boring-project-list">
		<div class="span8">
		<?php
			$query = getItemsQuerySql($type, 0, 100, $tag);
			$result = mysql_query($query);
			$html = "<ul>";
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_array($result)) {
					$title = "<span class='one-word'>" . $row['one_word'] . "</span>";
					$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "' title='" . $row['title'] . "'>" . $title . "</a></li>";
				}
			} else {
				echo "<h4>什么都没找到诶, 放弃这个标签吧!</h4>";
			}
			$html .= "</ul>";
			echo $html;
		?>
		</div>
		<div class="span3" id="tag-cloud">
			<h4>标签和它的标签们</h4>
			<a href="boring-list.php?type=<?php print $type; ?>" rel="1">全部</a>
		<?php 
			$query = getBtItem(3);
			$tags = mysql_query($query);
			while ($tag = mysql_fetch_array($tags)) {
				echo "<a href='boring-list.php?type=" . $type . "&tag=" . $tag['id'] . "' rel='" . $tag['remark'] . "'>" . $tag['name'] . "</a>";
			}
		?>
		</div>
		<?php

	} else {
	?>
	<article class="container min-main boring-list">
		<div class="span8">
	<?php
		$query = getItemsQuerySql($type, 0, 100, $tag);
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

		?>
		</div>
		<div class="span3" id="tag-cloud">
			<h4>标签和它的标签们</h4>
			<a href="boring-list.php?type=<?php print $type; ?>" rel="1">全部</a>
		<?php 
			$query = getBtItem(3);
			$tags = mysql_query($query);
			while ($tag = mysql_fetch_array($tags)) {
				echo "<a href='boring-list.php?type=" . $type . "&tag=" . $tag['id'] . "' rel='" . $tag['remark'] . "'>" . $tag['name'] . "</a>";
			}
		?>
		</div>
		<?php
	}
?>

	</article>
<?php 
	include('footer.php');
?>
</body>
</html>