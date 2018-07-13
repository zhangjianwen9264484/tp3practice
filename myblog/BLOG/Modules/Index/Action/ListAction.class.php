<?php
	Class ListAction Extends Action{
		Public function index(){
			import('Class.Category',APP_PATH);
			import('ORG.Util.Page');

			$id = (int) $_GET['id'];
			$cate = M('cate')->order('sort')->select();
			$cids = Category::getChildsId($cate,$id);
			$cids[] = $id;
			//list中每一条都有自己的分类，要用视图模型，   一个分类下面很多条的话，用关联模型
			$where =array('cid'=>array('IN',$cids)); 
			$count = M('blog')->where($where)->count();
			//分页
			$page = new Page($count,15);
			$limit = $page->firstRow .','.$page->listRows;

			$this->list_blog = D('BlogView')->getALl($where,$limit);
			$this->page = $page->show(); 
			$this->display(); 
		}
	}
?> 