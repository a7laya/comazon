<?php

namespace app\admin\model;

use think\Model;
use think\Session;
use think\Db;

/**
 * 管理员模型
 * Class Admin
 * @package app\store\model
 */
class Admin extends Model
{
    /**
     * 管理员登录
     * @param $data
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login($data)
    {
        // 验证管理员名密码是否正确
        if (!$Admin = self::useGlobalScope(false)->where([
            'username' => $data['account'],
            'password' => shop_hash($data['password'])
        ])->find()) {
            $this->error = '登录失败, 管理员名或密码错误';
            return false;
        }

        // 保存登录状态
        Session::set('shop_admin', [
            'Admin' => [
                'admin_id' => $Admin['admin_id'],
                'username' => $Admin['username'],
            ],
            'is_login' => true,
        ]);
        return true;
    }

   

    /**
     * 更新当前信息
     * @param $data
     * @return bool
     */
    public function renew($data)
    {
        // 更新信息
        if ($this->save([
                'username' => $data['username'],
                'password' => shop_hash($data['password']),
            ]) === false) {
            return false;
        }
        // 更新session
        Session::set('shop_admin.Admin', [
            'admin_id' => $this['admin_id'],
            'username' => $data['username'],
        ]);
        return true;
    }

}