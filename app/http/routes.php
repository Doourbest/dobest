<<<<<<< HEAD
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
=======
<?php

use Dobest\Routing\Router as Route;

/**
 * @NOTICE 如果您是框架的使用者，生产环境下请注释这行代码
 */
include __DIR__ . '/routes_demo.php';

View::process(Route::dispatch());
>>>>>>> 3b3900c625c325f7e223abbf8deab2e188bbe8d6
