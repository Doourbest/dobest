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

Route::filter('/(:all)/view/(:any)', function($handler) {
    // $sso = new Valsun\Sso("dataSearch");
    // if($sso->checkLogin()==false) { // not login
    //     header('Location: ' . $sso->getSsoUrl());
    //     return;
    // }
    $view = $handler();
    if ( $view instanceof View ) {
        //$view->with('user', $_SESSION['user']);
    }
    return $view;
});

Route::filter('/(:all)/api/(:any)', function($handler) {
    // $sso = new Valsun\Sso("Transportsys");
    // if($sso->checkLogin()==false) { // not login
    //     echo '{"errCode": -10403, "errMsg":"COMMON_LOGIN_NEEDED"}'; // 未登录公共错误码
    //     return;
    // }
    return $handler();
});

// }


function newController($path) {
    $class = '\\' . implode( '\\',
        array_map(function($s) {return ucfirst($s);},
            array_filter(explode('/',$path),'strlen')
        )
    ) . 'Controller';
    return new $class;
}

// 需要登录的前缀
// api
// view
// 不需要登录，对外开放的 url 前缀
// openview

Route::any('/(:all)/view/(:any)',function($c,$m) {
    $obj = newController($c);
    $method = "view_$m";
    return $obj->$method();
});

Route::any('/(:all)/api/(:any)',function($c,$m) {
    $obj = newController($c);
    $method = "api_$m";
    return $obj->$method();
});

Route::any('/(:all)/openview/(:any)',function($c,$m) {
    $obj = newController($c);
    $method = "openview_$m";
    return $obj->$method();
});

