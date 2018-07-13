<?php
return array(
	'TMPL_L_DELIM' =>'<{',
	'TMPL_R_DELIM' => '}>',
	'DEFAULT_FILTER' =>'htmlspecialchars',
	'SHOW_PAGE_TRACE' =>true,

	'APP_GROUP_LIST'=> 'Index,Admin', 
	'DEFAULT_GROUP' =>'Index',
	'APP_GROUP_MODE' =>1,			//开启独立分组
	'APP_GROUP_PAHT' =>'Modules',   //独立分组，
	'LOAD_EXT_CONFIG'=>'verify,water',   //加载额外的配置文件 ,后边不许加空格


	//'DB_DSN' =>'mysql://root:root@localhost:3306/think_blog'
	'DB_PRIFIX' =>'think',
	'DB_HOST' =>'127.0.0.1',
	'DB_USER' =>'root',
	'DB_PWD' =>'root',
	'DB_NAME'=>'think_blog', 

	//路由规则
	'URL_MODEL' => 2, // 隐藏index.php文件  0连接符为&  1为 ‘/’   
	'URL_ROUTER_ON' => true,
	'URL_ROUTE_RULES' => array(
			 //'c/:id' => 'Index/List/index'	
			 '/^c_(\d+)$/' =>'Index/List/index?id=:1',    //正则匹配路由1为括号正则替换的内容
			 ':id\d' => 'Index/Show/index'
		),

	//'SESSION_AUTO_START' => true, // 是否自动开启Session
	//'SESSION_TYPE' => 'Db', // session hander类型    不能使用DB_DSN方式连接
	//'SESSION_PREFIX' => 'sess_', // session 前缀
	//'SESSION_EXPIRE'	=> 3600, //session 过期时间
	//'SESSION_TABLE'	=> 'think_session', //存放session 数据表
);
?>