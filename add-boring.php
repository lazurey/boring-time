<?php 
	include('head.php');
	// standard page template
	$type = 1;
	if (isset($_GET['type'])) {
		$type = intval(trim($_GET['type']));
	}
?>
<section class="container clearfix add-item">
	<form name="add-item" action="add-item.php" id="add-item" class="form-horizontal">
<?php

	if ($type == 2) { // request ?>
		<h4>我想请求无聊的众生帮我一个忙...</h4>
		<div class="span6">
		<div class="control-group">
			<label class="control-label" for="title">标题</label>
			<div class="controls">
				<input type="text" id="title" name="title" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="desc">描述</label>
			<div class="controls">
				<textarea rows="13" id="desc" cols="300" name="desc" required></textarea>
			</div>
		</div>
	</div>
	<div class="span4">
		<div class="control-group">
			<!--<label class="control-label" for="cat">分类</label>-->
			<div class="controls">
				<input type="hidden" id="cat" name="cat" value="1">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tag">标签</label>
			<div class="controls">
				<input type="hidden" id="tag" name="tag" value="">
			</div>
		</div>
	</div>
	<?php } else if ($type == 3) { // project ?>
		<h4>我有一个主意, 既然大家都无聊, 那就一起来做吧...</h4>
		<div class="span6">
		<div class="control-group">
			<label class="control-label" for="title">标题</label>
			<div class="controls">
				<input type="text" id="title" name="title" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="desc">描述</label>
			<div class="controls">
				<textarea rows="13" id="desc" cols="300" name="desc" required></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="word">一个字</label>
			<div class="controls">
				<input type="text" id="word" name="word" placeholder="用一个字描述你的项目" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="contact">联系方式</label>
			<div class="controls">
				<input type="text" id="contact" name="contact" placeholder="Email" required>
			</div>
		</div>
	</div>
	<div class="span4">
		<div class="control-group">
			<label class="control-label" for="cat">分类</label>
			<div class="controls">
				<select id="cat" name="cat">
					<option value="1" selected>程序</option>
					<option value="2">生活</option>
					<option value="3">习惯</option>
					<option value="4">运动</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tag">标签</label>
			<div class="controls">
				<input type="text" id="tag" name="tag" value="">
				<span>标签之间用逗号分隔, 使别人更快捷的找到这个条目</span>
			</div>
		</div>
	</div>
	<?php } else { // suggestion ?>
		<h4>我愿意给无聊的众生提一个建议...</h4>
		<div class="span6">
		<div class="control-group">
			<label class="control-label" for="title">标题</label>
			<div class="controls">
				<input type="text" id="title" name="title" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="desc">描述</label>
			<div class="controls">
				<textarea rows="13" id="desc" cols="300" name="desc" required></textarea>
			</div>
		</div>
	</div>
	<div class="span4">
		<div class="control-group">
			<label class="control-label" for="cat">分类</label>
			<div class="controls">
				<select id="cat" name="cat">
					<option value="1" selected>程序</option>
					<option value="2">生活</option>
					<option value="3">习惯</option>
					<option value="4">运动</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tag">标签</label>
			<div class="controls">
				<input type="text" id="tag" name="tag" value="">
			</div>
		</div>
	</div>
	<?php }
?>
	<input type="hidden" name="type" value="<?php print $type; ?>" readonly>
	
	<div class="span10">
		<input class="btn" type="submit" value="提交">
		<a href="index.php">取消</a>
	</div>
</form>
</section>
<?php 
	include('footer.php');
?>
</body>
</html>