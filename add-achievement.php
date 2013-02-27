<?php 
	include('head.php');
	// standard page template
?>
<article class="container min-main">
	<h2>添加一个成就</h2>
	<form name="add-achieve" id="add-achieve" method="post" action="add-achieve.php">
		<input type="text" name="title" placeholder="成就名称" required>
		<br>
		<textarea name="desc" placeholder="成就说明" required>
		</textarea>
		<br>
		<input type="submit" value="提交" class="btn">
	</form>
</article>
<?php 
	include('footer.php');
?>
</body>
</html>