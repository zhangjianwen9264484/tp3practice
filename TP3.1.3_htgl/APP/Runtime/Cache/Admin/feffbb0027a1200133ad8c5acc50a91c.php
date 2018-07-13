<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>用户列表</title>
</head>
<body>
	<table class="table">
		<tr>
			<th >ID</th>
			<th>用户名称</th>
			<th>上一次登陆IP</th>
			<th>上一次登陆时间</th>
			<th>锁定状态</th>
			<th>用户所属组别</th>	
			<th>操作</th>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr style="text-align:center">
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["username"]); ?></td>
				<td><?php echo ($v["loginip"]); ?></td>
				<td><?php echo (date("Y-m-d H:i",$v["logintime"])); ?></td>
				<td>
					<?php if($v["lock"]): ?>锁定
						<?php else: ?>
						未锁定<?php endif; ?>
					</td>
				<td>
					<?php if($v["username"] == C("RBAC_SUPERADMIN")): ?>超级管理员
						<?php else: ?>
							<ul>
								<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$role): ?><li style="list-style-type:none;"><?php echo ($role["name"]); ?>(<?php echo ($role["remark"]); ?>)</li><?php endforeach; endif; ?>
							</ul><?php endif; ?>
				</td>
				<td>
					<a href="<?php echo U('Admin/Rbac/Lock',array('rid'=>$v['id']));?>">锁定</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
	
</body>
</html>