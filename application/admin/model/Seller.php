<?php

namespace app\admin\model;

use think\Model;
// 软删除
use traits\model\SoftDelete;
use think\Session;
use think\Db;

/**
 * 卖家(店铺)模型
 * Class User
 * @package app\store\model
 */
class Seller extends Model
{
    // 软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    /**
     * 添加卖家
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 添加卖家
            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }
    public function tableData(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this->where('seller_id|seller_name','like',"%{$keywords}%")
                    // ->order('seller_id desc')  // 卖家列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this
                        ->where('seller_id|seller_name','like',"%{$keywords}%")
                        ->count();
        $res['data']  = $data;
        return $res;
    }
    public function tableDataRestore(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this::onlyTrashed()
                    ->where('seller_id|seller_name','like',"%{$keywords}%")
                    ->order('delete_time desc')  // 卖家列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this::onlyTrashed()
                        ->where('seller_id|seller_name','like',"%{$keywords}%")
                        ->count();
        $res['data']  = $data;
        return $res;
    }
    
}