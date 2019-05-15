<?php
namespace app\admin\controller;
use think\Request;
use app\index\model\Limit;
use app\index\model\User;
class Users extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->limit = new Limit;
        $this->user = new User;
    }

    // 修改限制页面
    public function limit()
    {   
        $limit_id = $this->limit->getLimit('limit_id');
        $day_limit = $this->limit->getLimit('day');
        $week_limit = $this->limit->getLimit('week');
        $no_repeat = $this->limit->getLimit('no_repeat');
        $this->assign("limit_id",$limit_id);
        $this->assign("day_limit",$day_limit);
        $this->assign("week_limit",$week_limit);
        $this->assign("no_repeat",$no_repeat);
        return View();
    }

    // 修改限制接口
    public function updateLimit()
    {   
        // 前端传过来的swith开关在关的时候是没有数据的，所以做如下处理
        if(!isset($_POST['no_repeat'])) {$_POST['no_repeat'] = null;};
        $res = $this->limit->allowField(true)->save($_POST,['id' => $_POST['limit_id']]);
        return $res;
    }

    public function usersList()
    {
        return View();
    }
    public function usersListBlack()
    {
        return View();
    }

    // 用户列表->数据表格接口
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $arr = input();
        // $data['search_str'] = $search_str;
        return $this->user->tableData($arr);
    }

    // 黑名单->数据表格接口
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