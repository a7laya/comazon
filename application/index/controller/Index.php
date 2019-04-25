<?php
namespace app\index\controller;

class Index extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        
    }

    public function index(){
        // 模板输出
        if($this->shop_user){
            return  view();
        } else {
            // 判断session是否存在，不存在的话就重定向
            return $this->redirect('index/passport/signIn');
        }
    }


}