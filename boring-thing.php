<?php 
	include('head.php');
	// standard page template
	if (isset($_GET['tid'])) {
		$query = getItemQuerySql(intval(trim($_GET['tid'])));
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			$thing = mysql_fetch_array($result);
			?>
				<article class="container min-main">
			<?php
			echo "<h2>" . $thing['title'] . "</h2>";
			echo "<p>发起人: " . $thing['name'] . "</p>";
			echo "<p>" . $thing['description'] . "</p>";
			?>
				</article>
			<?php
		} else {
			echo "<script>alert('这个建议不见了, 继续无聊吧!'); location.href='index.php';</script>";
		}
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