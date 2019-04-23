<?php

namespace app\index\model;

use think\Model;
use think\Session;
use think\Db;

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
            'username' => $data['account'],
            'password' => shop_hash($data['password'])
        ])->find()
        && !$user = self::useGlobalScope(false)->where([
            'email' => $data['account'],
            'password' => shop_hash($data['password'])
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
     * 添加买家
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            if(isset($data['password']) ) {
                $data['password'] = shop_hash($data['password']);
            }
            // 添加买家
            $this->allowField(true)->save($data);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }

    public function findEmail(array $data)
    {
        if (!$user = self::useGlobalScope(false)->where([
            'email' => $data['email']
        ])->find()) {
            return false;
        }
        return true;

    }

    public function findUsername(array $data)
    {
        if (!$user = self::useGlobalScope(false)->where([
            'username' => $data['username']
        ])->find()) {
            return false;
        }
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
        if ($data['password'] !== $data['repassword']) {
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
