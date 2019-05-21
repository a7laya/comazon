<?php

namespace app\cb\model;
use think\Model;
use think\Db;

class Cs extends Model
{
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
    public function tableData(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this
                    ->where('id','like',"%{$keywords}%")
                    // ->order('id desc')  // 卖家列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this
                        ->where('id','like',"%{$keywords}%")
                        ->count();
        $res['data']  = $data;
        return $res;
    }
}
