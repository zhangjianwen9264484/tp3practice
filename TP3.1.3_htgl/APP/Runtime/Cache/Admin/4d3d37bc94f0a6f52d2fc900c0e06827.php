<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="__PUBLIC__/Css/login.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>用户注册</title>
		<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="__PUBLIC__/Js/login.js"></script>
		<script type="text/javascript">
			$(function(){
				$("input[name='username']").blur(function(){
					var username = $("input[name='username']");
					$.post("__URL__/CheckName",{username:username.val().trim()},function(stat){
						if(stat==0){
							validate.username=0;
							username.parent().find("span").remove();
						}else{
							username.parent().find("span").remove().end().append("<span class='error'>用户已存在</span>");
						}

					})
				})
			});
		</script>
	</head>
	<body>
		<div id="top">

		</div>
		<div class="login">	
			<form action='<?php echo U("Register/doReg");?>' method="post" id="login">
			<div class="title">
				后盾网 | 注册账号
			</div>
			<table border="1" width="100%">
				<tr>
					<th>管理员帐号:</th>
					<td>
						<input type="username" name="username" class="len250"/>
					</td>
				</tr>
				<tr>
					<th>密码:</th>
					<td>
						<input type="password" class="len250" name="password"/>
					</td>
				</tr>
				<tr>
					<th>确认密码:</th>
					<td>
						<input type="password" class="len250" name="passwordsec"/>
					</td>
				</tr>
				<tr>
					<th>验证码:</th>
					<td>
						<input type="code" class="len250" name="code"/> <img src='<?php echo U("Public/code");?>' id="code" onclick="this.src=this.src+'?'+Math.random()" alt="验证码"/> 
						<a href="javascript:void(change_code(this));">看不清</a>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-left:160px;"> <input type="submit" class="submit" value="提交"/></td>
				</tr>
			</table>
		</form>
	</div>
	</body>
</html>