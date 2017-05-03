<?php

namespace Marser\App\Core;

use \Phalcon\Mvc\View\Engine\Volt;

class PhalBaseVolt extends Volt{

    /**
     * 添加扩展函数
     */
    public function initFunction(){
        $compiler = $this->getCompiler();

        /** 添加explode函数 */
        $compiler -> addFunction('explode', 'explode');

        /** 添加自定义的get_userinfo函数 */
        $compiler -> addFunction('get_userinfo', function($resolvedArgs, $exprArgs) use ($compiler){
            return '\Marser\App\Libs\Test::get_userinfo(' . $resolvedArgs . ')';
        });
    }


}



