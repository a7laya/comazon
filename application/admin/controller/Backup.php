<?php
namespace app\admin\controller;
class Backup extends Base
{
    public function _initialize()
    {  
       parent::_initialize();
       // 权限控制-未登陆不给看
       if (!$this->session_admin){return $this->redirect('admin/passport/login');}
    }

    //数据库备份
    public function index()
    {   
        //获取操作内容：（备份/下载/还原/删除）数据库
        $type=input('type');
        //获取需要操作的数据库名字
        $name=input('name');
        $backup = new \org\Baksql(\think\Config::get("database"));
        switch ($type) {
        //备份
        case "backup":
            $info = $backup->backup();
            $this->success("$info", 'admin/backup/index');
            break;
        //下载
        case "dowonload":
            $info = $backup->downloadFile($name);
            $this->success("$info", 'admin/backup/index');
            break;
        //还原
        case "restore":
            $info = $backup->restore($name);
            $this->success("$info", 'admin/backup/index');
            break;
        //删除
        case "del":
            $info = $backup->delfilename($name);
            $this->success("$info", 'admin/backup/index');
            break;
        //如果没有操作，则查询已备份的所有数据库信息
        default:
             return $this->fetch("index", ["list" => array_reverse($backup->get_filelist())]);//将信息由新到老排序
        }
    
    }

    public function bak()
    {
        echo '来了老弟';
    }
}