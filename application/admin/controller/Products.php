<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use app\index\model\Product;
use app\index\model\Vproduct;
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
        $this->product = new Product; // 表用于写入和删除
        $this->vproduct = new VProduct; // 视图 - 用于查询
        $this->mark = new Mark;
        $this->purchased = new Purchased; // 表用于写入和删除
        $this->vpurchased = new Vpurchased; // 视图
        // 权限控制-未登陆不给看
        if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }


    // 页面 - 添加商品页
    public function productsAdd(){

        // 发送店铺列表
        $sellers = new Seller();
        $res     = $sellers->select();
        $this->assign('sellers', $res);

        // 模板输出
        return  $this->fetch();
    }
    // 页面 - 编辑商品页
    public function productsEdit(){

        // 发送店铺列表
        $sellers = new Seller();
        $res     = $sellers->select();
        $this->assign('sellers', $res);

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
    // 页面 - 商品列表页
    public function productsList(){
        // 模板输出
        return  $this->fetch();
    }
    // 页面 - 商品回收站
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
        return $this->vproduct->tableData($data);
    }

    // 接口 - 商品列表数据表格
    public function tableDataRestore()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->vproduct->tableDataRestore($data);
    }

    // 接口 - 删除商品（支持批量操作）
    public function delProduct()
    {   
        $data = $_POST['product_id'];
        $count = Product::destroy($data);
        return $count;
    }

    // 接口 - 还原商品（支持批量操作）
    public function restoreProduct()
    {   
        // 软删除的恢复 用模型的restore方法，传递的是一个where数组
        
        // 将传递过来的字符串分割成数组
        $ids = explode(",", $_POST['product_id']);
        $count = 0;
        foreach($ids as $id){
            $res = $this->vproduct->restore(['product_id' => $id]);
            $count ++;
        }
        return $count;
        
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

    // 接口 - 添加商品
    public function addItem()
    {   
        $_POST['create_time'] = date('Y-m-d H:i:s');
        $code = $this->product->allowField(true)->save($_POST);
        $msg = $code ? 'Added successfully！' : 'Add failed.';
        return ['code'=>$code,'msg'=> $msg];
    }
    // 接口 - 修改商品
    public function editItem()
    {
        $code = $this->product->allowField(true)->save($_POST,['id' => $_POST['product_id']]);
        $msg = $code ? 'Updated successfully！' : 'Update failed.';
        return ['code'=>$code,'msg'=> $msg];
    }


    // 接口 - 删除指定图片

    public function delImg()
    {   
        $path = input()['path'];
        $filename = ROOT_PATH . 'public' . DS . 'static' . DS . $path;
        if(file_exists($filename)){
            unlink($filename);
            return ['code'=>1,'msg'=>'Successful deletion of picture.'];
        }else{
            return ['code'=>0,'msg'=>'Delete picture failed.'];
        }
    }

    // 接口 - 商品图片上传
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