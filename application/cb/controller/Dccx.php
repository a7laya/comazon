<?php
namespace app\cb\controller;
use think\Controller;
use think\Request;
use think\Db;
use app\cb\model\DcData;
// 查询出来每个设备的累计值存在DcDataDayTemp这个临时表里面
use app\cb\model\DcDataDayTemp;
// 查询出来每个设备的历年来每月累计值存在DcDataMonth里面(每月更新1次)
use app\cb\model\DcDataMonth;
 
class Dccx extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->dc = new DcData;
        $this->temp = new DcDataDayTemp;
        $this->month = new DcDataMonth;
    }
 
    


    // 页面 - 水表每月累积量查询
    public function dcListMonth(){
        return  view();
    }

    // 接口 - 水表每月累积量数据表格
    public function tableDataMonth()
    {   
        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->month->tableData($data);
    }

    // 页面 - 水表累积量查询列表
    public function dcList(){
        return  view();
    }


    // 接口 - 水表列表数据表格
    public function tableData()
    {   
        
        if(isset(input()['date1']) && isset(input()['date2'])){
            // 起始日期
            $date1 = input('date1');
            
            // 截止日期
            $date2 = input('date2');
            
            
            // $dcList是一个二维数组，通过group()获取所有设备标识
            $dcList = Db::table('cb_dc_data_day')
                    ->field('NAME')
                    ->group('NAME')
                    ->select();
            
            // 清空数据
            $this->temp->where('1=1')->delete();

            // 遍历所有设备在查询时间区间内的累计值，
            // 单个设备累计值通过存储过程dc_data_tj来查询
            foreach($dcList as $item) {

                // echo $item['NAME'].'<br>';

                $res = Db::query("call dc_data_tj(:date1,:date2,:name);",['date1'=>$date1,'date2'=>$date2,'name'=>$item['NAME']]);
                
                // var_dump($res[0][0]);

                // 组合一个$data_temp数组 写进临时表里 方便分页浏览和查询
                $data_temp['NAME']  = $res[0][0]['NAME_A'];
                $data_temp['ftotal'] = $res[0][0]['ftotal'];
                $data_temp['rtotal'] = $res[0][0]['rtotal'];
                $count = $this->temp->insert($data_temp);
            }
        }

        // $data: ['limit'=>10, 'page'=>1]
        $data = input();
        // $data['search_str'] = $search_str;
        return $this->temp->tableData($data);
    }





    // 水表图片上传
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