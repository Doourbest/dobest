<?php

/**
 * @NOTICE 如果您是 dobest 框架的使用者，请直接修改 routes.php
 *   来调整路由。这个文件仅作演示使用，不建议直接修改。
 */

use Dobest\Routing\Router as Route;

Route::get('/', 'DemoController@home');

Route::any('/foo', function() {
    echo "Foo!";
});

Route::$error_callback = function() {
  throw new Exception("路由无匹配项 404 Not Found");
};
