<?php

namespace app\index\model;

use think\Model;
use think\Session;
use think\Db;

/**
 * 收藏模型
 * Class Mark
 * @package app\store\model
 */
class Mark extends Model
{   

    /**
     * 是否已收藏
     * @param array $data [username=>..., product_id=>...]
     * @return bool -true：已收藏 -false：未收藏
     */
    
    public function hasProduct(array $data)
    {
        // 检索产品id是否已被该用户收藏
        $res = self::useGlobalScope(false)->where([
            'username'   => $data['username'],
            'product_id' => $data['product_id']
        ])->find();
        if (isset($res)){ return true; } else { return false; }
    }

    
     /**
     * 添加收藏
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        // 检索产品id是否已被该用户收藏
        $res = self::useGlobalScope(false)->where([
            'username'   => $data['username'],
            'product_id' => $data['product_id']
        ])->find();
        $session_username = Session::get('shop_user')['username'];    
        // 当该产品id未被收藏，且传过来的用户名和当前session一致时写入mark表    
        if (!isset($res) && $session_username == $data['username']) {
            try {
                // 添加时间戳
                $data['ts'] = date('Y-m-d H:i:s'); 
                // 添加收藏
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
        // 检索产品id是否已被该用户收藏
        $res = self::useGlobalScope(false)->where([
            'username'   => $data['username'],
            'product_id' => $data['product_id']
        ])->find();
        $session_username = Session::get('shop_user')['username'];    
        // 当该产品id未被收藏，且传过来的用户名和当前session一致时写入mark表    
        if (isset($res) && $session_username == $data['username']) {
            try {
                // 移除收藏
                Mark::destroy($data);
                Db::commit();
                return true;
            } catch (\Exception $e) {
                Db::rollback();
            }
        }
        return false;
    }

}
