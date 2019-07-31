<?php
namespace app\cb\controller;
use think\Request;
use app\cb\model\Company as Co;

class Company extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->company = new Co;
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }

   
    // ================== 页面显示 ===================

    // 页面-添加
    public function companyAdd(){
        // 模板输出
        return  $this->fetch();
    }

    // 页面-编辑
    public function companyEdit(){
        $company_id = $_GET['company_id'];
        // 判断是否查询软删除数据
        if(isset($_GET['arg']) && $_GET['arg'] == 'restore') {
            $data = Co::onlyTrashed()->where('company_id', $company_id)->find();
        } else {
            $data = Co::get($company_id);
        }
        $this->assign('data', $data);
        // 模板输出
        return  $this->fetch();
    }

    // 页面-列表
    public function companyList(){
        // 模板输出
        return  $this->fetch();
    }

    // 页面-已删除列表
    public function companysRestore(){
        // 模板输出
        return  $this->fetch();
    }
    

    // ================== 数据表格接口 ===================

    // 接口-列表数据表格
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->company->tableData($data);
    }

    // 接口-已删除数据表格
    public function tableDataRestore(string $search_str = null)
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->company->tableDataRestore($data);
    }



    // ==============四接口（增-删-改-还原）============
    
    // 接口-添加
    public function addCompany()
    {   
        $_POST['create_time'] = date('Y-m-d H:i:s');
        $res = $this->company->allowField(true)->save($_POST);
        return $res;
    }
    
    // 接口-删除
    public function delCompany()
    {   
        $data = $_POST['company_id'];
        $res = Co::destroy($data);
        return $res;
    }
    
    // 接口-修改
    public function editCompany()
    {
        $res = $this->company->allowField(true)->save($_POST,['id' => $_POST['company_id']]);
        return $res;
    }

    // 接口-还原
    public function restoreCompany()
    {   
        // 软删除的恢复 用模型的restore方法，传递的是一个where数组
        $data = $this->company->restore(['company_id' => $_POST['company_id']]);
        return $data;
    }
    
    
}