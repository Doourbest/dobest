<?php

/**
 * @NOTICE 如果您是 dobest 框架的使用者，请直接修改 routes.php
 *   来调整路由。这个文件仅作演示使用，不建议直接修改。
 */

use Dobest\Routing\Router as Route;

Route::get('/',function() {
    // header('Location: /order/viewIndex');
    return 'Congratulations! It works! now try visit <a href="demo/view/index">demo/view/index</a>';
});

// login filter
// { 

Route::filter('/(:any)/view(:any)', function($handler) {
    // if(!isset($_SESSION['user'])) { // not login
    //     header('Location: /login/openviewLogin');
    //     return;
    // }
    $view = $handler();
    if ( $view instanceof View ) {
        //$view->with('user', $_SESSION['user']);
    }
    return $view;
});

Route::filter('/(:any)/api(:any)', function($handler) {
    // if(!isset($_SESSION['user'])) { // not login
    //     echo '{"errCode": -10403, "errMsg":"COMMON_LOGIN_NEEDED"}'; // 未登录公共错误码
    //     return ;
    // }
    return $handler();
});

// }


// 需要登录的前缀
// api
// view
// 不需要登录，对外开放的 url 前缀
// openview

Route::any('/(:any)/view/(:any)',function($c,$m) {
    $class = ucfirst("{$c}Controller");
    $obj = new $class();
    $method = "view_$m";
    return $obj->$method();
});

Route::any('/(:any)/openview/(:any)',function($c,$m) {
    $class = ucfirst("{$c}Controller");
    $obj = new $class();
    $method = "openview_$m";
    return $obj->$method();
});

Route::any('/(:any)/api/(:any)',function($c,$m) {
    $class = ucfirst("{$c}Controller");
    $obj = new $class();
    $method = "api_$m";
    return $obj->$method();
});

