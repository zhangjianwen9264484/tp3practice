<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>角色列表</title>
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>角色名称</th>
			<th>角色描述</th>
			<th>开启状态</th>
			<th>操作</th>
			<th></th>	
		</tr>
		<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr style="text-align:right">
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["remark"]); ?></td>
				<td>
					<?php if($v['status']): ?>开启
						<?php else: ?>
						关闭<?php endif; ?>
				</td>
				<td>
					<a href="<?php echo U('Admin/Rbac/access',array('rid'=>$v['id']));?>">配置权限</a>
				</td>
				<td></td>
			</tr><?php endforeach; endif; ?>
	</table>
	
</body>
</html>