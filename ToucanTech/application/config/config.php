<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

date_default_timezone_set('UTC');

ini_set('SMTP', "send.one.com"); // Overide The Default Php.ini settings for sending mail

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']); // this will set URL_DOMAIN as-- 'localhost'
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME']))); 
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER); 



 $local = array('localhost', '127.0.0.1');

    if(in_array($_SERVER['HTTP_HOST'], $local)){

        define('DB_TYPE', 'mysql');
        define('DB_HOST', '127.0.0.1');
        define('DB_NAME', 'toucantech');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_CHARSET', 'utf8');

    }


# spl_autoload_register() allows you to register a function -
# that PHP will put into a stack/queue and call sequentially when a "new Class" is declared.

spl_autoload_register('baseClassLoader');

function baseClassLoader($className)
{
    $path = APP.'core/';

    require_once $path.$className.'.php';
}



$app = new Application();

?>
