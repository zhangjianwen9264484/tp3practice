<?php
	Class  NewWidget extends Widget{

		Public function render($data){
			$limit=$data['limit'];
			$field = array('id','title','click');
			$data['blog'] = M('blog')->field($field)->order('time DESC')->limit($limit)->select(); 
			return $this->renderFile('',$data);
		}
	}
?>