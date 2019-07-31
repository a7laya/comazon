<?php
namespace app\cb\model;
use think\Model;
use think\Db;

class DcDataMonth extends Model
{

    /**
     * 添加数据
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 添加数据
            $this->allowField(true)->save($data);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        } 
        // echo 'err';
        return false;
    }

    public function tableData(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this->where('name', 'like', "%{$keywords}%")
            ->order(['year'=>'desc','month'=>'desc', 'name'])  // 数据列表排序
            ->limit($arr['limit'])
            ->page($arr['page'])
            ->select();
        // $data = $this->all();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this->where('name','like',"%{$keywords}%")->count();
        $res['data']  = $data;
        return $res;
    }
    public function tableDataRestore(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this::onlyTrashed()->where('meter_id|location','like',"%{$keywords}%")
                    ->order('delete_time desc')  // 数据列表排序
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
