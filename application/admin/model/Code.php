<?php

namespace app\admin\model;

use think\Model;
// 软删除
use traits\model\SoftDelete;
use think\Session;
use think\Db;

/**
 * 邀请码模型
 * Class User
 * @package app\store\model
 */
class Code extends Model
{
    // 软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    // 查询用户注册页面输入邀请码的合法性
    public function findCode(array $data)
    {
        if (!$res = self::useGlobalScope(false)->where([
            'code' => $data['referral_code']
        ])->find()) {
            return false;
        }
        return true;
    }

    // code查重并重新生成
    public function checkCode(String $code = null)
    {
        $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $res = $this->where(['code'=>$code])->find();
        if($res) {
            // 如果重复，重新生成
            $code=substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),6);
            checkCode($code); // 递归检查
        }
        return $code;
    }

    /**
     * 生成邀请码
     * @param array $data
     * @return bool
     */
    public function createCode()
    {   
        //取随机6位字符串
        $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $code = $this->checkCode(substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),6));
        // 开启事务
        Db::startTrans();
        try {
            // 将邀请码及生成时间写入数据表
            $this->allowField(true)->save(['code'=>$code, 'create_time'=>date('Y-m-d H:i:s')]);
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
        $data     = $this->where('code','like',"%{$keywords}%")
                    ->order('code_id desc')  // 卖家列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this
                        ->where('code','like',"%{$keywords}%")
                        ->count();
        $res['data']  = $data;
        return $res;
    }
    public function tableDataRestore(array $arr)
    {   
        $keywords = isset($arr['keywords']) ? $arr['keywords'] : '';
        $data     = $this::onlyTrashed()
                    ->where('code','like',"%{$keywords}%")
                    ->order('delete_time desc')  // 卖家列表排序
                    ->limit($arr['limit'])
                    ->page($arr['page'])
                    ->select();
        $res['code']  = 0;
        $res['msg']   = '';
        $res['count'] = $this::onlyTrashed()
                        ->where('code','like',"%{$keywords}%")
                        ->count();
        $res['data']  = $data;
        return $res;
    }
    
}