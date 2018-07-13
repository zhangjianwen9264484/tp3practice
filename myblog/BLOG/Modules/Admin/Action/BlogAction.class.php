<?php
	Class BlogAction extends CommonAction{
		//显示博文
		Public function index(){
			//关联模型查询
			//$field = array('id','title','content','time','click');
			// $field = array('del');
			// $where = array('del' => 0);
			// $this->blog = D('BlogRelation')->field($field,true)->where($where)->relation(true)->select();
			//调用BlogRelation里写好的方法
			$this->blog = D('BlogRelation')->getBlogs();
			$this->display();
		}

		//添加博文屬性和分類
		Public function blog(){
			//查询分类
			Import('Class.Category',APP_PATH);
			$cate = M('cate')->order('sort')->select();
			$this->cate = Category::Levelmerger($cate);
			//查询属性
			$attr = M('attr')->select();
			$this->attr = $attr;
			$this->display();
		}


		//添加博文
		Public function addblog(){
			//多对多，需要关联模型 两个表 （BlogRelationModel。class.php） 在公用文件夹
			//D('BlogRelation');
			$data = array(
				'title' => $_POST['title'],
				'content'=>$_POST['content'],
				'summary' => $_POST['summary'],
				'time' =>time(),
				'click' =>(int) $_POST['click'],
				'cid' => (int) $_POST['cid']
				// 'attr' =>arry(),  需要判断是否存在
				);
			// if(isset($_POST['aid'])){
			// 	foreach ($_POST['aid'] as $v) {
			// 		$data['attr'][]=$v;
			// 	}
			// }
			// D('BlogRelation')->relation(true)->add($data); //当前版本的tp有问题  属性表每次提交都会先清空表在保存

			if($bid =M('blog')->add($data)){

				if(isset($_POST['aid'])){
					$sql = 'INSERT INTO `'. C('DB_PREFIX').'blog_attr`(bid,aid) VALUES';
					foreach ($_POST['aid'] as $v) {
						$sql .= '('.$bid.','.$v.'),';
					}
					$sql = rtrim($sql,',');
					M('blog_attr')->query($sql);
				}
				$this->success('发布成功',U(GROUP_NAME.'/Blog/index'));	
			}else{
				$this->error('发布失败');
			}
		}

		//删除到回收站
		Public function delete(){
			$type =(int) $_GET['type'];
			$msg = $type ? '删除到回收站' : '还原成功';
			$update =array(
				 'id' => (int) $_GET['id'],
				 'del'=>$type
				);
			if( M('blog')->save($update) ){
				$this->success($msg,U(GROUP_NAME.'/Blog/index'));
			}else{
				$this->error($msg);
			}
		}
		//回收站
		Public function trach(){
			//和index方法内容相似，所以在BlogRelation里写方法，简化代码
			// $field = array('del');
			// $where = array('del' => 1);
			// $this->blog = D('BlogRelation')->field($field,true)->where($where)->relation(true)->select();
			$this->blog = D('BlogRelation')->getBlogs(1);
			$this->display('index');
		
		}

		//彻底删除
		Public function comdelete(){
				$id = (int)$_GET['id'];
				if(M('blog')->delete($id)){
					M('blog_attr')->where(array('bid'=>$id))->delete();
					$this->success('删除成功',U(GROUP_NAME.'/Blog/trach'));
				}else{
					$this->error('删除失败');
				}
		}
		//清空回收站

		
		//上传文件
		Public function upload(){			 
			//方法一  直接修改调用 的类文件
			//方法二 
			// 	$config = array(
			// 		 'aotoSub'=>true,
			// 		);
			// $upload = new UploadFile($config);
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->autoSub =true;
			$upload->subType ='date';
			$upload->dateFormat = 'Ym';
			if( $upload->upload('./Uploads/') ){
				$info =$upload ->getUploadFileInfo();
				//给图片加水印(框架写好的类)
				// import('ORG.Util.Image');
				// Image::water('./Uploads/' . $info[0]['savename'], './Data/water.png');
				//调用自己的类
				import('Class.Image', APP_PATH);
				Image::water('./Uploads/' . $info[0]['savename']);
				// p($info);
				echo json_encode(array(
		 		"state" => 'SUCCESS',
			    "url" => 'http://'.$_SERVER['SERVER_NAME'].__ROOT__.$info['0']['savepath'].$info['0']['savename'],   //路径要写对才可以显示图片
			    "title" => htmlspecialchars($_POST['pictitle'],ENT_QUOTES),
			    "original" =>$info[0]['name'],
			    "type" => $info[0]['type'],
			    "size" => $info[0]['size']
					));
			}else{
				echo json_encode(array(
					'state' =>$upload->getErrorMsg(),
					));
			}	
		}
		//或者改写controll 见浏览器书签
	}
?> 