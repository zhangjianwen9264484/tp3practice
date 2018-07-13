<?php
	Class ShowAction extends Action{
		Public function index(){
			echo 11;
			$id = (int) $_GET['id'];	
			//实现点击次数加1  启用静态缓存不能这么使用
			//M('blog')->where(array('id'=>$id))->setInc('click');

			import('Class.Category',APP_PATH);
			$field = array('id,title','time','content','cid');
			$this->blog =M('blog')->where(array('id'=>$id))->field($field)->find($id);

			$cid = $this->blog['cid'];
			$cate = M('cate')->order('sort')->select();
			$parent = Category::getParents($cate,$cid);
			$this->parent = $parent;
			$this->last =count($parent)-1;
			//p($cate);die;
			$this->display(); 
		}
		Public function setClick(){
			    $id = (int) $_GET['id'];
			    $where = array('id' =>$id);
			    M('blog')->where($where)->setInc('click');
			    $click = M('blog')->where($where)->getField('click');
			    echo 'document.write('.$click.')';

		}
	}
?>