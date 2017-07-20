<?php
/**
 * User: Marser
 * Date: 2017/5/21
 * Time: 13:14
 */

namespace Marser\App\Frontend\Controllers;

use Marser\App\Frontend\Models\ArticlesModel;

class ModelController extends \Phalcon\Mvc\Controller{

    public function listAction(){
        try {
            $articlesModel = new ArticlesModel();
            echo '<pre>';
            print_r($articlesModel->find()->toArray());
            exit;
        }catch(\Exception $e){
            echo '<pre>';
            print_r($e);
        }
    }

    public function selectAction()
    {
        try {
            $articleModel = new ArticlesModel();
            //查询所有记录
            $result = $articleModel->find();
            //循环输出结果集
            foreach ($result as $record) {
                //  var_dump($record->aid);
                //  var_dump($record->title);
            }
            //var_dump($result->toArray());
            //var_dump(count($result));

            //$result1 = $articleModel->findFirst(1);
            //print_r($result1->toArray());
            //print_r($result1);

//            $result2 = $articleModel->find([
//                'conditions' => 'aid = :aid: AND status = :status:',
//                'bind' => [
//                    'aid' => 2,
//                    'status' => 1,
//                ],
//            ]);
//            print_r($result2->toArray());

//            $articleModel->find([
//                'columns' => 'aid, title', //查询字段
//                'conditions' => 'aid = :aid:',  //查询条件
//                'bind' => [ //参数绑定
//                    'aid' => 2
//                ],
//                'order' => 'aid DESC', //排序
//                'limit' => 10, //限制查询结果的数量
//                'offset' => 10, //偏移量
//            ]);

//            $result3 = $articleModel->find([
//                'conditions' => 'aid IN ({aids:array})',
//                'bind' => [
//                    'aids' => [1, 2]
//                ],
//            ]);
//            print_r($result3->toArray());

            $result4 = $articleModel->find([
                'conditions' => 'title like :title:',
                'bind' => [
                    'title' => '%英语%',
                ],
            ]);
            print_r($result4->toArray());

        } catch (\Exception $e) {
            echo '<pre>';
            print_r($e);
        }
    }

    public function insertAction(){
        $articleModel = new ArticlesModel();
        $result = $articleModel->create([
            'title' => 'phalcon测试',
            'introduce' => 'Phalcon入门教程',
            'status' => 1,
            'view_number' => 1,
            'is_recommend' => 1,
            'is_top' => 1,
            'create_by' => 1,
            'create_time' => date('Y-m-d H:i:s'),
            'modify_by' => 1,
            'modify_time' => date('Y-m-d H:i:s')
        ]);
        if (!$result) {
            $errorMessage = implode(',', $articleModel->getMessages());
            echo $errorMessage;
        }else {
            $aid = $articleModel->aid;
            echo $aid;
        }
    }

    public function batchInsertAction(){
//        $articleModel = new ArticlesModel();
//        //var_dump($articleModel->title);
//        for ($i = 1; $i <= 10; $i++) {
//            $data = [
//                'title' => "phalcon测试{$i}",
//                'introduce' => "Phalcon入门教程{$i}",
//                'status' => $i,
//                'view_number' => $i,
//                'is_recommend' => 1,
//                'is_top' => 1,
//                'create_by' => $i,
//                'create_time' => date('Y-m-d H:i:s'),
//                'modify_by' => $i,
//                'modify_time' => date('Y-m-d H:i:s')
//            ];
//            $result = $articleModel->create($data);
//            if (!$result) {
//                $errorMessage = implode(',', $articleModel->getMessages());
//                exit($errorMessage);
//            }else {
//                $aid = $articleModel->aid;
//                echo $aid;
//                //var_dump($articleModel->title);
//            }
//            echo '<br />';
//        }

//        $articleModel = new ArticlesModel();
//        for ($i = 1; $i <= 10; $i++) {
//            $data = [
//                'title' => "phalcon测试{$i}",
//                'introduce' => "Phalcon入门教程{$i}",
//                'status' => $i,
//                'view_number' => $i,
//                'is_recommend' => 1,
//                'is_top' => 1,
//                'create_by' => $i,
//                'create_time' => date('Y-m-d H:i:s'),
//                'modify_by' => $i,
//                'modify_time' => date('Y-m-d H:i:s')
//            ];
//            $clone = clone $articleModel;
//            $result = $clone->create($data);
//            if (!$result) {
//                $errorMessage = implode(',', $clone->getMessages());
//                exit($errorMessage);
//            }else {
//                $aid = $clone->aid;
//                echo $aid;
//            }
//            echo '<br />';
//        }

        $articleModel = new ArticlesModel();
        $result = $articleModel->batch_insert([
            [
                'title' => "phalcon测试1",
                'introduce' => "Phalcon入门教程1",
                'status' => 1,
                'view_number' => 1,
                'is_recommend' => 1,
                'is_top' => 1,
                'create_by' => 1,
                'create_time' => date('Y-m-d H:i:s'),
                'modify_by' => 1,
                'modify_time' => date('Y-m-d H:i:s')
            ],
            [
                'title' => "phalcon测试2",
                'introduce' => "Phalcon入门教程2",
                'status' => 2,
                'view_number' => 2,
                'is_recommend' => 1,
                'is_top' => 1,
                'create_by' => 1,
                'create_time' => date('Y-m-d H:i:s'),
                'modify_by' => 1,
                'modify_time' => date('Y-m-d H:i:s')
            ],
        ]);
        var_dump($result);
    }

    public function updateAction(){
//        $articleModel = new ArticlesModel();
//        $article = $articleModel->findFirst([
//            'conditions' => 'aid = :aid:',
//            'bind' => [
//                'aid' => 3
//            ],
//        ]);
//        if($article) {
//            $result = $article->update([
//                'title' => 'Phalcon更新测试',
//            ]);
//            var_dump($result);
//        }

//        $articleModel = new ArticlesModel();
//        $articleModel->aid = 3;
//        $result = $articleModel->update([
//            'title' => 'Phalcon更新测试',
//            'introduce' => "Phalcon入门教程2",
//            'status' => 2,
//            'view_number' => 2,
//            'is_recommend' => 1,
//            'is_top' => 1,
//            'create_by' => 1,
//            'create_time' => '2017-07-20 00:00:00',
//            'modify_by' => 1,
//            'modify_time' => '2017-07-20 00:00:00',
//        ]);
//        if(!$result){
//            throw new \Exception('数据更新失败');
//        }
//        $affectedRows = $this->getDI()->get('db')->affectedRows();
//        var_dump($result);
//        var_dump($affectedRows);

        $articleModel = new ArticlesModel();
        $articleModel->aid = 3;
        $result = $articleModel->iupdate([
            'title' => 'Phalcon更新测试',
        ]);
        if(!$result){
            throw new \Exception('数据更新失败');
        }
        $affectedRows = $this->getDI()->get('db')->affectedRows();
        var_dump($result);
        var_dump($affectedRows);
    }

    public function deleteAction(){
        $articleModel = new ArticlesModel();
        $articleModel->aid = 4;
        $result = $articleModel->delete();
        $affectedRows = $this->getDI()->get('db')->affectedRows();
        var_dump($result);
        var_dump($affectedRows);
    }
}