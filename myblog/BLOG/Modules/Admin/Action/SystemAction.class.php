<?php
	Class  SystemAction  extends CommonAction{
		Public function verify(){    //显示模版
			$this->display();
		}
		Public function updateVerify(){
			if(F('verify',$_POST,CONF_PATH)){
				$this->success('修改成功',U(GROUP_NAME.'/Index/index'));
			}else{
				$this->error('修改失败,请修改' . CONF_PATH . 'verify.php权限');
			}
		}
	}
?>