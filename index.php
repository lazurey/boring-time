<?php 
include('head.php');
$today = getdate();
$date = $today['mday'];
$month = $today['month'];
 ?>
	<div class="container">
		<aside class="home-suggestion">
			<h4>
				<i class="icon-time"></i>
				我有5分钟, 想看看别人的建议
			</h4>
			<ul class="clearfix">
				<?php 
					$query = getItemsQuerySql(1, 0, 10);
					$result = mysql_query($query);
					$html = "";
					if (mysql_num_rows($result) > 0) {
						while ($row = mysql_fetch_array($result)) {
							$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "'>" . $row['title'] . "</a></li>";
						}
					}
					print $html;
				?>
		  	</ul>
		  	<a href="boring-list.php?type=1"><i class="icon-arrow-right"></i>更多建议</a>
		</aside>
		<section class="home-guess clearfix">
			<div class="boring-today">
				<a class="today-date" href="http://sandbox.runjs.cn/show/ydp3it7b" target="_blank">
					<span class="today-day"><?php print $date; ?></span><br>
					<span class="today-month"><?php print $month; ?></span><br>
					<small>看今日黄历</small>
				</a>
			</div>
			<ul>
				<?php 
					$todayBest = getTodayBest();
					if ($todayBest) {
						$timeIcon = "<i class='icon-time'></i>";
						$todayBestHtml = "";
						while ($row = mysql_fetch_array($todayBest)) {
							$todayBestHtml .= "<li>" . $timeIcon . "<a href='boring-thing.php?tid=" . $row['tid'] . "'>&nbsp;";
							$todayBestHtml .= $row['title'] . "</a></li>";
							$timeIcon .= "<i class='icon-time'></i>";							
						}
						print $todayBestHtml;
					}
				?>
			</ul>
		</section>
		<aside class="home-request clearfix">
			<h4>
				<i class="icon-time"></i><i class="icon-time"></i>
				我有10分钟, 愿意帮个小忙...
			</h4>
			<ul class="clearfix">
				<?php 
					$query = getItemsQuerySql(2, 0, 10);
					$result = mysql_query($query);
					$html = "";
					if (mysql_num_rows($result) > 0) {
						while ($row = mysql_fetch_array($result)) {
							$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "'>" . $row['title'] . "</a></li>";
						}
					}
					print $html;
				?>
		  	</ul>
		  	<a href="boring-list.php?type=2"><i class="icon-arrow-right"></i>更多建议</a>
		</aside>
		<section class="home-project clearfix">
			<h4>
				<i class="icon-time"></i><i class="icon-time"></i><i class="icon-time"></i>
				我有30+分钟, 想做点什么...
			</h4>
			<ul class="clearfix">
				<?php 
					$query = getItemsQuerySql(3, 0, 12);
					$result = mysql_query($query);
					$html = "";
					if (mysql_num_rows($result) > 0) {
						while ($row = mysql_fetch_array($result)) {
							$html .= "<li><a href='boring-thing.php?tid=" . $row['tid'] . "' title='" . $row['title'] . "'>" . $row['one_word'] . "</a></li>";
						}
					}
					print $html;
				?>
		  	</ul>
		  	<a href="boring-list.php?type=3"><i class="icon-arrow-right"></i>更多项目</a>
		</section>
	</div>
	<?php 
		include('footer.php');
	 ?>
</body>
</html>