<?php

namespace app\index\model;

use think\Model;
// 软删除
// use traits\model\SoftDelete;
use think\Session;
use think\Db;

/**
 * 用户模型
 * Class User
 * @package app\store\model
 */
class Limit extends Model
{
    // 软删除
    // use SoftDelete;
    // protected $deleteTime = 'delete_time';

    // 获取限制购买数量 日限制：getLimit('day')  周限制：getLimit('week')
    public function getLimit($type)
    {
        $res = $this::get(1);
        return $res[$type];
    }
    
}