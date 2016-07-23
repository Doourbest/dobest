<?php
//框架启动文件
use Illuminate\Database\Capsule\Manager as Capsule;
use \app\Application;
// BASE_PATH
define('BASE_PATH', __DIR__);
// VIEW_BASE_PATH
define('VIEW_BASE_PATH', BASE_PATH.'/resources/views/');
// CACHE_BASE_PATH
define('CACHE_BASE_PATH', BASE_PATH.'/cache');
// Autoload
require BASE_PATH.'/vendor/autoload.php';
// Log
if (!is_dir(BASE_PATH.'/logs/')) {
    mkdir(BASE_PATH.'/logs/', 0700);
}

$app = new Application();

$monolog = new \Monolog\Logger('system');
$monolog->pushHandler(new \Monolog\Handler\StreamHandler(BASE_PATH.'/logs/app.log', \Monolog\Logger::ERROR));
// Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection($app->config->get('database'));
$capsule->bootEloquent();
// View Loader
class_alias('\Dobest\View\View','View');

return $app;

