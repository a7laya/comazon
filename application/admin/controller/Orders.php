<?php
namespace app\admin\controller;
use app\index\model\User;
use app\index\model\Product;
use app\index\model\Purchased;
use app\index\model\Vpurchased;

class Orders extends Base
{
    public function _initialize()
    {  
       parent::_initialize();
       $this->user = Model('User');
       $this->purchased = new Purchased; 
       $this->vpurchased = new Vpurchased; // 视图
       // 权限控制-未登陆不给看
       if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }

   
    public function ordersForReview(){
            return  view();
    }
    public function ordersReviewed(){
            return  view();
    }
    public function reviewOrder(){
        $purchased_id = (int)$_GET['purchased_id'];
        $data = $this->vpurchased->where('purchased_id', $purchased_id)->find();
        $this->assign('order', $data);
        // 模板输出
        return  view();
    }
    public function orderReviewSubmit()
    {   
        // 前端传过来的swith开关在关的时候是没有数据的，所以做如下处理
        if(!isset($_POST['admin_review'])) {$_POST['admin_review'] = null;};
        $res = $this->purchased->allowField(true)->save($_POST,['id' => $_POST['purchased_id']]);
        return $res;
    }
    // 待审核订单列表数据表格接口
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->vpurchased->tableData($arr);
    }
    // 已审核订单列表数据表格接口
    public function tableDataReviewed()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->vpurchased->tableDataReviewed($arr);
    }
}