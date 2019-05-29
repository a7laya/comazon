<?php

namespace app\index\model;

use think\Model;
// 软删除
// use traits\model\SoftDelete;
use think\Session;
use think\Db;
use app\index\model\Limit;

/**
 * 已购模型
 * Class Purchased
 * @package app\store\model
 */
class Purchased extends Model
{   
    // 软删除
    // use SoftDelete;
    // protected $deleteTime = 'delete_time';

    /**
     * 是否已购买
     * @param array $data [username=>..., product_id=>...]
     * @return bool -true：已购买 -false：未购买
     */
    
    public function hasProduct(array $data)
    {   
        $limit = Limit::get(1); 
        // 是否开启不能重复购买同一商品的限制 type:varchar 'on'|''
        if($limit->no_repeat != 'on') { return false; }

        
        // 检索产品id是否已被该用户购买
        $res = self::useGlobalScope(false)->where([
            'username'   => $data['username'],
            'product_id' => $data['product_id']
        ])->find();
        if (isset($res)){ return true; } else { return false; }
    }

     /**
     * 添加购买
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {   
        $res = ['code'=>0, 'msg'=>'System error'];
        if($this->hasProduct($data)){
            $res['msg'] = 'You have purchased this product. <br>Do not buy it again.';
            return $res;
        }
        // 开启事务
        Db::startTrans();
        $session_username = Session::get('shop_user')['username'];    
        // 当该产品id未被购买,$session_username存在，且传过来的用户名和当前session一致时写入purchased表    
        if ($session_username != '' 
            && $session_username == $data['username']) {
            try {
                // 添加时间戳
                $data['ts'] = date('Y-m-d H:i:s'); 
                // 添加订单状态 0:pending 1: shipped 2:received
                $data['status'] = 0;
                // 添加购买
                $this->allowField(true)->save($data);
                Db::commit();
                $res['code'] = 1;
                $res['msg'] = 'Purchase success.';
                return $res;
            } catch (\Exception $e) {
                Db::rollback();
                $res['code'] = 0;
                $res['msg'] = 'Purchase failed.';
                return $res;
            }
        }
        return $res;
    }

    
    public function remove(array $data)
    {
        // 开启事务
        Db::startTrans();

        // 检查session
        $session_username = Session::get('shop_user')['username']; 
        if($session_username != $data['username']) return false;

        // 获取当前订单状态，如果status = 0 就可以执行remove操作
        $status =  Purchased::get($data['purchased_id'])['status'];
        if($status != 0) return false;

        // 移除订单
        try {
            // 移除购买
            Purchased::destroy($data['purchased_id']);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            return false;
        }
    
    }

}
