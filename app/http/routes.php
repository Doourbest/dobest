<?php

use Dobest\Routing\Router as Route;

/**
 * @NOTICE 如果您是框架的使用者，生产环境下请注释这行代码
 */
include __DIR__ . '/routes_demo.php';

Route::dispatch('View@process');
