<?php

/**
 * DI注册服务配置文件
 * @category PhalconCMS
 * @copyright Copyright (c) 2016 PhalconCMS team (http://www.marser.cn)
 * @license GNU General Public License 2.0
 * @link www.marser.cn
 */

use Phalcon\DI\FactoryDefault,
    Phalcon\Mvc\View,
    Phalcon\Mvc\Url as UrlResolver,
    Phalcon\Db\Profiler as DbProfiler,
    Phalcon\Mvc\Model\Manager as ModelsManager,
    Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Session\Adapter\Files as Session;

$di = new FactoryDefault();

/**
 * 设置路由
 */
$di -> setShared('router', function(){
    $router = new \Phalcon\Mvc\Router();
    $router -> setDefaultModule('frontend');

    $routerRules = new \Phalcon\Config\Adapter\Php(ROOT_PATH . "/app/config/routers.php");
    foreach ($routerRules->toArray() as $key => $value){
        $router->add($key,$value);
    }

    return $router;
});

/**
 * DI注册session服务
 */
$di -> setShared('session', function(){
    $session = new Session();
    $session -> start();
    return $session;
});

/**
 * DI注册cookies服务
 */
$di -> setShared('cookies', function() {
    $cookies = new \Phalcon\Http\Response\Cookies();
    $cookies -> useEncryption(false);
    return $cookies;
});

/**
 * DI注册DB配置
 */
$di -> setShared('db', function () use($config) {
    $dbconfig = $config -> database -> db;
    $dbconfig = $dbconfig -> toArray();
    if (!is_array($dbconfig) || count($dbconfig)==0) {
        throw new \Exception("the database config is error");
    }

    $eventsManager = new \Phalcon\Events\Manager();
    // 分析底层sql性能，并记录日志
    $profiler = new DbProfiler();
    $eventsManager -> attach('db', function ($event, $connection) use ($profiler) {
        if($event -> getType() == 'beforeQuery'){
            //在sql发送到数据库前启动分析
            $profiler -> startProfile($connection -> getSQLStatement());
        }
        if($event -> getType() == 'afterQuery'){
            //在sql执行完毕后停止分析
            $profiler -> stopProfile();
            //获取分析结果
            $profile = $profiler -> getLastProfile();
            $sql = $profile->getSQLStatement();
            $executeTime = $profile->getTotalElapsedSeconds();
            //日志记录
            $currentDay = date('Ymd');
            $logger = new \Phalcon\Logger\Adapter\File(ROOT_PATH . "/app/cache/logs/{$currentDay}.log");
            $logger -> debug("{$sql} {$executeTime}");
        }
    });

    $connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
        "host" => $dbconfig['host'], "port" => $dbconfig['port'],
        "username" => $dbconfig['username'],
        "password" => $dbconfig['password'],
        "dbname" => $dbconfig['dbname'],
        "charset" => $dbconfig['charset'])
    );

    /* 注册监听事件 */
    $connection->setEventsManager($eventsManager);

    return $connection;
});

/**
 * DI注册modelsManager服务
 */
$di -> setShared('modelsManager', function() use($di){
    return new ModelsManager();
});

/**
 * DI注册日志服务
 */
$di -> setShared('logger', function() use($di){
    $currentDay = date('Ymd');
    $logger = \Phalcon\Logger\Adapter\File(ROOT_PATH . "/app/cache/logs/{$currentDay}.log");
    return $logger;
});

/**
 * DI注册配置服务
 */
$di -> setShared('config', function() use($config){
    return $config;
});


