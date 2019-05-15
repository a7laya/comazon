<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
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
    public function login()
    {
        if ($this->request->isAjax()) {
            // $user = input();
            $admin = new Admin;
            if ($admin->login($_POST)) {
                // return $this->renderSuccess('Login successfully', url('index/index'));
                return 1;
            }
            // return $this->renderError($admin->getError() ?: 'Login failed');
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
        Session::set('session_admin', null);// 退出当前session
        $this->redirect('admin/passport/login');
    }

}
