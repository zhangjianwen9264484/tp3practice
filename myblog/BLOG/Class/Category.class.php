<?php
	class Category{
			//组合一维数组
			Static Public function Levelmerger($cate,$html="--&nbsp;&nbsp;",$pid= 0,$level= 0){
				$arr=array();
				foreach ($cate as $v) {
					if($v['pid'] == $pid){
						$v['level'] =$level+1;
						$v['html'] = str_repeat($html, $level);
						$arr[] = $v;
						$arr = array_merge($arr,self::Levelmerger($cate,$html,$v['id'],$level+1));
					}
				}
				return $arr;
			}
			//组合多维数组
			Static Public function unlimitForLayer($cate,$name='child' ,$pid = 0){
				$arr=array();
				foreach ($cate as  $v) {   
					if($v['pid'] == $pid){
						$v[$name]=self::unlimitForLayer($cate,$name,$v['id']);
						$arr[] = $v;
					}
				}
				return $arr;		
			}
			//传递一个子分类ID返回所有父级分类ID
			Static Public function getParents($cate,$id){
				$arr = array();
				foreach ($cate as $v) {
					if($v['id'] == $id ) {
						$arr[] = $v;
						$arr = array_merge(self::getParents($cate,$v['pid']),$arr);  //改变顺序。让父级的在前边
					}
				}
				return $arr;
			}
			//传递一个父级分类ID返回所有子分类的ID
			Static Public function getChildsId ($cate,$pid=0){
				$arr = array();
				foreach ($cate as $v) {
					if($v['pid'] == $pid){
							$arr[] = $v['id']; 
							$arr = array_merge($arr,self::getChildsId($cate,$v['id']));
					}
				}
				return $arr;
			}
			//传递一个父级分类ID返回所有子级分类
			Static Public function getChilds($cate,$pid){
				$arr = array();
				foreach ($cate as $v) {
					if ($v['pid'] == $pid) {
							$arr[] = $v;
							$arr = array_merge($arr,self::getChilds($cate,$v['id']));
					}
				}
				return $arr;
			}
	}
?>