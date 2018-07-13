<?php
return array(
	'TMPL_L_DELIM' => '<{',
	'TMPL_R_DELIM' => '}>',
	'SHOW_PAGE_TRACE' =>true,
	'DEFAULT_FILTER' =>'htmlspecialchars',
	//'DB_DSN' => 'mysql://root:root@localhost:3306/think_admin',
	 'DB_PRIFIX' =>'think_',
	 'DB_HOST'=> 'localhost',
	 'DB_USER'=> 'root',
	 'DB_NAME'=> 'think_Admin',
	 'DB_PWD'=> 'root',
	//'TMPL_TEMPLATE_SUFFIX'=>'.html',
	'APP_GROUP_LIST' => 'Admin,Index',
	'DEFAULT_GROUP' => 'Index',
	//开启独立分组
	'APP_GROUP_MODE' => 1,
	'APP_GROUP_PATH' => 'Modules',
	//模版间隔符
	'TMPL_FILE_DEPR' => '_',	
	//db处理存储session
	//'SESSION_AUTO_START' => true, // 是否自动开启Session
	'SESSION_TYPE' => 'Db', // session hander类型    不能使用DB_DSN方式连接
	//'SESSION_PREFIX' => 'sess_', // session 前缀
	'SESSION_EXPIRE'	=> 3600, //session 过期时间
	//'SESSION_TABLE'	=> 'think_session', //存放session 数据表
);
?> 