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

    // 待审核订单数->main
    static function checkPending()
    {
        $key_word = isset($arr['key_word']) ? $arr['key_word'] : '';
        $data = self::useGlobalScope(false)
                ->where('order_id|review_img', 'not null')
                ->where('admin_review', 'null')
                // ->order('product_id desc')  // 商品列表排序
                // ->limit($arr['limit'])
                // ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = count($data);
        return $res;
    }
    
    // 待审核订单
    public function tableData(array $arr)
    {
        $key_word = isset($arr['key_word']) ? $arr['key_word'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id','like',"%{$key_word}%")
                ->where('admin_review', 'null')
                ->where('order_id|review_img', 'not null')
                ->order('update_time desc')  // 商品列表排序
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|username|email|order_id','like',"%{$key_word}%")
        ->where('admin_review', 'null')
        ->where('order_id|review_img', 'not null')
        ->count();
        return $res;
    }
    // 已审核订单
    public function tableDataReviewed(array $arr)
    {
        $key_word = isset($arr['key_word']) ? $arr['key_word'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id','like',"%{$key_word}%")
                ->where('admin_review', 'not null')
                ->where('order_id|review_img', 'not null')
                ->order('update_time desc')  // 商品列表排序
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|username|email|order_id','like',"%{$key_word}%")
        ->where('admin_review', 'not null')
        ->where('order_id|review_img', 'not null')
        ->count();
        return $res;
    }

}
