<?php

namespace Marser\App\Frontend\Controllers;

class IndexController {

    public function indexAction(){
        echo 'front index';
    }

    public function notfoundAction(){
        echo '404 not found --- frontend';
    }

}