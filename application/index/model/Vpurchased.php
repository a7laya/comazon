<?php

namespace app\index\model;

use think\Model;
use think\Session;
use think\Db;

/**
 * 已购模型
 * Class Purchased
 * @package app\store\model
 */
class Vpurchased extends Model
{   

    /**
     * 获取当日已购清单
     */
    
    public function dayPurchase()
    {
        $res = self::useGlobalScope(false)->where([
            'username'   => Session::get('shop_user')['username']
        ])->whereTime('ts', 'today')->select();
        return $res;
    }
    public function weekPurchase()
    {
        $res = self::useGlobalScope(false)->where([
            'username'   => Session::get('shop_user')['username']
        ])->whereTime('ts', 'week')->select();
        return $res;
    }
    

}
