<?php
namespace app\admin\controller;
use app\index\model\User;
use app\index\model\Product;
use app\index\model\Purchased;
use app\index\model\Vpurchased;

class Index extends Base
{
    public function _initialize()
    {  
       parent::_initialize();
       $this->user = Model('User');
       // 权限控制-未登陆不给看
       if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }

    public function index(){
        // 模板输出
        return view();
    }

    public function login(){
        if ($this->request->isAjax()) {
            $user = input();
            $model = new Admin;
            if ($model->login($user)) {
                return 1; 
            } else {
                return 0;
            }

        }
        // 模板输出
        return view();
    }
    public function main(){
        
        // 注册用户数
        $user_count = User::count();
        $this->assign('user_count', $user_count);

        // 商品数
        $product_count = Product::count();
        $this->assign('product_count', $product_count);

        // 订单数
        $purchased_count = Purchased::count();
        $this->assign('purchased_count', $purchased_count);
        
        // 待审核数
        $res = Vpurchased::checkPending();
        // $check_pending_data = $res['data']; // 待审核订单数据集
        // var_dump($check_pending_data);
        $check_pending_count = $res['count'];
        $this->assign('check_pending_count', $check_pending_count);

        // 模板输出
        return  view();
    }
}