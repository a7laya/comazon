<?php

namespace app\cb\model;
use think\Model;
use think\Db;
// 软删除
use traits\model\SoftDelete;

class Cs extends Model
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
        $data     = $this->where('meter_id|location','like',"%{$keywords}%")
                    ->order('id desc')  // 商品列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this->where('meter_id|location','like',"%{$keywords}%")->count();
        $res['data']  = $data;
        return $res;
    }
    public function tableDataRestore(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this::onlyTrashed()->where('meter_id|location','like',"%{$keywords}%")
                    ->order('delete_time desc')  // 商品列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this::onlyTrashed()->where('meter_id|location','like',"%{$keywords}%")->count();
        $res['data']  = $data;
        return $res;
    }
}
