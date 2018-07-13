<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>添加角色</title>
	<style>
		table{
			margin-left: 500px;
		}
		td{float: left;
		}
		th{
			float: left;
		}
	</style>
</head>
<body>
	<form action="<?php echo U('Admin/Rbac/addRoleHandle');?>" method="post">
		<table>
			<tr>
				<th colspan="2">添加角色</th>
			</tr>
			<tr>
				<td>角色名称</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>角色描述</td>
				<td><input type="text" name="remark"></td>
			</tr>
			<tr>
				<td>是否开启</td>
				<td>
				<input type="radio" name="status" value="1" checked="checked">开启
				<input type="radio" name="stastus" value="0">关闭
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="" value="保存添加">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>