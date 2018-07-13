<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/Attribute/addAttrHandle');?>" method="post">
		<table class="table">
			<tr>
				<th colspan='2'>添加博文属性</th>
			</tr>
			<tr>
				<td align="right">属性名称</td>
				<td>
					<input type="text" name="name"/>
				</td>
			</tr>
			<tr>
				<td align="right">标题颜色</td>
				<td>
					<input type="text" name='color' />
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
					<input type="submit" name="" value="提交"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>