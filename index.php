<?php
//:w
//require "bootstrap.php";
require __DIR__.'/vendor/autoload.php';
use \app\Application;

$app =  new Application();
var_dump($app->config->get('config.base_url'));
echo  getenv("APP_FALLBACK_LOCALE");
