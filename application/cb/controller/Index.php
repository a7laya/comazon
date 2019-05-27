<?php
namespace app\cb\controller;
use think\Controller;
use think\Request;
use think\Db;
use app\cb\model\Cs;
class Index extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->cs = new Cs;
    }

    public function index()
    {
        return view();
    }

    public function main()
    {
        return view();
    }
    public function p404()
    {
        return view();
    }
    

}