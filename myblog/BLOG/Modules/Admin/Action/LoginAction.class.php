<?php
	Class LoginAction extends Action{
		Public function index() {
			$this->display();
		}
		Public function verify(){
			import('Class.Image',APP_PATH); //引入自己的验证码类   
			Image::Verify();
		}
		//判断登陆
		Public function login(){
			if(!IS_POST) halt('页面不存在');
			if(I('verify','','strtolower') != session('verify')) $this->error('验证码错误');
			$user=M('user')->where(array('username'=>I('username')))->find();
			if($user && $user['password']==md5( I('password') ) ){
					//更新登陆信息
					$data=array(
							'id' => $user['id'],
							'loginip' =>get_client_ip(),
							'logintime' =>time()
						);
					M('user')->save($data);

					//存贮session信息
					session('uid',$user["id"]);
					session('username',$user['username']);
					session('logintime',date('Y-m-d H:i:s',$user['logintime']) );
					session('loginip',$user['loginip']);

					$this->success('登陆成功',U(GROUP_NAME.'/Index/index') );
				}else{
					$this->error('密码错误，请重试');
				}
		}
		//检查用户名是否存在
		Public function checkusername(){
			$user=M('User')->where(array('username'=>I('username')))->find();
			if($user){
				echo 1;
			}else{
				echo 0;
			}
		}
	}
?>