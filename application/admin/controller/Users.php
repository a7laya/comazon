<?php
namespace app\admin\controller;
use think\Request;
use app\index\model\Limit;
use app\index\model\User;
use app\admin\model\Code;
class Users extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->limit = new Limit;
        $this->user = new User;
        $this->code = new Code;
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }

    // 页面-修改限制
    public function limit()
    {   
        $limit_id = $this->limit->getLimit('limit_id');
        $day_limit = $this->limit->getLimit('day');
        $week_limit = $this->limit->getLimit('week');
        $no_repeat = $this->limit->getLimit('no_repeat');
        $no_repeat_seller = $this->limit->getLimit('no_repeat_seller');
        $this->assign("limit_id",$limit_id);
        $this->assign("day_limit",$day_limit);
        $this->assign("week_limit",$week_limit);
        $this->assign("no_repeat",$no_repeat);
        $this->assign("no_repeat_seller",$no_repeat_seller);
        return view();
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

    // 页面-编辑用户界面
    public function usersEdit()
    {   
        $user_id = $_GET['user_id'];
        $res = User::get($user_id);
        $this->assign('data', $res);
        return view();
    }

    // 接口-编辑用户接口
    public function editUser()
    {
        $data = input();
        // 如果新密码被设置则更新密码
        if(trim($data['newpassword']) !=''){
            $data['password'] = shop_hash($data['newpassword']);
        }
        $res = $this->user->allowField(true)->save($data,['user_id' => $data['user_id']]);
        return ['code'=>$res, 'msg'=>'Edit Success!'];
    }

    // 页面-已删除用户列表
    public function usersListBlack()
    {
        return view();
    }

    // 页面-邀请码
    public function usersCode()
    {
        return view();
    }

    // 接口-邀请码数据表格
    public function tableDataCode()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->code->tableData($arr);
    }

    // 接口-生成邀请码
    public function createCode()
    {   
        $res = $this->code->createCode();
        return $res;
    }

    // 接口-删除邀请码
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