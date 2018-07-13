<?php
	class LoginAction extends Action{
		//验证密码，验证码
		PUblic function doLogin(){
			if(!IS_POST) halt("页面不存在");
			if(session("code") !== I("code","","md5")){    //MD5($_POST["code"])
					$this->error("验证码错误");
			}
			//$where["username"] = I("username");  //$_POST["username"];
			$username=I("username");
			$user=M("user")->where(array("username"=>$username))->find();
			if($user["lock"]) $this->error("用户被锁定");
			//验证密码
			if($user["password"] == I("password") ) {
				$data=array(
						'id'=>$user['id'],
						'loginip'=> get_client_ip(),
						'logintime'=>time()
					);
				M("user")->save($data);
				//存储session信息
				//$_SESSION["username"] = $arr["username"];
				session(C('USER_AUTH_KEY'),$user["id"]);
				session("username",$user["username"]);
				session("loginip",$user["loginip"]);
				session("logintime",date('Y-m-d H:i:s',$user["logintime"]) );

				//超级管理员识别
				if($user["username"] == C('RBAC_SUPERADMIN')){
					session( C('ADMIN_AUTH_KEY'),true);
				} 
				//读取用户权限
				import('ORG.Util.RBAC');
				RBAC::saveAccessList();  //中要有level=1的，role中status必须为1
				
				//dump($_SESSION,'1','<pre>',0);die;
				
				$this->success("登陆成功","__GROUP__/Index/index");	
			}else{
				$this->error("密码错误，请重新输入!");
			}
		}
		Public function checkName(){
			$m=M("user");
			//$where["username"] =$_POST["username"]
			$username= I("username");
			$arr=$m->where(array('username'=>$username))->find();
			if($arr){
				echo 1;
			}else{
				echo 0;
			}
		}
	}
?>