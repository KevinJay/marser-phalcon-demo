<?php
/**
 * User: Marser
 * Date: 2017/5/21
 * Time: 13:04
 */

namespace Marser\App\Frontend\Models;

class ArticlesModel extends \Marser\App\Frontend\Models\BaseModel {

    /**
     * 表名
     */
    const TABLE_NAME = 'articles';

    public function initialize(){
        parent::initialize();
        $this->set_table_source(self::TABLE_NAME);
    }
}