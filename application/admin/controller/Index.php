<?php
namespace app\Admin\controller;

class Index extends \think\Controller
{
    public function _initialize()
    {
       $this->user = Model('User');
    }

    public function index(){
        // 模板输出
        return view();
    }
}