<?php
namespace app\Admin\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
    //如果你的控制器类继承了\think\Controller类的话，可以定义控制器初始化方法_initialize，在该控制器的方法调用之前首先执行。
    public function _initialize()
    {   
        $user = Session::get('shop_user'); 
        $shop_user = $user ? $user : ["username" => "Sign in",'is_login' => false];
        $this->assign([
            'shop_user' => $shop_user                     // 登录信息
        ]);
    }
}
