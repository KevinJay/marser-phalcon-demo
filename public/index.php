<?php

try {

    define('ROOT_PATH', dirname(__DIR__));

    $config = new \Phalcon\Config\Adapter\Php(ROOT_PATH . "/app/config/system.php");

    /**
     * 引入loader.php
     */
    include ROOT_PATH . '/app/core/loader.php';

    /**
     * 引入services.php
     */
    include ROOT_PATH . '/app/core/services.php';

    /**
     * 处理请求
     */
    $application = new \Phalcon\Mvc\Application($di);

    $application -> registerModules(array(
        'frontend' => array(
            'className' => 'Marser\App\Frontend\FrontendModule',
            'path' => ROOT_PATH . '/app/frontend/FrontendModule.php',
        ),
        'backend' => array(
            'className' => 'Marser\App\Backend\BackendModule',
            'path' => ROOT_PATH . '/app/backend/BackendModule.php',
        ),
    ));

    echo $application->handle()->getContent();

}catch (\Exception $e) {
    echo '<pre>';
    print_r($e);
}





