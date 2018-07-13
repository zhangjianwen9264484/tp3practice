<?php
	class CommonAction extends Action{
			Public function _initialize(){
					if(!isset($_SESSION[C('USER_AUTH_KEY')]) ){
						$this->redirect('Admin/Login/index');
					}
					//检测不需要验证的
					$notAuth = in_array(MODULE_NAME,explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
					//检查是否开启验证
					if (C('USER_AUTH_ON') && !$notAuth){
						import('ORG.Util.RBAC');
						//dump($_SESSION,'1','<pre>',0);

						RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限');     //没有分组不用填参数，调用分组得填入分组名
				}
			}
}
?>
