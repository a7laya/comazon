<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Admin;
class Administrator extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->admin = new Admin;
    }

    // 页面 - 修改管理员信息
    public function editAdmin()
    {   
        $res = $this->admin->find(1);
        $this->assign('admin', $res);
        return view();
    }

    // 接口 - 修改管理员信息
    public function updateAdmin()
    {   
        $data = input();
        $old = shop_hash($data["old_password"]);
        $res = $this->admin->where(['admin_id'=>1, 'password'=>$old])->find();
        if($res){
            $data['password'] = shop_hash($data['password']);
            $this->admin->allowField(['username','password'])->save($data, ['admin_id' => $data['admin_id']]);
            return ['code'=>1, 'msg'=>'Administrator Information Update Successfully!'];
        } else {
            return ['code'=>0, 'msg'=>'Administrator Information Update Failed!'];
        }
    }
    
}