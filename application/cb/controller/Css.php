<?php
namespace app\cb\controller;
use think\Controller;
use think\Request;
// use think\Db;
use app\cb\model\Cs;
class Css extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
        $this->cs = new Cs;
    }

   
    // ================== 页面显示 ===================

    
   
    // 页面-卖家列表
    public function cssList(){
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
        return $this->cs->tableData($data);
    }

    
    // ==============四接口（增-删-改-还原）============
    
    // 接口-添加卖家
    public function addSeller()
    {
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