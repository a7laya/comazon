<?php

namespace app\index\controller;
use think\Controller;
use app\index\model\User;
use app\admin\model\Code;
use think\Session;
use think\Request;
use think\Db;

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
        // 如果注册者是通过邀请链接来的话，直接传递邀请码到前台自动填好
        $code = isset($_GET['code']) ? $_GET['code'] : '';
        $this->assign('code', $code);
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
    // 用于在注册界面即时检查邮箱是否存在
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
    // 用于在注册界面即时检查邀请码是否合法
    public function checkCode()
    {   
        $user = input();
        $model = new Code;
        if($model->findCode($user)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }

    // 注册结果页面
    public function signUpRes()
    {
        if ($this->request->isAjax()) {
            $data = input();
            $user = new User;
            $code = new Code;
            if($user->findUsername($data)) 
            {
                return ['code'=>0, 'msg'=>'Username Has Been Occupied!'];
            }

            if($user->findEmail($data)) {
                return ['code'=>0, 'msg'=>'Email Has Been Occupied!'];
            }
            
            if(!$code->findCode($data)) {
                return ['code'=>0, 'msg'=>'Illegal Invitation Code!'];
            }
            
            if ($user->add($data)) {
                // return $this->renderSuccess('添加成功');
                $code->where(['code'=>$data['referral_code']])->delete();
                return ['code'=>1, 'msg'=>'Registration Success!'];
            } 
        }
            // return $this->renderError($user->getError() ?: '添加失败');

        // return view();
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



    /**
     * 退出登录
     */
    public function logout()
    {   
        
        // 写入登录时间和ip
        Db::table('user')
        ->where(['username'=>$this->shop_user['username']])
        ->update(['last_login_time'=>date('Y-m-d H:i:s'),'last_login_ip'=>$this->request->ip()]);
        
        // 退出当前session
        Session::set('shop_user', null);

        $this->redirect('index/passport/signIn');
    }

}
