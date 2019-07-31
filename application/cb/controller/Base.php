<?php
namespace app\cb\controller;
use think\Controller;
use think\Session;

class Base extends Controller
{
    //如果你的控制器类继承了\think\Controller类的话，可以定义控制器初始化方法_initialize，在该控制器的方法调用之前首先执行。
    public function _initialize()
    {   
        // 获取session变量，如未登陆则该变量为null
        // 如已登陆则为一个数组['username' => 'XXXX', 'is_login' => true]
        $this->session_admin = Session::get('session_admin'); 
        if (!$this->session_admin) {
            return $this->redirect('cb/passport/login');
        }

        // 向每个继承Base的控制器模板文件 发送变量数组$session_admin
        // 在模板中$session_admin.username 为session中的用户名，发送到admin/index.html
        $this->assign([
            'session_admin' => $this->session_admin
        ]);
    }
}
