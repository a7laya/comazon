<?php
namespace app\index\controller;
use think\Request;
// use think\Db;
use app\index\model\User;
use app\index\model\Mark;
use app\index\model\Vpurchased;
use app\index\model\Purchased;
use app\index\model\Limit;
class Users extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->user = new User;
        $this->mark = new Mark;
        $this->limit = new Limit; // 购买限制
        $this->purchased = new Purchased; // 表用于写入和删除
        $this->vpurchased = new Vpurchased; // 视图

        // 获取购买限制数量
        $this->day_limit = $this->limit->getLimit('day');
        $this->week_limit = $this->limit->getLimit('week');

        // 获取已购买数量
        $this->day_count = count($this->vpurchased->dayPurchase());
        $this->week_count = count($this->vpurchased->weekPurchase());

        // 判断是否登录，没有登录则进不了控制器下的页面
        if(!$this->shop_user){return $this->redirect('index/passport/signIn');}
    }


    // 页面-用户中心
    public function usersCenter()
    {
        // 模板输出
        return view();
    }

    // 页面 - 修改密码
    public function usersPassword()
    {   
        return view();
    }

    // 接口 - 修改密码
    public function updatePassword()
    {   
        $data = input();
        $old = shop_hash($data["old_password"]);
        $res = $this->user->where([
            'username'=>$data['username'], 
            'password'=>$old
            ])->find();
        if($res){
            $data['password'] = shop_hash($data['password']);
            $this->user->allowField(['password'])->save($data, ['username' => $data['username']]);
            return ['code'=>1, 'msg'=>'Password Update Successfully!'];
        } else {
            return ['code'=>0, 'msg'=>'Original password error.'];
        }
    }

    // 页面-修改个人资料
    public function usersEdit()
    {
        $username = $this->shop_user['username'];
        $res = User::get(['username'=>$username]);
        $this->assign('data', $res);
        return view();
    }

    // 接口-修改个人资料
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

    // 页面-用户中心-个人信息（默认页）
    public function usersCenterMain()
    {   
        $username = $this->shop_user['username'];
        $res = $this->user->where(['username'=>$username])->find();
        $this->assign([
            'data'=>$res,
            'day_limit'=>$this->day_limit,
            'week_limit'=>$this->week_limit,
            'day_count'=>$this->day_count,
            'week_count'=>$this->week_count,
            // 当日 当周 剩余可购买数量
            'day_surplus'=>$this->day_limit-$this->day_count,
            'week_surplus'=>$this->week_limit-$this->week_count,
            ]);
        // 模板输出
        return  view();
    }

    // 接口-商品懒加载方法
    public function getList(Request $request){
        $data = input();
        $keywords = isset($data['keywords']) ? $data['keywords'] : '';
        $page_size = intval($request->param('page_size'));  //每页显示条数
        $count = $this->user->where('title|ASIN','like',"%{$keywords}%")->count();  //总记录数
        $res['total_page'] = ceil($count/$page_size);  //总页数
        $cur_page = intval($request->param('page'))-1;  //默认前端page传过来为1 
        $res['data'] = $this->user
                        ->order('user_id desc') // 后面加入的数据显示在前面
                        ->where('title|ASIN','like',"%{$keywords}%")
                        ->limit(($cur_page*$page_size),$page_size)  //limit默认要从零开始
                        ->select();
        // dump($this->user->getLastSql());die;
        return json($res);  //返回json
    }

    // 商品搜索结果
    public function usersResult()
    {   
        $this->assign('keywords', $_GET['keywords']);
        // 模板输出
        if($this->shop_user){
            return  view();
        } else {
            // 判断session不存在->重定向至登录界面
            return $this->redirect('index/passport/signIn');
        }
    }


    // 商品列表页
    public function usersList(){
        if ($this->request->isAjax()) {
            $page = input();
            $user = new User;
            if ($user->login($user)) {
                // return $this->renderSuccess('Login successfully', url('index/index'));
                return 1;
            }
            // return $this->renderError($model->getError() ?: 'Login failed');
            return 0;
        }
        // 模板输出
        if($this->shop_user){
            return  view();
        } else {
            // 判断session不存在->重定向至登录界面
            return $this->redirect('index/passport/signIn');
        }
    }

    // 商品详情页
    public function usersDetail(){
        $user_id = input(); 
        // user_id是关键字段可以直接可以用model的静态方法直接get到详情
        $detail = User::get($user_id);
        $this->assign('detail', $detail);

        // 输出当日下单列表
        $dayPurchase = $this->vpurchased->dayPurchase();
        // var_dump($dayPurchase);
        $this->assign('dayPurchase', $dayPurchase);

        // 输出当周下单列表
        $weekPurchase = $this->vpurchased->weekPurchase();
        // var_dump($weekPurchase);
        $this->assign('weekPurchase', $weekPurchase);

        $this->assign('weekLimit', $this->week_limit);
        $this->assign('weekCount', $this->week_count);
        $this->assign('dayLimit', $this->day_limit);
        $this->assign('dayCount', $this->day_count);


        // 模板输出
        if($this->shop_user){
            return  view();
        } else {
            // 判断session不存在->重定向至登录界面
            return $this->redirect('index/passport/signIn');
        }
    }

    // 订单完善页面
    public function orderComplete(){
        $data = input();
        $purchased_id = $data['purchased_id'];
        $res = Vpurchased::get(['purchased_id' => $purchased_id]);
        $this->assign('order', $res);
        // var_dump($data);
        // echo $data['purchased_id'];
        // 模板输出
        if($this->shop_user){
            return  view();
        } else {
            // 判断session不存在->重定向至登录界面
            return $this->redirect('index/passport/signIn');
        }
    }

    // 订单完善后的提交
    public function orderCompleteSubmit()
    {
        $res = $this->purchased->allowField(true)->save($_POST,['id' => $_POST['purchased_id']]);
        return $res;
    }

    // review截图 上传
    public function uploadReview(Request $request){
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploadReview');
        $res = array();  //定义一个返回的数组
        if($info){
            $res['code']= 1;
            $res['msg'] = 'Upload success!';
            $res['savename'] = "uploadReview/".$info->getSaveName(); 
        }else{
            // 上传失败获取错误信息
            $res['code']= 0;
            $res['msg'] = 'Failed to upload!';
            $res['savename'] = ""; 
            $res['err'] = $file->getError();
        }
        return $res;
    }
    

    // 添加收藏
    public function addMark()
    {   // $data:['username'=>xxxx, 'user_id'=>12]
        $data = input();
        if($this->mark->add($data)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }

    // 移除收藏
    public function removeMark()
    {   // $data:['username'=>xxxx, 'user_id'=>12]
        $data = input();
        if($this->mark->remove($data)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }


    // 添加已购
    public function addPurchased()
    {   // $data:['username'=>xxxx, 'user_id'=>12]
        $data = input();
        $data['ts'] = date('Y-m-d H:i:s');

        // 返回信息
        $res = ['code'=>0, 'msg'=>''];

        // 先判断本周购买次数是否已用完
        if($this->week_count >= $this->week_limit) {
            $res['msg'] = 'Only '.(string)$this->week_limit.' item(s) can be purchased this week.';
            return $res;
        }

        // 再判断日购买是否超标
        if($this->day_count < $this->day_limit) {
            $res = $this->purchased->add($data);
            return $res;
        } else {
            $res['msg'] = 'Only '.(string)$this->day_limit.' item(s) can be purchased today.';
            return $res;
        }
    }

    // 移除已购
    public function removePurchased()
    {   
        // $data:['username'=>xxxx, 'purchased_id'=>12]
        $data = input();
        if($this->purchased->remove($data)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }




}