<?php 
	include('head.php');
	// standard page template
?>
<article class="container min-main">
	<section class="control-section clearfix">
		<div class="span6">
			<?php if ($cook_uid == 1) { ?>
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
<h4>被最多人完成的成就:</h4>
<ul>
	<li></li>
</ul>
<h4>成就完成最多的人:</h4>
<ul>
	<li></li>
</ul>
</article>
<?php 
	include('footer.php');
?>
</body>
</html>