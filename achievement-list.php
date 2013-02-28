<?php 
	include('head.php');
	// standard page template
?>
<article class="container min-main">
	<section class="control-section clearfix">
		<div class="span6">
			<?php if (adminGroupCheck($cook_uid)) { ?>
			<a class="btn" href="add-achievement.php">
				添加成就
			</a>
			<?php } else { ?>
			<a class="btn" href="https://jinshuju.net/f/512d579224290a2ee7001753">添加成就</a>
			<?php } ?>
		</div>
		<div class="span4">
			<div class="btn-group" data-toggle="buttons-radio">
				<button type="button" class="btn active" onclick="filterAchieve(1);">所有</button>
				<button type="button" class="btn" onclick="filterAchieve(2);">已完成</button>
				<button type="button" class="btn" onclick="filterAchieve(3);">未完成</button>
			</div>
		</div>
	</section>
	<table class="table table-hover achieve-table">
		<tr>
			<th class="achieve-process">#</th>
			<th class="achieve-title">成就</th>
		</tr>
		<?php 
			$query = "SELECT a.* , r.rid FROM bt_achievement a ";
			$query .= " LEFT JOIN bt_relate r ON ";
			$query .= " a.aid = r.bid AND r.rtype = 2 and r.aid = " . $cook_uid;
			$query .= " WHERE 1 = 1 ORDER BY a.aid DESC ";
			// echo $query;
			$result = mysql_query($query);
			$html = "";
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_array($result)) {
					if ($row['rid'] > 0 && $row['rid'] != "NULL") {
						$html .= "<tr class='success'><td class='achieve-process'>完成</td>";
					} else {
						$html .= "<tr class='error'><td class='achieve-process'>-</td>";
					}
					$html .= "<td class='achieve-desc'><h5 class='achieve-title'>" . $row['title'] . "</h5>";

					$order   = array("\r\n", "\n", "\r");
					$replace = '<br />';
					$text = str_replace($order, $replace, $row['description']);

					$html .= "<p>" . $text;
					if (!($row['rid'] > 0 && $row['rid'] != "NULL")) {
						$html .= "<br><a class='btn' onclick='achieveIt(" . $row['aid'] . ")'>成就达成</a></p>";
					}
					$html .= "</td></tr>";
				}
			} else {
				$html .= "losers";
			}
			print $html;
		?>
	</table>
</article>
<article class="container">
<p>
	你可以<a href="https://jinshuju.net/f/512d579224290a2ee7001753" target="_blank">提交</a>你觉得好玩的成就, 也可以标记已经达成的成就. 总之就是无聊的时候<a href="http://lazurey.comeze.com/boring-time/boring-thing.php?tid=9">刷成就</a>也是一种选择.
</p>
</article>
<article class="container">
	<hr>
	<div class="span5">
		<h4>成就完成最多的人:</h4>
		<ul>
			<?php 
				$query = "select count(*) c, u.uid, u.name from bt_relate r, bt_user u ";
				$query .= "where r.aid = u.uid group by r.aid order by c desc limit 0, 10";
				$result = mysql_query($query);
				if (mysql_num_rows($result) > 0) {
					while ($row = mysql_fetch_array($result)) {
						echo "<li>" . $row['name'] . "完成" . $row['c'] . "项成就";
					}
				}
			?>
			<li></li>
		</ul>
	</div>
	<div class="span5">
		<h4>被最多人完成的成就:</h4>
		<ul>
			<?php 
				$query = "select count(*) c, a.aid, a.title from bt_relate r, bt_achievement a";
				$query .= " where r.bid = a.aid group by r.bid order by c desc limit 0, 10";
				$result = mysql_query($query);
				if (mysql_num_rows($result) > 0) {
					while ($row = mysql_fetch_array($result)) {
						echo "<li>" . $row['title'] . "被" . $row['c'] . "个人完成";
					}
				}
			 ?>
			<li></li>
		</ul>
	</div>
</article>
<?php 
	include('footer.php');
?>
</body>
</html>