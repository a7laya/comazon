<?php
namespace app\admin\controller;
use think\Request;
// use think\Db;
use app\admin\model\Seller;
class Sellers extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->seller = new Seller;
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }

   
    // ================== 页面显示 ===================

    // 页面-添加卖家
    public function sellersAdd(){
        // 模板输出
        return  $this->fetch();
    }

    // 页面-编辑卖家
    public function sellersEdit(){
        $seller_id = $_GET['seller_id'];
        // 判断是否查询软删除数据
        if(isset($_GET['arg']) && $_GET['arg'] == 'restore') {
            $data = Seller::onlyTrashed()->where('seller_id', $seller_id)->find();
        } else {
            $data = Seller::get($seller_id);
        }
        $this->assign('data', $data);
        // 模板输出
        return  $this->fetch();
    }

    // 页面-卖家列表
    public function sellersList(){
        // 模板输出
        return  $this->fetch();
    }

    // 页面-卖家已删除列表
    public function sellersRestore(){
        // 模板输出
        return  $this->fetch();
    }
    

    // ================== 数据表格接口 ===================

    // 接口-卖家列表数据表格
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->seller->tableData($data);
    }

    // 接口-已删除卖家数据表格
    public function tableDataRestore(string $search_str = null)
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->seller->tableDataRestore($data);
    }



    // ==============四接口（增-删-改-还原）============
    
    // 接口-添加卖家
    public function addSeller()
    {   
        $_POST['create_time'] = date('Y-m-d H:i:s');
        $res = $this->seller->allowField(true)->save($_POST);
        return $res;
    }
    
    // 接口-删除卖家
    public function delSeller()
    {   
        $data = $_POST['seller_id'];
        $res = Seller::destroy($data);
        return $res;
    }
    
    // 接口-修改卖家
    public function editSeller()
    {
        $res = $this->seller->allowField(true)->save($_POST,['id' => $_POST['seller_id']]);
        return $res;
    }

    // 接口-还原卖家
    public function restoreSeller()
    {   
        // 软删除的恢复 用模型的restore方法，传递的是一个where数组
        $data = $this->seller->restore(['seller_id' => $_POST['seller_id']]);
        return $data;
    }
    
    
}