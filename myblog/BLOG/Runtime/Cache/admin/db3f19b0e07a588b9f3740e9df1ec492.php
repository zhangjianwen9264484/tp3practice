<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
	<body>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>属性名称</th>
				<th>颜色</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
					<td aligin="right"><?php echo ($v["id"]); ?></td>
					<td aligin="right"><?php echo ($v["name"]); ?></td>
					<td aligin="right">
						<div style="width:50px;height:20px;background:<?php echo ($v["color"]); ?>"></div>
					</td>
					<td aligin="right">
						[<a href="">修改</a>]
						[<a href="">删除</a>]
					</td>
				</tr><?php endforeach; endif; ?>
		</table>
	</body>
</html>