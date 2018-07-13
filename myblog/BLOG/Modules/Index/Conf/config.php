<?php
	return array(
			'APP_AUTOLOAD_PATH' =>'@.TagLib',
			'TAGLIB_BUILD_IN' =>'Cx,Mylib',
			'URL_HTML_SUFFIX' => '.html',

			//开启静态缓存，配置规则
			'HTML_CACHE_ON' =>ture,
			'HTML_CACHE_RULES' => array(
				'Show:index' =>array('{:module}_{:action}_{id}',10) 			//定义缓存的位置  控制器：方法   缓存时间  数组定义的是文件名
			),
			//动态缓存 得安装Memcache
			// 'DATA_CACHE_TYPE' =>'Memcache',    //File 文件缓存 
			// 'MEMCACHE_HOST'  =>'127.0.0.1',
 			// 	'MEMCACHE_PORT'  =>'11211'

			//Redis缓存
			// 'DATA_CACHE_TYPE' =>'Redis',   
			// 'MEMCACHE_HOST'  =>'127.0.0.1',   //默认的
			// 'MEMCACHE_PORT'  =>'6379'
		);

?>