<?php
	Class  CommonAction extends Action{
		//自动验证
		Public function _initialize(){
			if(!isset($_SESSION["username"] ) ){
					//$this->error('您还没有登陆,请先登录');
					$this->redirect(GROUP_NAME.'/Login/index');
			}		
		}
	}
?>