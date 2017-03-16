<?php

namespace Marser\App\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ViewtestController extends Controller {

    public function testAction(){
        $this->view->pick('viewtest/test');
    }
}