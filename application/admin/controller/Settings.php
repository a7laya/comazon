<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Setting;
class Settings extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->setting = new Setting;
        // 如果Setting表内无数据，则自动加一条空数据
        if(!$this->setting->count()){$this->setting->save(['site_name'=>'COMAZON','contact'=>'COMAZON@COMAZON.com']);};
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }



    // 接口-修改联系方式
    public function updateSetting()
    {   
        $res = $this->setting->allowField(true)->save($_POST,['id' => $_POST['setting_id']]);
        if($res){
            return ['code'=>1,'msg'=>'Update Successfully!'];
        }
        return ['code'=>0,'msg'=>'Nothing change!'];
    }

    // 页面-编辑用户界面
    public function settingsEdit()
    {   
        $res = Setting::get(1);
        $this->assign('data', $res);
        return view();
    }
        
}