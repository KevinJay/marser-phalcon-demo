<?php

return array(
    //后台路由规则
    '/admin/:controller/:action/:params' => array(
        'module' => 'backend',
        'controller'=>1,
        'action'=>2
    ),

    '/index/test3/(\d+)/(\d+)' => array(
        'module' => 'frontend',
        'controller'=>'index',
        'action'=>'test3',
        'a' => 1,
        'b' => 2,
    ),

);