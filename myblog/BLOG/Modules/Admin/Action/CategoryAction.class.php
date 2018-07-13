<?php
	Class CategoryAction extends CommonAction{
		//分类列表
		Public function index(){
			$cate = M('Cate')->order('sort ASC')->select();
			//$cate = Levelmerger($cate); 声明函数方法 
			//调用写好的类方法
			import('Class.Category',APP_PATH);
			$cate = Category::Levelmerger($cate);
			
			//获取父节点 首页>>菜单>>当前位置
			//$cate = Category::getParents($cate,12);

			//递归 成 多维数组
			//$cate = Category::unlimitForLayer($cate,'cate');

			//获取父级ID下所有子分类的ID
			//$cate = Category::getChildsId($cate,4);

			//获取父级Id下子级分类
			//$cate = Category::getChilds($cate,4);
			$this->cate = $cate;
			$this->display();
		}

		//添加表单模版
		Public function addCate(){
			$this->pid = I('pid',0,'intval');
			$this->display(); 
		}

		//添加分类表单处理
		Public function addCateHandle(){
			//dump($_POST,1,'<pre>',0);die;
			if(M('Cate')->add($_POST)){
				$this->success('添加成功',U(GROUP_NAME.'/Category/index'));
			}else{
				$this->error('添加失败');
			}
		}

		//排序
		Public  function sort(){
			foreach ($_POST as $id => $sort) {
				M('Cate')->where(array('id'=>$id))->setField('sort',$sort);
			}
			$this->redirect(GROUP_NAME.'/Category/index');
		}
	}
?>