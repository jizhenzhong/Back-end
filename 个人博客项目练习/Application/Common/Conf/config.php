<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'my_blog',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PWD' => 'root',          // 密码
    'DB_PORT' => '3306',        // 端口
    'DB_PREFIX' => 'blog_',    // 数据库表前缀
    'DB_PARAMS' => array(), // 数据库连接参数

    'URL_MODULE_MAP' => array('my_bigdog' => 'admin', 'bigdog' => 'home'),
    'DEFAULT_MODULE' => 'bigdog',  // 默认模块
    'MODULE_DENY_LIST' => array('Common', 'Runtime'),

    'APP_SUB_DOMAIN_DEPLOY' => 1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES' => array(
        '223.104.11.227' => 'my_bigdog',  // 我的电脑ip指向Admin模块
    ),
);

