<?php

namespace Marser\App\Frontend\Models;

class BaseModel extends \Phalcon\Mvc\Model {

    public function initialize(){

    }

    /**
     * 映射数据表（补上表前缀）
     * @param string $tableName
     * @param null $prefix
     */
    protected function set_table_source($tableName, $prefix = null){
        empty($prefix) && $prefix = $this->getDI()->get('config')->database->prefix;
        $this->setSource($prefix . $tableName);
    }
}