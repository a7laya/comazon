<?php
namespace app\index\controller;

class Products extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        
    }

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
        return  $this->fetch();
    }




}