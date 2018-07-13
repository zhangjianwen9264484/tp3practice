<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    Public function index(){
    	$this->display();
	}
	
	Public function logout(){
				$_SESSION=array();
				if( isset($_COOKIE[session_name()] ) ){
					setcookie(session_name(),"",time()-1,"/");
				}
				session_destroy();
				$this->redirect("Index/index");
		}
}