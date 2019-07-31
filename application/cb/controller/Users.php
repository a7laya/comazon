<?php
namespace app\cb\controller;
use think\Request;
use app\cb\model\User;
use app\cb\model\Company;
use app\cb\model\Cs;
use think\Session;

class Users extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->user = new User;
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('cb/passport/login');}
    }



    // 接口-修改限制
    public function updateLimit()
    {   
        // 前端传过来的swith开关在关的时候是没有数据的，所以做如下处理
        if(!isset($_POST['no_repeat'])) {$_POST['no_repeat'] = null;};
        $res = $this->limit->allowField(true)->save($_POST,['id' => $_POST['limit_id']]);
        return $res;
    }

    // 页面-用户列表
    public function usersList()
    {
        return view();
    }


    // 页面-用户添加
    public function usersAdd()
    {
        $co = new Company();
        $meter= new Cs();

        $user_id    = Session::get("session_admin.user_id");
        $user       = $this->user::get($user_id);

        $company_id = $user['company_id'];
        $datacenter = config('company_id.datacenter');

        $role_list  = array_slice(config('role'), $user['role_id'] + 1, null, true);

        if (
            $company_id == $datacenter
            && $user['role_id'] == config('role_id.datacenter_suadmin')
        ) {
            $company_list = $co->all();
        } else {
            $company_list = $co->where('company_id', '<>', config('company_id.datacenter'))->select();
        }

        if (
            $company_id == $datacenter
            && $user['role_id'] != config('role_id.water_meter_user')
        ) {
            $meter_list =  $meter->all();
        } else if ($user['role_id'] != config('role_id.water_meter_user')) {
            $meter_list = $meter->where('company_id', $company_id)->select();
        } else {
            $meter_list = [];
        }

        return view('users_add', [
            'companyList' => $company_list,
            'roleList' => $role_list,
            'meterList' => $meter_list,
            'company_id' => $company_id,
            'datacenter' => $datacenter
        ]);
    }

    // 页面-用户添加
    public function addUser()
    {
        $user = input();
        $user['company_id'] = Session::get("session_admin.company_id");
        $user['create_time'] = date('Y-m-d H:i:s');
        $res = $this->user->allowField(true)->save($user);
        return $res;
    }

    // 页面-编辑用户界面
    public function usersEdit()
    {   
        $user_id = $_GET['user_id'];
        $user = User::get($user_id);
        $co = new Company();
        $meter= new Cs();

        $user['company_name'] = $co->where(['company_id' => $user['company_id']])->value('company_name');
        $user['role_name'] = config('role.'.$user['role_id']);
        $meter_list =  $meter->all();

        $session_user_id    = Session::get("session_admin.user_id");
        $session_user       = $this->user::get($session_user_id);
        $session_company_id = $session_user['company_id'];

        $datacenter         = config('company_id.datacenter');
        $role_list = array_slice(config('role'), $session_user['role_id'] + 1, null, true); 

        if (
            $session_company_id == $datacenter
            && $session_user['role_id'] == config('role_id.datacenter_suadmin')
        ) {
            $company_list = $co->all();
        } else {
            $company_list = $co->where('company_id', '<>', config('company_id.datacenter'))->select();
        }

        if (
            $session_company_id == $datacenter
            && $session_user['role_id'] != config('role_id.water_meter_user')
        ) {
            $meter_list =  $meter->all();
        } else if ($session_user['role_id'] != config('role_id.water_meter_user')) {
            $meter_list = $meter->where('company_id', $session_company_id)->select();
        } else {
            $meter_list = [];
        }

        return view('users_edit', [
            'companyList' => $company_list, 
            'roleList' => $role_list, 
            'meterList' => $meter_list, 
            'data' => $user,
            'company_id' => $session_company_id,
            'datacenter' => $datacenter
        ]);
    }

    // 接口-编辑用户接口
    public function editUser()
    {
        $data = input();
        $res = $this->user->allowField(true)->save($data,['user_id' => $data['user_id']]);
        return ['code'=>$res, 'msg'=>'Edit Success!'];
    }

    // 页面-已删除用户列表
    public function usersListBlack()
    {
        return view();
    }

    public function resetPassword()
    {
        $user_id = input('user_id');
        if ($this->user->update(['password' => shop_hash('1'), 'user_id' => $user_id])) {
            return 1;
        } else {
            return 0;
        }
    }


    // 接口-删除
    public function delCode()
    {
        $data = $_POST['code_id'];
        $res = Code::destroy($data);
        return $res;
    }

    // 接口-用户列表->数据表格
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->user->tableData($arr);
    }

    // 接口-黑名单->数据表格
    public function tableDataBlack()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->user->tableDataBlack($arr);
    }
    // 拉黑
    public function delUser()
    {
        $data = $_POST['user_id'];
        $res = User::destroy($data);
        return $res;
    }

    // 洗白
    public function restoreUser()
    {
        // 软删除的恢复 用模型的restore方法，传递的是一个where数组
        $data = $this->user->restore(['user_id' => $_POST['user_id']]);
        return $data;
    }

    
}