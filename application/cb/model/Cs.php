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


    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'    => '132.232.148.169',
        // 数据库名
        'database'    => 'cb',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => '123qwe',
        // 数据库连接端口
        'hostport'    => '',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'cb_',
    ];

    /**
     * 添加水表
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 添加
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
                    ->order('id desc')  // 列表排序
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
                    ->order('delete_time desc')  // 列表排序
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
