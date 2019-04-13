<?php

namespace app\index\model;

use think\Model;
use think\Session;

/**
 * 用户模型
 * Class User
 * @package app\store\model
 */
class User extends Model
{
    /**
     * 用户登录
     * @param $data
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login($data)
    {
        // 验证用户名密码是否正确
        if (!$user = self::useGlobalScope(false)->where([
            'username' => $data['username'],
            // 'password' => shop_hash($data['password'])
            'password' => $data['password']
        ])->find()) {
            $this->error = '登录失败, 用户名或密码错误';
            return false;
        }

        // 保存登录状态
        Session::set('shop_user', [
            'user' => [
                'user_id' => $user['user_id'],
                'username' => $user['username'],
            ],
            'is_login' => true,
        ]);
        return true;
    }

    /**
     * 信息
     * @param $user_id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($user_id)
    {
        return self::get($user_id);
    }

    /**
     * 更新当前信息
     * @param $data
     * @return bool
     */
    public function renew($data)
    {
        if ($data['password'] !== $data['password_confirm']) {
            $this->error = '确认密码不正确';
            return false;
        }
        // 更新信息
        if ($this->save([
                'username' => $data['username'],
                'password' => shop_hash($data['password']),
            ]) === false) {
            return false;
        }
        // 更新session
        Session::set('shop_user.user', [
            'user_id' => $this['user_id'],
            'username' => $data['username'],
        ]);
        return true;
    }

}
