<?php
	 function Levelmerger($cate,$html='&nbsp;&nbsp;',$pid = 0,$level=0){
			$arr=array();
			foreach ( $cate as $v ) {
				if( $v['pid'] == $pid ){
					$v['level'] = $level + 1;
					$v['html'] = str_repeat($html, $level); //参数：填充内容和个数
					$arr[] = $v;
					$arr = array_merge($arr,Levelmerger($cate,$html,$v['id'],$level+1));

				}
			}
		return $arr;
	}
	//打印函数
	function p($v){
		$str = dump($v,1,'<pre>',0);
		//return $str;
	}
?>