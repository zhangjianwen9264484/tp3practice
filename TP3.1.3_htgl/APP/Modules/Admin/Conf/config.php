<?php
	return array(
		'RBAC_SUPERADMIN' =>'Admin',	//超级管理员名称
		'ADMIN_AUTH_KEY' =>'superadmin',  //超级管理员识别
		'USER_AUTH_ON'   =>true,		//是否开启验证
		'USER_AUTH_TYPE' =>1, 			//验证类型(1:登录验证（更改权限后，再次登录生效） 2:(及时验证))
		'USER_AUTH_KEY'  =>'uid',		//用户认证的识别号
		'NOT_AUTH_MODULE' =>'Index',	//无需验证的控制器
		'NOT_AUTH_ACTION' =>'addUserHandle,addRoleHandle,addNodeHandle,setAccess',	//无需验证的动作方法
		'RBAC_ROLE_TABLE' =>'think_role',	//角色表名
		'RBAC_USER_TABLE' =>'think_role_user',	//角色和用户的中间表名
		'RBAC_ACCESS_TABLE' =>'think_access',   //权限表
		'RBAC_NODE_TABLE'  =>'think_node',		//节点表名

	
		'TMPL_PARSE_STRING'=>array(
			'__PUBLIC__' => __ROOT__.'/'. APP_NAME .'/Modules/Admin/Tpl/Public'
			),
			//'URL_HTML_SUFFIX'=>'html|shtml|xml',//限制伪静态的后缀
			'URL_HTML_SUFFIX' => '',
		);
?>