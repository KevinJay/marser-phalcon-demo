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

    /**
     * 批量添加
     * @param array $data
     * @return boolean
     * @throws \Exception
     */
    public function batch_insert(array $data){
        if (count($data) == 0) {
            throw new \Exception('参数错误');
        }
        $keys = array_keys(reset($data));
        $keys = array_map(function ($key) {
            return "`{$key}`";
        }, $keys);
        $keys = implode(',', $keys);
        $sql = "INSERT INTO " . $this->getSource() . " ({$keys}) VALUES ";
        foreach ($data as $v) {
            $v = array_map(function ($value) {
                return "'{$value}'";
            }, $v);
            $values = implode(',', array_values($v));
            $sql .= " ({$values}), ";
        }
        $sql = rtrim(trim($sql), ',');
        $result = $this->getDI()->get('db')->execute($sql);
        if (!$result) {
            throw new \Exception('批量入库记录');
        }
        return $result;
    }
}