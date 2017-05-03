<?php
/**
 * User: Marser
 * Date: 2017/5/3
 * Time: 20:47
 */

namespace Marser\App\Libs;

class Test {

    public function get_userinfo($username, $age, $mobile){
        return "用户名：{$username}, 年龄：{$age}, 联系方式：{$mobile}";
    }
}