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
class Purchased extends Model
{   

    /**
     * 是否已购买
     * @param array $data [username=>..., product_id=>...]
     * @return bool -true：已购买 -false：未购买
     */
    
    public function hasProduct(array $data)
    {
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
        // 开启事务
        Db::startTrans();
        $session_username = Session::get('shop_user')['username'];    
        // 当该产品id未被购买,$session_username存在，且传过来的用户名和当前session一致时写入purchased表    
        if (!$this->hasProduct($data)
            && $session_username != '' 
            && $session_username == $data['username']) {
            try {
                // 添加时间戳
                $data['ts'] = date('Y-m-d H:i:s'); 
                // 添加购买
                $this->allowField(true)->save($data);
                Db::commit();
                return true;
            } catch (\Exception $e) {
                Db::rollback();
            }
        }
        return false;
    }

    public function remove(array $data)
    {
        // 开启事务
        Db::startTrans();
        $session_username = Session::get('shop_user')['username'];    
        // 当该产品id已被购买，且传过来的用户名和当前session一致时从purchased表删除    
        if ($session_username == $data['username']) {
            try {
                // 移除购买
                Purchased::destroy($data);
                Db::commit();
                return true;
            } catch (\Exception $e) {
                Db::rollback();
            }
        }
        return false;
    }

}
