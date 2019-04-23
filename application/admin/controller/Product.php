<?php
namespace app\Admin\controller;

class Product extends Base
{
    public function _initialize()
    {
       $this->user = Model('User');
    }

    public function index(){
        // 模板输出
        return view();
    }

    public function productList(){
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