<?php

namespace Marser\App\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ViewController extends Controller {

    /**
     * 指定模板
     */
    public function testAction(){
        $this->view->pick('view/test');
    }

    /**
     * 模板变量赋值
     */
    public function test2Action(){
        //setVar：单独进行变量传值
        $this->view->setVar('test', 'hello world');

        //setVars：关联数组进行变量传值
        //$this->view->setVars([
        //    'test' => 'hellow world',
        //]);
        $this->view->pick('view/test2');
    }

    /**
     * 数值循环（For）
     */
    public function test3Action(){
        $this->view->pick('view/test3');
    }

    /**
     * 模板扩展函数 explode()
     */
    public function test4Action(){
        $this->view->setVars([
            'intro' => 'hello-world',
        ]);
        $this->view->pick('view/test4');
    }

    /**
     * 模板扩展函数 get_userinfo()
     */
    public function test5Action(){
        $this->view->pick('view/test5');
    }
}