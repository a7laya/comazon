<?php
 
namespace app\index\model;

use think\Model;
// 软删除
use traits\model\SoftDelete;
use think\Session;
use think\Db;

/**
 * 商品模型
 * Class User
 * @package app\store\model
 */
class Product extends Model
{
    // 软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';


    /**
     * 添加商品
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 添加商品
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
        $data     = $this->where('title|ASIN','like',"%{$keywords}%")
                    ->order('product_id desc')  // 商品列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this->where('title|ASIN','like',"%{$keywords}%")->count();
        $res['data']  = $data;
        return $res;
    }
    public function tableDataRestore(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this::onlyTrashed()->where('title|ASIN','like',"%{$keywords}%")
                    ->order('delete_time desc')  // 商品列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this::onlyTrashed()->where('title|ASIN','like',"%{$keywords}%")->count();
        $res['data']  = $data;
        return $res;
    }
    
}