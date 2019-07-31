<?php
namespace app\cb\model;
use think\Model;
use think\Db;
// 软删除
use traits\model\SoftDelete;

class DcData extends Model
{
    
    // 软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';



    /**
     * 添加设备
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 添加设备
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
        $date1 = isset($arr['date1']) ? $arr['date1'] : '';
        $date2 = isset($arr['date2']) ? $arr['date2'] : '';
        $data     = $this->where('NAME|location', 'like', "%{$keywords}%")
        ->whereBetween('TIME',"$date1, $date2")
            ->order('dc_id desc')  // 设备列表排序
            ->limit($arr['limit'])
            ->page($arr['page'])
            ->select();
        // $data = $this->all();
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
                    ->order('delete_time desc')  // 设备列表排序
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
