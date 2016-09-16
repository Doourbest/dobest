<?php

/**
 * @NOTICE 如果您是 dobest 框架的使用者，请直接修改 routes.php
 *   来调整路由。这个文件仅作演示使用，不建议直接修改。
 */

use Dobest\Routing\Router as Route;

Route::get('/',function() {
    // header('Location: /order/viewIndex');
    return 'Congratulations! It works! now try visit <a href="demo/view/index">/demo/demo/view/index</a>';
});


// view 用于返回 html 代码
// api  用于 ajax 一部请求

Route::any('/(:all)/view/(:any)',function($c,$m) {

    // 这里可以做登录验证
    // $sso = new Valsun\Sso("dataSearch");
    // if($sso->checkLogin()==false) { // not login
    //     header('Location: ' . $sso->getSsoUrl());
    //     return;
    // }

    $ret = handleRequest($c,'view',$m);

    // 给视图注入环境变量
    // if ( $ret instanceof View ) {
    //     $ret->with('user', $sso->getUserInfo());
    // }

    return $ret;
});

Route::any('/(:all)/api/(:any)',function($c,$m) {

    // 这里可以做登录验证
    // $sso = new Valsun\Sso("dataSearch");
    // if($sso->checkLogin()==false) { // not login
    //     echo '{"errCode": -10403, "errMsg":"COMMON_LOGIN_NEEDED"}'; // 未登录公共错误码
    //     return;
    // }

    return handleRequest($c,'view',$m);
});

function handleRequest($classPath,$type,$handler) {
    $class = '\\' . implode( '\\',
        array_map(function($s) {return ucfirst($s);},
            array_filter(explode('/',$classPath),'strlen')
        )
    ) . 'Controller';

    $obj = new $class;
    // interceptors
    if (method_exists($obj,"onRequest")) {
        return $obj->onRequest($type,$handler);
    } 
    if (method_exists($obj,"on_request")) {
        return $obj->on_request($type,$handler);
    } 
    // view_index
    $method="{$type}_{$handler}";
    if (method_exists($obj, $method)) {
        return $obj->$method();
    }
    // viewIndex
    $method="{$type}".ucfirst($handler);
    if (method_exists($obj,$method)) {
        return  $obj->$method();
    } 
}

