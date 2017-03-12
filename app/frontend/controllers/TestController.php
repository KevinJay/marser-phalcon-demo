<?php

namespace Marser\App\Frontend\Controllers;

use \Phalcon\Mvc\Controller;

class TestController extends Controller{

    public function indexAction(){
        var_dump('test/index');
        exit();
    }
}