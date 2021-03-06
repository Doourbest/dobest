<?php
use Illuminate\Database\Capsule\Manager as Capsule;
// BASE_PATH
define('BASE_PATH', __DIR__);
// VIEW_BASE_PATH
define('VIEW_BASE_PATH', BASE_PATH.'/resource/view/');
// CACHE_BASE_PATH
define('CACHE_BASE_PATH', BASE_PATH.'/cache');
// Autoload
require BASE_PATH.'/vendor/autoload.php';

// Log
if (!is_dir(BASE_PATH.'/log/')) {
    mkdir(BASE_PATH.'/log/', 0700);
}
$monolog = new \Monolog\Logger('system');
$monolog->pushHandler(new \Monolog\Handler\StreamHandler(BASE_PATH.'/log/app.log', \Monolog\Logger::ERROR));

// whoops: php errors for cool kids
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->pushHandler(new \Whoops\Handler\PlainTextHandler($monolog));
$whoops->register();

// BASE_URL
$config = require BASE_PATH.'/config/config.php';

// init config
\Dobest\Support\Config::initConfig($config);
define('BASE_URL', $config['base_url']);
// TIME_ZONE
date_default_timezone_set($config['time_zone']);
// Eloquent ORM
$capsule = new Capsule;
$database = require BASE_PATH.'/config/database.php';
foreach($database['connections'] as $name => $value) {
    $capsule->addConnection($value,$name);
    if($name==$database['default']) {
        $name = 'default';
        $capsule->addConnection($value,$name);
    }   
}
$capsule->bootEloquent();
// DB
class_alias('Illuminate\Database\Capsule\Manager','DB');
// View Loader
class_alias('\Dobest\View\View','View');
