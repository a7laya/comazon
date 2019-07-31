<?php
namespace app\index\controller;
use think\Session;
use app\index\model\User;
use app\index\model\Mark;
use app\index\model\Vpurchased;
use app\index\model\Purchased;
use app\index\model\Limit;
class Index extends Base
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

    public function index(){
        $username = $this->shop_user['username'];
        $buyer = $this->user->where(['username'=>$username])->find();
        $this->assign([
            'buyer'=>$buyer,
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

    public function contactUs()
    {
        
        // 模板输出
        if($this->shop_user){
            return view();
        } else {
            // 判断session不存在->重定向至登录界面
            return $this->redirect('index/passport/signIn');
        }
    }


}