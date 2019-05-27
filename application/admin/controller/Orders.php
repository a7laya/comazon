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

    
    // 页面 - 所有订单
    public function ordersAll(){
        return  view();
    }
    // 页面 - pending订单
    public function ordersPending(){
        return  view();
    }
    // 页面 - shipped订单
    public function ordersShipped(){
        return  view();
    }
    // 页面 - Received订单
    public function ordersReceived(){
        return  view();
    }
    // 页面 - 订单详情页
    public function orderDetail(){
        $purchased_id = $_GET['purchased_id'];
        $res = $this->vpurchased->where('purchased_id',$purchased_id)->find();
        $this->assign('order', $res);
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

    // 接口 - 设置pending订单为shipped
    public function setShipped()
    {
        $purchased_id = $_GET['purchased_id'];
        $code = $this->purchased->save(['status'=>1], ['purchased_id'=>$purchased_id]);
        $msg  = $code ? 'Set successfully!' : 'Set failed.';
        return ['code'=>$code, 'msg'=>$msg];
    }

    // 接口 - 设置shipped订单为pending
    public function setUnship()
    {
        $purchased_id = $_GET['purchased_id'];
        $code = $this->purchased->save(['status'=>0], ['purchased_id'=>$purchased_id]);
        $msg  = $code ? 'Set successfully!' : 'Set failed.';
        return ['code'=>$code, 'msg'=>$msg];
    }

    // 接口 - 所有订单列表数据表格
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->vpurchased->tableData($arr);
    }

    // 接口 - Pending订单列表数据表格
    public function tableDataPending()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->vpurchased->tableDataPending($arr);
    }

    // 接口 - Shipped订单列表数据表格
    public function tableDataShipped()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->vpurchased->tableDataShipped($arr);
    }

    // 接口 - Received订单列表数据表格
    public function tableDataReceived()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->vpurchased->tableDataReceived($arr);
    }

}