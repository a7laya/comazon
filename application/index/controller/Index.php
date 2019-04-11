<?php
namespace app\index\controller;

class Index extends \think\Controller
{
    public function _initialize()
    {
       $this->user = Model('User');
    }

    public function index(){
        // 或者批量赋值
        $this->assign([
            'name'  => 'ThinkPHP1',
            'email' => 'thinkphp@qq.com'
        ]);
        // 模板输出
        return view();
    }
    public function signIn(){
        // 或者批量赋值
        $this->assign([
            'name'  => 'signin',
            'email' => 'thinkphp@qq.com'
        ]);
        // 模板输出
        return view();
    }
    
    public function signUp(){
        // 或者批量赋值
        $this->assign([
            'name'  => 'signin',
            'email' => 'thinkphp@qq.com'
        ]);
        // 模板输出
        return view();
    }
    public function signUpRes()
    {
        $post = input();
        $this->assign('post',$post);
        return view();
    }
}