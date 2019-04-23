<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
    //如果你的控制器类继承了\think\Controller类的话，可以定义控制器初始化方法_initialize，在该控制器的方法调用之前首先执行。
    public function _initialize()
    {   
        $this->user = Session::get('shop_user'); 
        $this->assign([
            'shop_user' => $this->user ? $this->user : 'null',
        ]);
        //判断有无shop_user这个session，如果没有，跳转到登陆界面
        if(!session('shop_user')){
            // return $this->error('您没有登陆',url('index/passport/signIn'));
            return $this->redirect('index/passport/signIn');
        } 
    }
}
