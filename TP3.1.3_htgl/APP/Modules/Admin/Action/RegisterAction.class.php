<?php
	class RegisterAction extends Action{
		Public function register(){
			$this->display();
		}
		//注册
		Public function doReg(){	
			//$_POST可以用I()函数代替
			if(md5($_POST['code'] ) !==  session("code") ){
				$this->error("验证码错误！");
			}
			if(I("password")==I("passwordsec") && I("password") !==''){
				$m=M('user');
				$m->username=$_POST["username"];
				$m->password=$_POST["password"];
				$m->create();
			}else{
				$this->error("两次输入的密码不一致");
			}

			$isNum = $m->add();
			if($isNum > 0){
				$this->success("注册成功","__GROUP__/Login/index");
			}else{
				$this->error("注册失败");
			}
		}
		function CheckName(){
			$m=M("User");
			$name=I("username");
			$num=$m->where(array("username"=>"$name"))->find();
			if($num > 0 ){
				echo 1;
			}else{
				echo 0;
			}
	
		}
	}	
?>