<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use app\index\model\Product;
use app\index\model\Mark;
use app\index\model\Vpurchased;
use app\index\model\Purchased;
use app\index\model\Limit;
use app\admin\model\Seller;
class Products extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->product = new Product;
        $this->mark = new Mark;
        $this->purchased = new Purchased; // 表用于写入和删除
        $this->vpurchased = new Vpurchased; // 视图
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }


    // 商品懒加载方法
    // public function getList(Request $request){
    //     $page_size = intval($request->param('page_size'));  //每页显示条数
    //     $count = $this->product->count();  //总记录数
    //     $res['total_page'] = ceil($count/$page_size);  //总页数
    //     $cur_page = intval($request->param('page'))-1;  //默认前端page传过来为1 
    //     $res['data'] = $this->product
    //         ->limit(($cur_page*$page_size),$page_size)  //limit默认要从零开始
    //         ->select();
    //     // dump($this->product->getLastSql());die;
    //     return json($res);  //返回json
    // }


    // 添加商品页
    public function productsAdd(){
        $sellers = new Seller();
        $res     = $sellers->select();
        $this->assign('sellers', $res);
        // 模板输出
        return  $this->fetch();
    }
    // 添加商品页
    public function productsEdit(){
        $product_id = $_GET['product_id'];
        // 判断是否查询软删除数据
        if(isset($_GET['arg']) && $_GET['arg'] == 'restore') {
            $data = Product::onlyTrashed()->where('product_id', $product_id)->find();
        } else {
            $data = Product::get($product_id);
        }
        $this->assign('data', $data);
        // 模板输出
        return  $this->fetch();
    }
    // 商品列表页
    public function productsList(){
        // 模板输出
        return  $this->fetch();
    }
    // 商品回收站
    public function productsRestore(){
        // 模板输出
        return  $this->fetch();
    }
    

    // 商品列表数据表格接口
    public function tableData()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->product->tableData($data);
    }

    // 商品列表数据表格接口
    public function tableDataRestore(string $search_str = null)
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->product->tableDataRestore($data);
    }

    // 删除商品
    public function delProduct()
    {   
        $data = $_POST['product_id'];
        $res = Product::destroy($data);
        return $res;
    }

    // 还原商品
    public function restoreProduct()
    {   
        // 软删除的恢复 用模型的restore方法，传递的是一个where数组
        $data = $this->product->restore(['product_id' => $_POST['product_id']]);
        return $data;
    }

    // 商品详情页
    public function productsDetail(){
        $product_id = input(); 
        // product_id是关键字段可以直接可以用model的静态方法直接get到详情
        $detail = Product::get($product_id);
        $this->assign('detail', $detail);

        // 输出当日下单列表
        $dayPurchase = $this->vpurchased->dayPurchase();
        // var_dump($dayPurchase);
        $this->assign('dayPurchase', $dayPurchase);

        // 输出当周下单列表
        $weekPurchase = $this->vpurchased->weekPurchase();
        // var_dump($weekPurchase);
        $this->assign('weekPurchase', $weekPurchase);


        // 模板输出
        return  $this->fetch();
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
        return  $this->fetch();
    }

    // 添加商品
    public function addItem()
    {
        $res = $this->product->allowField(true)->save($_POST);
        return $res;
    }
    // 修改商品
    public function editItem()
    {
        $res = $this->product->allowField(true)->save($_POST,['id' => $_POST['product_id']]);
        return $res;
    }

    // 修改商品
    public function updateItem()
    {
        $res = $this->product->allowField(true)->save($_POST,['id' => $_POST['purchased_id']]);
        return $res;
    }

    // 商品图片上传
    public function uploadImg(Request $request){
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploadImg');
        $res = array();  //定义一个返回的数组
        if($info){
            $res['code']= 1;
            $res['msg'] = 'Upload picture success!';
            $res['savename'] = "uploadImg/".$info->getSaveName(); 
        }else{
            // 上传失败获取错误信息
            $res['code']= 0;
            $res['msg'] = 'Failed to upload!';
            $res['savename'] = ""; 
            $res['err'] = $file->getError();
        }
        return $res;
    }
    

   


}