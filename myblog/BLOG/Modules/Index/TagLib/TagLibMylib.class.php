<?php
	import('TagLib');
	/**
	 * 自定义标签库
	 * 前台调用 <nav limit="" order=""> comntent</nav>
	 */
	Class TagLibMylib extends  TagLib{
		Protected $tags = array(
				'nav' =>array('attr' =>'limit,order', 'close'=>1)    //闭合标签为close为 1 
			);
		Public function _nav($attr,$content){
			$attr = $this->parseXmlAttr($attr);
			$str = <<<str
<?php
	\$_nav_cate = M('cate')->order("<{$attr['order']}>")->select();
	import('Class.Category',APP_PAHT);
	\$_nav_cate = Category::unlimitedForLayer(\$_nav_cate);
	foreach (\$_nav_cate as $_nav_cate_v) : 
	extract(\$_nav_cate);
?>
str;
		$str .= $content;
		$str .= '<?php endforeach;?>';
		return $str;
		}
	}
