<?php


define("DEBUG", true);    // when its value is false it will disappear the errors and vice versa... note we make its value false in production phase
error_reporting();
ini_set('display_errors', DEBUG);    // here I change the value of (display_errors) key in (ini file)




define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
// define('MVC', 'Session 21 mvc (from full stack diploma)');
define('src', ROOT . DS . "src");
define('CONTROLLERS', src . DS . "controllers" . DS);
define('MODELS', src . DS . "models" . DS);
define('VIEWS', src . DS . "views" . DS);
define('CORE', src . DS . "core" . DS);
define('VENDOR', ROOT . DS . "vendor" . DS);


// echo VIEWS;



require_once VENDOR . "autoload.php";     // this is the only require we will use in the project because we have used the composer autoloader


// echo __DIR__ . "<br>";


use itrax\core\Database\db;
use itrax\core\Database\dbpdo;
use itrax\core\registry;
use itrax\core\saas\saas;
use itrax\core\saas\saas_helper;
use itrax\core\session2;
use itrax\core\validation;



// echo "<pre>";
// print_r($_SERVER);
// die;



registry::set("main", new db("vacard"));    // this is the main database connection... we connect on database called (vacard)

(new saas())->run($_SERVER['HTTP_HOST']);

registry::set("validation", new validation);


$bootstrap = new itrax\core\bootstrap;      

// $bootstrap->run();
