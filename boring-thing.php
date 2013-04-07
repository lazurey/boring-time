<?php 
	include('head.php');
	// standard page template
	if (isset($_GET['tid'])) {
		$tid = intval(trim($_GET['tid']));
		$query = getItemQuerySql($tid);
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			$thing = mysql_fetch_array($result);
			?>
				<article class="container min-main">
			<?php
			echo "<h2>" . $thing['title'] . "</h2>";
			echo "<p>发起人: " . $thing['name'] . "</p>";

			$order   = array("\r\n", "\n", "\r");
			$replace = '<br />';
			$text = str_replace($order, $replace, $thing['description']);
			// echo "<p>" . $thing['description'] . "</p>";
			echo "<p>" . $text . "</p>";
			if ($thing['type'] == 3) {
				echo "<p>联系人: " . $thing['contact'] . "</p>";
			}
			if ($thing['type'] != 2) {
				echo "<p>分类: " . $thing['cat'] . "</p>";
			}
			echo "<p>标签: " . $thing['tag'] . "</p>";
			?>
			<div class="score-bar">
				<?php 
					$scoreFlag = checkScore($cook_uid, $tid);
					if ($scoreFlag == 0) {
						echo "<a href='#nogo' onclick='goodScore(" . $tid . ");'><i class='icon-sun'></i></a>&nbsp;";
					} else {
						echo "<i class='icon-sun-inv'></i>";
					}
					echo "(" . $thing['good'] . ")&nbsp;&nbsp;&nbsp;&nbsp;";
					if ($scoreFlag == 0) {
						echo "<a href='#nogo' onclick='badScore(" . $tid . ");'><i class='icon-rain'></i></a>";
					} else {
						echo "<span><i class='icon-rain-inv'></i>&nbsp;";
					}
					echo "(" . $thing['bad'] . ")&nbsp;&nbsp;&nbsp;&nbsp;<span>";
				 ?>
			</div>
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