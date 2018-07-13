<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<head>
	<title>留言管理</title>
</head>
<body>
	<table>
	<tr>
		<th>ID</th>
		<th>发布人</th>
		<th>留言内容</th>
		<th>留言时间</th>
		<th>操作</th>
		<th></th>
	</tr>
	<?php if(is_array($mess)): foreach($mess as $key=>$v): ?><tr style="text-align:right">
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["content"]); ?></td>
			<td><?php echo (date("Y-m-d H:i",$v["cratetime"])); ?></td>
			<td>
				<a href="<?php echo U('Msg/Delete',array('id'=>$v['id']));?>">刪除</a>
			</td>
			<td></td>
		</tr><?php endforeach; endif; ?>
		<tr style="text-align:center">
			<td colspan="6">
				<?php echo ($show); ?>
			</td>		
		</tr>
	</table>
</body>
</html>