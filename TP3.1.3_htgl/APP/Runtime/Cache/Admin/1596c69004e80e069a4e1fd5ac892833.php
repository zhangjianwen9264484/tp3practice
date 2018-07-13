<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>添加用戶</title>
	<style>
		table{
			margin-left: 500px;
		}
		td{float: left;
		}
		th{
			float: left;
		}
		.add-role{
			display: block;
			width:100px;
			height: 20px;
			float: right;
			line-height: 20px;
			text-align: center;
			border: 1px solid blue;
			border-radius: 4px;
			cursor: pointer;
		}
	</style>
	<script type='text/javascript'>
	$(function() {
		$('.add-role').click(function(){
			var obj = $(this).parents('tr').clone();
			$('#last').before(obj);
		})
	});
	</script>
</head>
<body>
	<form action="<?php echo U('Admin/Rbac/addUserHandle');?>" method="post">
		<table>
			<tr>
				<th colspan="2" align="center">添加用戶</th>
			</tr>
			<tr>
				<td align="right">用戶账号</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td align="right">密　　码</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td align='right'>所属角色</td>
				<td>
					<select name="role_id[]" id="">
					<option value="">请选择角色</option>
						<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v["name"]); ?>(<?php echo ($v["remark"]); ?>)</option><?php endforeach; endif; ?>
					</select>
					<span class="add-role">添加一个角色</span>
				</td>
			</tr>
			<tr id="last">
				<td colspan="2" align="center">
					<input type="submit" name="" value="保存添加">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>