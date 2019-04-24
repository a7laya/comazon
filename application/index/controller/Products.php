<?php
namespace app\index\controller;

class Products extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        
    }

    public function productsList(){
        // 模板输出
        return  $this->fetch();
    }


}