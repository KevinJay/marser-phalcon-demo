<?php

namespace Marser\App\Backend\Controllers;

class IndexController {

    public function indexAction(){
        echo 'backend index';
    }

    public function notfoundAction(){
        echo '404 not found --- backend';
    }

}