<?php

$loader = new \Phalcon\Loader();

/**
 * 注册命名空间
 */
$loader -> registerNamespaces(array(
    'Marser' => ROOT_PATH,

    'Marser\App\Core' => ROOT_PATH . '/app/core',
    'Marser\App\Libs' => ROOT_PATH . '/app/libs',
    'Marser\App\Tasks' => ROOT_PATH . '/app/tasks',

    'Marser\App\Frontend\Controllers' => ROOT_PATH . '/app/frontend/controllers',
    'Marser\App\Frontend\Models' => ROOT_PATH . '/app/frontend/models',

    'Marser\App\Backend\Controllers' => ROOT_PATH . '/app/backend/controllers',
    'Marser\App\Backend\Models' => ROOT_PATH . '/app/backend/models',
)) -> register();