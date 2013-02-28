<?php 
	include('head.php');
	// standard page template
	if (adminGroupCheck($cook_uid)) {
?>
<article class="container min-main">
	<h2>添加一个成就</h2>
	<form name="add-achieve" id="add-achieve" method="post" action="add-achieve.php">
		<input type="text" name="title" placeholder="成就名称" required>
		<br>
		<textarea name="desc" placeholder="成就说明" id="desc" required>
		</textarea>
		<br>
		<input type="submit" value="提交" class="btn">
	</form>
</article>
<?php 
} else {
	?>
	<article class="container min-main">
		<div class="alert alert-error">
		  <h4>页面不存在!</h4>
		  <p>别找了, 回<a href="index.php">首页</a>吧.</p>
		</div>
	</article>
	<?php
}
	include('footer.php');
?>
</body>
</html>