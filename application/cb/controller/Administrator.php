<?php
namespace app\cb\controller;
use think\Request;
use app\cb\model\User;
use think\Session;

class Administrator extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->user = new User;
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('cb/passport/login');}
    }

    // 页面 - 修改管理员信息
    public function editAdmin()
    {   
        $user_id = Session::get('session_admin.user_id');
        $res = $this->user->find($user_id);
        $this->assign('admin', $res);
        return view();
    }

    // 接口 - 修改管理员信息
    public function updateAdmin()
    {   
        $data = input();
        $old = shop_hash($data["old_password"]);
        $user_id = Session::get('session_admin.user_id');
        $res = $this->user->where(['user_id'=>Session::get('session_admin.user_id'), 'password'=>$old])->find();
        if($res){
            $data['password'] = shop_hash($data['password']);
            $this->user->allowField(['username','password'])->save($data, ['user_id' => $res['user_id']]);
            return ['code'=>1, 'msg'=>'Update Successfully!'];
        } else {
            return ['code'=>0, 'msg'=>'Original password error.'];
        }
    }
    
}