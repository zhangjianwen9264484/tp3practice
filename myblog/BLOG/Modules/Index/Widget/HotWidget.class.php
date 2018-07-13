<?php
	Class HotWidget extends Widget{

		Public function render($data){  //需要建立Hot.html模版文件
			$field = array('id','title','click');
			$data['blog'] = M("blog")->field($field)->limit($data['limit'])->order('click DESC')->select();
			return $this->renderFile('',$data);
		}
	}
?>