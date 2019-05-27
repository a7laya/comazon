<?php
namespace app\index\controller;
use think\Request;
// use think\Db;
use app\index\model\Product;
use app\index\model\Vproduct;
use app\index\model\Mark;
use app\index\model\Vpurchased;
use app\index\model\Purchased;
use app\index\model\Limit;
class Products extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->product = new Vproduct;
        $this->vproduct = new Product;
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
 

    // 接口 - 商品懒加载方法
    public function getList(Request $request){
        $data = input();
        $keywords = isset($data['keywords']) ? $data['keywords'] : '';
        $page_size = intval($request->param('page_size'));  //每页显示条数
        $count = $this->product->where('title|ASIN','like',"%{$keywords}%")->count();  //总记录数
        $res['total_page'] = ceil($count/$page_size);  //总页数
        $cur_page = intval($request->param('page'))-1;  //默认前端page传过来为1 
        $res['data'] = $this->product
                        ->order('product_id desc') // 后面加入的数据显示在前面
                        ->where('title|ASIN','like',"%{$keywords}%")
                        ->limit(($cur_page*$page_size),$page_size)  //limit默认要从零开始
                        ->select();
        // dump($this->product->getLastSql());die;
        return json($res);  //返回json
    }

    // 商品搜索结果
    public function productsResult()
    {   
        $this->assign('keywords', $_GET['keywords']);
        // 模板输出
        return  view();
    }


    // 商品列表页
    public function productsList(){
        if ($this->request->isAjax()) {
            $page = input();
            $product = new Product;
            if ($product->login($user)) {
                // return $this->renderSuccess('Login successfully', url('index/index'));
                return 1;
            }
            // return $this->renderError($model->getError() ?: 'Login failed');
            return 0;
        }
        // 模板输出
        return  view();
    }

    // 商品详情页
    public function productsDetail(){
        $product_id = input(); 
        // product_id是关键字段可以直接可以用model的静态方法直接get到详情
        $detail = Vproduct::get($product_id);
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
        return  view();
    }

    // 添加收藏
    public function addMark()
    {   // $data:['username'=>xxxx, 'product_id'=>12]
        $data = input();
        if($this->mark->add($data)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }

    // 移除收藏
    public function removeMark()
    {   // $data:['username'=>xxxx, 'product_id'=>12]
        $data = input();
        if($this->mark->remove($data)){
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
        }
    }




}