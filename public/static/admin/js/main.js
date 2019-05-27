/*
* @Author: A7LAYA
* @Date:   2016-12-15 17:20:54
* @Last Modified by:   qinsh
* @Last Modified time: 2016-12-24 21:51:08
* +----------------------------------------------------------------------
* | A7LAYABlogCMS [ A7LAYA-CMS网站内容管理系统 ]
* | Copyright (c) 2016-2018 http://www.larrycms.com All rights reserved.
* | Licensed ( http://www.larrycms.com/licenses/ )
* | Author: qinshouwei <313492783@qq.com>
* +----------------------------------------------------------------------
*/
var myChart = echarts.init(document.getElementById('larry-seo-stats'));
option = {
    title : {
        text: '表状态统计',
        subtext: '虚拟数据',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        // orient: 'horizonta',
        orient: 'horizontal',
        show: true,
        type: 'plain',
        itemGap: 10,
        bottom: '5%',
        data: ['未抄回','通讯异常','阀门异常','欠压','其他']
    },
    series : [
        {
            name: '表状态统计',
            type: 'pie',
            radius : '55%',
            center: ['50%', '50%'],
            data:[
                {value:335, name:'未抄回'},
                {value:310, name:'通讯异常'},
                {value:234, name:'阀门异常'},
                {value:135, name:'欠压'},
                {value:1548, name:'其他'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
myChart.setOption(option);
