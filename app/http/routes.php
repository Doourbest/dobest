<?php

use Dobest\Routing\Router as Route;

Route::get('/', 'HomeController@home');

Route::any('foo', function() {
    echo "Foo!";
});

Route::filter(function() {
    return isset($_GET['token']) && $_GET['token'] == 1;
}, function(){
  Route::any('bar', function() {
    echo "Bar!<br>Filter Success!";
  });
});

Route::$error_callback = function() {
  //throw new Exception("路由无匹配项 404 Not Found");
};

Route::dispatch('View@process');