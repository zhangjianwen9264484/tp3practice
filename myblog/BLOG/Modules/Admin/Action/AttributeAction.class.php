<?php
	Class  AttributeAction Extends CommonAction{
		//查询属性列表
		Public function index(){
			$attr = M('attr')->select();
			$this->attr = $attr;
			$this->display();
		}
		//添加属性
		Public function  addAttr(){
			$this->display();
		}
		//添加属性表单处理
		Public function addAttrHandle(){
			if(M('attr')->add($_POST)){
				$this->success('提交成功',U(GROUP_NAME.'/Attribute/index'));
			}else{
				$this->error('提交失败');
			}
		}
	}
?>