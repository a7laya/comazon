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
    
    // 所有订单
    public function tableData(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
                ->order('purchased_id desc')  // 列表排序
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
        ->order('purchased_id desc')  // 列表排序
        ->count();
        return $res;
    }

    // 所有订单-买家界面
    public function tableDataUser(array $arr)
    {   
        $username = Session::get('shop_user')['username'];
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
                ->where(['username' => Session::get('shop_user')['username']])
                ->order('purchased_id desc')  // 列表排序
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
        ->where(['username' => Session::get('shop_user')['username']])
        ->order('purchased_id desc')  // 列表排序
        ->count();
        return $res;
    }
    // Pending订单
    public function tableDataPending(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
                ->order('purchased_id desc')  // 列表排序
                ->where('status', 0)
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
        ->order('purchased_id desc')  // 列表排序
        ->where('status', 0)
        ->count();
        return $res;
    }
    // Pending订单-买家界面
    public function tableDataPendingUser(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
                ->where(['username' => Session::get('shop_user')['username']])
                ->order('purchased_id desc')  // 列表排序
                ->where('status', 0)
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
        ->where(['username' => Session::get('shop_user')['username']])
        ->order('purchased_id desc')  // 列表排序
        ->where('status', 0)
        ->count();
        return $res;
    }
    // Shipped订单
    public function tableDataShipped(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
                ->order('purchased_id desc')  // 列表排序
                ->where('status', 1)
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
        ->order('purchased_id desc')  // 列表排序
        ->where('status', 1)
        ->count();
        return $res;
    }
    // Shipped订单-买家界面
    public function tableDataShippedUser(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
                ->where(['username' => Session::get('shop_user')['username']])
                ->order('purchased_id desc')  // 列表排序
                ->where('status', 1)
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
        ->where(['username' => Session::get('shop_user')['username']])
        ->order('purchased_id desc')  // 列表排序
        ->where('status', 1)
        ->count();
        return $res;
    }
    // Received订单
    public function tableDataReceived(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
                ->order('purchased_id desc')  // 列表排序
                ->where('status', 2)
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|username|email|order_id|seller_name','like',"%{$keywords}%")
        ->order('purchased_id desc')  // 列表排序
        ->where('status', 2)
        ->count();
        return $res;
    }
    // Received订单-买家界面
    public function tableDataReceivedUser(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
                ->where(['username' => Session::get('shop_user')['username']])
                ->order('purchased_id desc')  // 列表排序
                ->where('status', 2)
                ->limit($arr['limit'])
                ->page($arr['page'])
                ->select();
        $res['code'] = 0;
        $res['msg'] = '';
        $res['data'] = $data;
        $res['count'] = self::useGlobalScope(false)
        ->where('title|ASIN|order_id|seller_name','like',"%{$keywords}%")
        ->where(['username' => Session::get('shop_user')['username']])
        ->order('purchased_id desc')  // 列表排序
        ->where('status', 2)
        ->count();
        return $res;
    }

    // 待审核订单数->main
    static function checkPending()
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
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
    
    // 已审核订单
    public function tableDataReviewed(array $arr)
    {
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data = self::useGlobalScope(false)
                ->where('title|ASIN|username|email|order_id','like',"%{$keywords}%")
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
        ->where('title|ASIN|username|email|order_id','like',"%{$keywords}%")
        ->where('admin_review', 'not null')
        ->where('order_id|review_img', 'not null')
        ->count();
        return $res;
    }

}
