<?php

namespace Marser\App\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller {

    /**
     * 实例化
     */
    public function onConstruct(){
//        var_dump('onConstruct');
//        echo '<pre>';
//        print_r($this);
    }

    /**
     * 资源初始化
     */
    public function initialize() {
//        var_dump('initialize');
//        echo '<pre>';
//        print_r($this);
    }

    public function indexAction(){
        echo 'front index';
        exit();
    }

    /**
     * 接收请求数据
     */
    public function test1Action(){
        $a = $this->request->get('a');
        $b = $this->request->getQuery('b');
        var_dump("a:{$a}");
        var_dump("b:{$b}");
        exit;
    }

    /**
     * 接收请求数据
     * @param $a
     * @param string $b
     */
    public function test2Action($a, $b='bb'){
        var_dump("a:{$a}");
        var_dump("b:{$b}");
        exit;
    }

    /**
     * 路由规则下的参数接收
     */
    public function test3Action(){
        $a = $this->dispatcher->getParam('a');
        $b = $this->dispatcher->getParam('b');
        var_dump($a);
        var_dump($b);
    }

    /**
     * 页面跳转（改变URL）
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function test4Action(){
        return $this->response->redirect('https://www.marser.cn');
    }

    /**
     * 页面跳转（不改变URL）
     */
    public function test5Action(){
        return $this->dispatcher->forward(array(
            'controller' => 'test',
            'action' => 'index',
        ));
    }

    /**
     * ajax数据返回
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function test6Action(){
        return $this->response->setJsonContent(array(
            'code' => 1,
            'message' => 'success',
        ));
    }

    /**
     * 调用DI中注册的服务
     */
    public function test7Action(){
        var_dump($this->session);
        var_dump($this->cookies);
        var_dump($this->request);
        var_dump($this->response);
        var_dump($this->db);
        var_dump($this->logger);
        //...
    }

    public function notfoundAction(){
        echo '404 not found --- frontend';
        exit();
    }

}