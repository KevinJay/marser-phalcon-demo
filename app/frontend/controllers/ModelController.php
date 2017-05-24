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
}