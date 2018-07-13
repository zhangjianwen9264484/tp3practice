<?php
	Class BlogViewModel extends ViewModel{
		Protected $viewFields = array(
			'blog' =>array(
					'id','title','time','click','summary',
					'_type' =>'LEFT'     //和下边表的关联类型  左关联 右关联 中间关联  
				),
			'cate' =>array(
				'name',
				'_on' => 'blog.cid =cate.id'
				)
			);
		Public function getAll($where,$limit){
			return $this->where($where)->limit($limit)->order('time DESC')->select();			
		} 
	}
?>