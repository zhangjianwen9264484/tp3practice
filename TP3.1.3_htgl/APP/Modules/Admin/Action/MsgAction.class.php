<?php
	class MsgAction extends CommonAction{
		Public function index(){
			import('ORG.Util.Page');
			$count = M('message')->count();
			$page = new Page($count,2);
			$show = $page->show();
			$mess = M('message')->order("cratetime DESC")->limit($page->firstRow.','.$page->listRows)->select();
			$this->mess = $mess;
			$this->show = $show;
			$this->display();
		}
		Public function Delete(){
			$id = I("id");
			$num = M("message")->where(array("id"=>$id) )->delete();
			if($num > 0 ){
				$this->success("删除成功",U('Admin/Msg/index'));
			}else{
				$this->error("删除失败");
			}
		}
	}
?>