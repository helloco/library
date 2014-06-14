<?php
return array(
		// '配置项'=>'配置值'
		'APP_GROUP_LIST' => 'Api,Admin',
		'DEFAULT_GROUP' => 'Admin',
		'URL_MODEL' => 1,
		
		'DEFAULT_FILTER' => 'htmlspecialchars',
		'DB_TYPE'=> 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'library', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'root', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'lib_', // 数据库表前缀
		'DB_CHARSET'=>'UTF-8',// 数据库编码默认采用utf8
		
		'TMPL_CACHE_ON' => false,	
		//'SHOW_PAGE_TRACE' =>true,
// 		'TMPL_PARSE_STRING' => array(
// 				'__PUBLIC__' =>__ROOT__.'/'.APP_NAME.'/Public'
// 		),
);
?>