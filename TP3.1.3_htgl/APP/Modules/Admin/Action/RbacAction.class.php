<?php
	class RbacAction extends CommonAction{
		//用户列表
		Public function user(){
			$this->user = D("UserRelation")->field('password',ture)->relation(true)->select();
			$this->display();
		}//角色列表
		Public function role(){
			$role=M("role")->select();
			$this->role = $role;
			$this->display();
		}
		//节点列表
		Public function node(){
			$node=M("node")->field(array('id','name','title','pid'))->order('sort')->select();
			$node = node_merge($node);
			$this->node = $node;
			$this->display();
		}
		//权限管理
		Public function access(){
			$rid = I("rid",0,"intval");
			$field = array('id','name','title','pid');
			$node =M('node')->field($field)->order('sort')->select();
			//查询已有权限
			$access = M("access")->where(array('role_id'=>$rid))->getField('node_id',true); 
			$this->node = node_merge($node,$access);

			$this->rid = $rid;
			$this->display();
		}
		Public function Lock(){
			$rid = I("rid");
			$m = M("user");
			$lock =$m->where(array('id'=>$rid))->getField('lock');
			if($lock){
				$m->where(array('id'=>$rid))->save(array('lock'=>'0'));
				$this->success("解除锁定",U("Admin/Rbac/index"));
			}else{
				$m->where(array('id'=>$rid))->save(array('lock'=>'1'));
				$this->success("锁定成功", U("Admin/Rbac/index"));
			}
			
		}
		//添加用户
		Public function addUser(){
			$this->role = M("role")->select();
			$this->display();
		}
		//添加角色
		Public function addRole(){
			$this->display();

		}
		//添加节点
		Public function addNode(){
			$this->pid = I("pid", 0,'intval');
			$this->level = I("level", 1,'intval');
			switch ($this->level) {
				case '1':
					$this->type = "应用";		
					break;
				case '2':
					$this->type = "控制器";
					break;
				case '3':
					$this->type = "动作方法";
					break;
			}
			$this->display();
		}
		//添加用户表单处理
		Public function addUserHandle(){
			//用户信息
			$user = array(
					'username' => I('username'),
					'password' =>I('password'),
					'logintime' =>time(),
					'loginip' =>get_client_ip(),
				);
			//所属角色
			if($uid=M('user')->add($user)){
				foreach ($_POST["role_id"] as $v) {
					$role[] = array(
							'role_id' => $v,
							'user_id' => $uid,
						);
				}
				//添加角色
					M("role_user")->addAll($role);
					$this->success("添加成功",U('Admin/Rbac/index'));
			}else{
				$this->error('添加失败');
			}
		}
		//添加角色表单处理
		Public function addRoleHandle(){
			//这里的表单里的name一定要和数据库里的一致
			if (M("role")->add($_POST)) {
				$this->success("添加成功",U('Admin/Rbac/role'));
			}else{
				$this->error("添加失败");
			}

		}
		//添加节点表单处理
		Public function addNodeHandle(){
			//dump($_POST,1,'<pre>',0);die;
			if (M("node")->add($_POST) ) {
				$this->success("添加成功",U("Admin/Rbac/node"));	
			}else{
				$this->error("添加失败");
			}
		}
		//分配权限表单处理
		Public function setAccess(){
			$access =array();
			$rid = I('rid',0,'intval');
			$m = M("access");
			//清空原权限
			$m->where(array('role_id'=>$rid))->delete();
			//重组新权限
			foreach ($_POST['access'] as $v) {
				$tmp = explode("_",$v);
				$access[] = array(
						'role_id' => $rid,
						"node_id" => $tmp[0],
						"level"   => $tmp[1],
					);
			}
			//插入数据库
			if($m->addAll($access) >0 ){
				$this->success("配置成功",U("Admin/Rbac/role"));
			}else{
				$this->error("分配失败");
			}
		}
	}
?>