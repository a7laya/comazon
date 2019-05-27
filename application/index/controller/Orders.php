<?php
namespace app\index\controller;
use think\Request;
// use think\Db;
use app\index\model\Product;
use app\index\model\User;
use app\index\model\Vpurchased;
use app\index\model\Purchased;
use app\index\model\Limit;
class Orders extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->product = new Product;
        $this->user = new User;
        $this->limit = new Limit; // 购买限制
        $this->purchased = new Purchased; // 表用于写入和删除
        $this->vpurchased = new Vpurchased; // 视图

        // 获取购买限制数量 type:int
        $this->day_limit = $this->limit->getLimit('day');
        $this->week_limit = $this->limit->getLimit('week');

        // 是否开启不能重复购买同一商品的限制 type:varchar 'on'|''
        $this->no_repeat = $this->limit->getLimit('no_repeat');

        // n天内不能购买同一家店铺商品 type:int
        $this->no_repeat_seller = $this->limit->getLimit('no_repeat_seller');

        // 获取已购买数量 type:int
        $this->day_count = count($this->vpurchased->dayPurchase());
        $this->week_count = count($this->vpurchased->weekPurchase());

        // 判断是否登录，没有登录则进不了控制器下的页面
        if(!$this->shop_user){return $this->redirect('index/passport/signIn');}
    }

    // 页面-下单前的用户资料详情
    public function purchaseDetail()
    {   
        $username = $this->shop_user['username'];
        $res = $this->user->where(['username'=>$username])->find();
        $res['product_id'] = $_GET['product_id'];
        $this->assign('data', $res);
        return view();
    }

    // 接口-添加已购
    public function addPurchased()
    {   // $data:['product_id', 'user_id', 'username', 'address', 'paypal', 'save_default']
        $data = input();
        $product = Product::get($data['product_id']);

        // 检查是否要把传过来的地址和贝宝设置为默认
        if(isset($data['save_default'])){
            $this->user->allowField(['address','paypal'])->save($data,['id' => $data['user_id']]);
        }

        // 返回信息
        $res = ['code' => 0, 'msg' => ''];

        // 1.判断本周购买次数是否已用完
        if($this->week_count >= $this->week_limit) {
            $res['msg'] = 'Only '.(string)$this->week_limit.' item(s) can be purchased this week.';
            return $res;
        }

        // 2.判断日购买是否超标
        if($this->day_count >= $this->day_limit) {
            $res['msg'] = 'Only '.(string)$this->day_limit.' item(s) can be purchased today.';
            return $res;
        }

        // 3.判断N天内同一家店铺购买量是否超标
        $repeat = $this->vpurchased->where(['seller_id'=>$product->seller_id])
                        ->whereTime('ts','>','-'.$this->no_repeat_seller.' days')
                        ->find();
        if($repeat) {
            $res['msg'] = 'You can only buy this store once in '.(string)$this->no_repeat_seller.' days.';
            return $res;
        } 

        // 4.判断商品库存
        $quantity = $this->product->where('product_id', $data['product_id'])->value('quantity');
        if($quantity == 0) {
            $res['msg'] = 'This item is out of stock.';
            return $res;
        }
        
        // 符合购买条件，加入我的订单
        $res = $this->purchased->add($data);
        if($res['code']){
            // 设置库存减1
            $this->product->where('product_id', $data['product_id'])->setDec('quantity');
        }
        return $res;
        
    }

    // 接口-移除已购
    public function removePurchased()
    {   
        // $data:['username'=>xxxx, 'purchased_id'=>12]
        $data = input();
        $product_id = $this->purchased->where('purchased_id', $data['purchased_id'])->value('product_id');
        if($this->purchased->remove($data)){
            // 取消订单后，商品库存加1
            $this->product->where('product_id', $product_id)->setInc('quantity');
            return 1; // 存在返回 1
        } else {
            return 0; // 不存在返回 0
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
        return  view();
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
    


}