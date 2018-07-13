<?php
	Class IndexAction extends Action{
		Public function index(){
			//判断是都存在缓存 不存在执行数据库查询
			if(!$topcate = S('index_list')){
				$topcate = M('cate')->where(array('pid'=>0))->order('sort')->select();
				import('Class.Category',APP_PATH);
				$cate = M('cate')->order('sort')->select();
				$db = M('blog');
				$field = array('id','title','time');

				foreach ($topcate as $k => $v) {
					$cids = Category::getChildsId($cate,$v['id']);
					$cids[] = $v['id'];
					$where = array('cid'=>array('IN',$cids));
					$topcate[$k]['blog'] = $db->field($field)->where($where)->order('time DESC')->select();
				}
				//生成缓存数据
				S('index_list',$topcate,10);   //参数  缓存名 缓存的数据变量 时间
			}
			$this->topcate = $topcate;  
			$this->display();
		}
	}
?> 