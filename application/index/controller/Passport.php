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
    
    // 注册结果页面
    public function signUpRes()
    {
        if (!$this->request->isAjax()) {
            $user = input();
            $model = new User;
            if(isset($user['password']) ) {
                $user['password'] = shop_hash($user['password']);

                if($model->findUsername($user)) 
                {
                    return view('sign_up_res',['post' => '用户名已经存在']);
                }

                if($model->findEmail($user)) {
                    return view('sign_up_res',['post' =>'邮箱已经存在']);
                }
                
                if ($model->add($user)) {
                    // return $this->renderSuccess('添加成功');
                    return view('sign_up_res',['post' => $user['username']]);
                } 
            }
            // return $this->renderError($model->getError() ?: '添加失败');
        }

        return view('sign_up_res',['post' => '添加失败']);

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
            $model = new User;
            if ($model->login($this->postData('User'))) {
                return $this->renderSuccess('登录成功', url('index/index'));
            }
            return $this->renderError($model->getError() ?: '登录失败');
        }
        // $this->view->engine->layout(false);
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
