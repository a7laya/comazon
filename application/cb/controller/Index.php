<?php
namespace app\cb\controller;
use think\Controller;
use app\index\model\User;
use think\Session;

class Index extends Base
{
    public function _initialize()
    {  
       parent::_initialize();
       $this->user = Model('User');
       // 权限控制-未登陆不给看
    //    if (!$this->session_admin){return $this->redirect('cb/passport/login');}
    }

    public function index()
    {
        $user_id    = Session::get("session_admin.user_id");
        $user       = $this->user::get($user_id);

        $water_meter_user   = config('role_id.water_meter_user');
        $datacenter         = config('company_id.datacenter');
        $datacenter_suadmin   = config('role_id.datacenter_suadmin');
        $datacenter_admin     = config('role_id.datacenter_admin');

        // 模板输出
        return view('index', [
            'role' => $user['role_id'],
            'user_id' => $user_id,
            'company_id' => $user['company_id'],
            'water_meter_user' => $water_meter_user,
            'datacenter_suadmin' => $datacenter_suadmin,
            'datacenter_admin' => $datacenter_admin,
            'datacenter' => $datacenter
        ]);
    }

    public function login()
    {
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

    public function main()
    {
        // 模板输出
        return  view();
    }
    public function p404()
    {
        return view();
    }
}