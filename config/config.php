<?php
//site name
define('SITE_NAME', 'Clickup API');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');

//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'clickup');

$databaseParams = [
    'username' => DB_USER,
    'database' => DB_NAME,
    'password' => DB_PASS,
    'type'     => 'mysql',
    'charset'  => 'utf8',
    'host'     => 'localhost',
];