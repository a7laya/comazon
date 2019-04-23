<?php

namespace app\index\controller;

use app\index\model\User;
use think\Session;

/**
 * 
 * Class Passport
 * @package app\store\controller
 */
class Passport extends Base
{
        

    
    // 注册页面
    public function signUp()
    {       
        return view();
    }
    
    // 用于在注册界面即时检查用户名是否存在
    public function checkUsername()
    {   
        $user = input();
        $model = new User;
        if($model->findUsername($user)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }
    // 用于在注册界面即时检查用户名是否存在
    public function checkEmail()
    {   
        $user = input();
        $model = new User;
        if($model->findEmail($user)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }

    // 注册结果页面
    public function signUpRes()
    {
        if ($this->request->isAjax()) {
            $user = input();
            $model = new User;
            if(isset($user['password']) ) {
                $user['password'] = shop_hash($user['password']);

                if($model->findUsername($user)) 
                {
                    return 0;
                }

                if($model->findEmail($user)) {
                    return 0;
                }
                
                if ($model->add($user)) {
                    // return $this->renderSuccess('添加成功');
                    return 1;
                } 
            }
            // return $this->renderError($model->getError() ?: '添加失败');
        }
        return view();
    }


    /**
     * 登录
     * @return array|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function signIn()
    {
        if ($this->request->isAjax()) {
            $user = input();
            var_dump($user);
            $model = new User;
            if ($model->login($user)) {
                // return $this->renderSuccess('Login successfully', url('index/index'));
                return 1;
            }
            // return $this->renderError($model->getError() ?: 'Login failed');
            return 0;
        }
        return view();
    }


    // public function login()
    // {

    // }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear('yoshop_store');
        $this->redirect('passport/login');
    }

}
