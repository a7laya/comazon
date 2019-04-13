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
    /**
     * 登录
     * @return array|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function signin()
    {
        if ($this->request->isAjax()) {
            $model = new User;
            if ($model->login($this->postData('User'))) {
                return $this->renderSuccess('登录成功', url('index/index'));
            }
            return $this->renderError($model->getError() ?: '登录失败');
        }
        // $this->view->engine->layout(false);
        return $this->fetch('sign_in');
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
