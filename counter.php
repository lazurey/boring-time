<?php 
	include('head.php');
	// standard page template
?>
<article class="container">
	<a class="btn" href="add-counter.php">创建一个新的计数器</a>

	<ul class="counter-list">
		<?php 
			$query = "SELECT * FROM bt_item i, bt_relate r WHERE r.aid = " . $cook_uid . " and ";
			$query .= "i.type = 1 and r.rtype = 5 and i.id = r.bid order by i.id DESC";
			$result = mysql_query($query);
			$html = "";
			if (mysql_num_rows($result) > 0) {
				while ($item = mysql_fetch_array($result)) {
					$html .= "<li><h5>" . $item['name'] . "</h5>";
					$html .= "<a class='count-btn' href='#nogo' onclick='minusCounter(" . $item['id'] . ")'>";
					$html .= "-</a>" . "<span class='count-now'> " . $item['remark'] . " </span>";
					$html .= "<a class='count-btn' href='#nogo' onclick='plusCounter(" . $item['id'] . ")'>+</a></li>";
				}
			} else {
				$html .= "<p>你还没有创建过任何计数器!</p>";
			}
			echo $html;
		?>
	</ul>
	
</article>
<?php 
	include('footer.php');
?>
</body>
</html>