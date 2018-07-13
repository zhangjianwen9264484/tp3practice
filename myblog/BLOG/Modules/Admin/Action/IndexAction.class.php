<?php
	class  IndexAction extends CommonAction{
		Public function index() {
			$this->display();
		}
		
		Public function logout(){
			$_SESSION=array();
			if( isset($_COOKIE[session_name()]) ){
				setcookie(session_name(),'',time()-1,'/');
			}
			session_destroy();
			$this->redirect(GROUP_NAME.'/Login/index');
		}
	}
?> 