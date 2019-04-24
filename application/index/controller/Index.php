<?php
namespace app\index\controller;
use think\Session;
class Index extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        
    }

    public function index(){
        $user = Session::get('shop_user'); 
        if(isset($user)) {
            // 模板输出
            return  $this->fetch();
        } else {
            $this->redirect('passport/signin'); 
        }
    }


}