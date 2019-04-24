<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\phpworkspace\comazon\public/../application/admin\view\index\index.html";i:1556024704;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>A7LAYA-CMS后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="/static/admin/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/admin/common/global.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/admin/css/adminstyle.css" media="all">


</head>

<body>
	<div class="layui-layout layui-layout-admin" id="layui_layout">
		<!-- 顶部区域 -->
		<div class="layui-header header header-demo">
			<div class="layui-main">
				<!-- logo区域 -->
				<div class="admin-logo-box">
					<a class="logo" href="#" title="logo">管理系统</a>
				</div>
				<div class="larry-side-menu">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<!-- 顶级菜单区域 -->
				<div class="layui-larry-menu">
					<ul class="layui-nav clearfix">
						<li class="layui-nav-item">
							<a href="javascirpt:;"><i class="iconfont icon-weixin3"></i>业主档案管理</a>
						</li>
						<li class="layui-nav-item layui-this">
							<a href="javascirpt:;"><i class="iconfont icon-wangzhanguanli"></i>仪表全抄</a>
						</li>
						<li class="layui-nav-item">
							<a href="javascirpt:;"><i class="iconfont icon-wangzhanguanli"></i>仪表批抄</a>
						</li>
						<li class="layui-nav-item">
							<a href="javascirpt:;"><i class="iconfont icon-ht_expand"></i>仪表控制</a>
						</li>
					</ul>
				</div>
				<!-- 右侧导航 -->
				<ul class="layui-nav larry-header-item">
					<li class="layui-nav-item">
						A7LAYA
					</li>
					<li class="layui-nav-item">
						<a href="login.html">
							<i class="iconfont icon-exit"></i>
							退出</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 左侧侧边导航开始 -->
		<div class="layui-side layui-side-bg layui-larry-side" id="larry-side">
			<div class="layui-side-scroll" id="larry-nav-side" lay-filter="side">

				<!-- 左侧菜单 -->
				<ul class="layui-nav layui-nav-tree">
					<li class="layui-nav-item layui-this">
						<a href="javascript:;" data-url="404.html">
							<i class="iconfont icon-home1" data-icon='icon-home1'></i>
							<span>后台首页</span>
						</a>
					</li>
					<!-- 系统设置 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-jiaoseguanli"></i>
							<span>系统设置</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="personInfo.html">
									<i class="iconfont icon-geren1" data-icon='icon-geren1'></i>
									<span>管理员信息</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="changepwd.html">
									<i class="iconfont icon-iconfuzhi01" data-icon='icon-iconfuzhi01'></i>
									<span>修改密码</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="myloginfo.html">
									<i class="iconfont icon-piliangicon" data-icon='icon-piliangicon'></i>
									<span>日志信息</span>
								</a>
							</dd>
						</dl>
					</li>
					<!-- 业主档案 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-jiaoseguanli2"></i>
							<span>业主档案</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-yonghu1" data-icon='icon-yonghu1'></i>
									<span>片区管理</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-jiaoseguanli4" data-icon='icon-jiaoseguanli4'></i>
									<span>集中器设备</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-quanxian2" data-icon='icon-quanxian2'></i>
									<span>采集器设备</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-quanxian2" data-icon='icon-quanxian2'></i>
									<span>业主档案管理</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-quanxian2" data-icon='icon-quanxian2'></i>
									<span>业主换表</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-quanxian2" data-icon='icon-quanxian2'></i>
									<span>业主销表</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-quanxian2" data-icon='icon-quanxian2'></i>
									<span>档案导入/导出</span>
								</a>
							</dd>
						</dl>
					</li>
					<!-- 设备管理 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-wenzhang1"></i>
							<span>设备管理</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-lanmuguanli" data-icon='icon-lanmuguanli'></i>
									<span>仪表全抄</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-wenzhang2" data-icon='icon-wenzhang2'></i>
									<span>仪表批抄</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-icon1" data-icon='icon-icon1'></i>
									<span>仪表控制</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-word" data-icon='icon-word'></i>
									<span>设备参数设置</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-pinglun1" data-icon='icon-pinglun1'></i>
									<span>定时任务设置</span>
								</a>
							</dd>


						</dl>
					</li>

					<!-- 手工抄表 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-m-members"></i>
							<span>手工抄表</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>抄表员管理</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>抄表册管理</span>
								</a>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>手工录入</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>人工抄表数据导入</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>下载手持机档案</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="404.html">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>手持机上传数据</span>
								</a>
							</dd>
						</dl>
					</li>

					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-shengchengbaogao"></i>
							<span>结算数据</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-zhuti" data-icon='icon-zhuti'></i>
									<span>数据结算</span>
								</a>
							</dd>
							<dd>
								<a href="">
									<i class="iconfont icon-database" data-icon='icon-database'></i>
									<span>结算数据更正</span>
								</a>
							</dd>
							<dd>
								<a href="">
									<i class="iconfont icon-shengchengbaogao" data-icon='icon-shengchengbaogao'></i>
									<span>下载手持机档案</span>
								</a>
							</dd>
							<dd>
								<a href="">
									<i class="iconfont icon-qingchuhuancun" data-icon='icon-qingchuhuancun'></i>
									<span>获取手持机数据</span>
								</a>
							</dd>

						</dl>
					</li>

					<!-- 系统设置 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-piliangicon"></i>
							<span>数据查询</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-zhandianpeizhi" data-icon='icon-zhandianpeizhi'></i>
									<span>业主仪表查询</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-zhandianguanli1" data-icon='icon-zhandianguanli1'></i>
									<span>集中器/采集器查询</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-anquanshezhi" data-icon='icon-anquanshezhi'></i>
									<span>抄表数据查询</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-sms" data-icon='icon-sms'></i>
									<span>流量计数据查询</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class="iconfont icon-iconfuzhi01" data-icon='icon-iconfuzhi01'></i>
									<span>未抄回用户查询</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class='iconfont icon-SQLServershujuku' data-icon='icon-SQLServershujuku'></i>
									<span>用量查询</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;">
									<i class='iconfont icon-xinxicaiji' data-icon='icon-xinxicaiji'></i>
									<span>动阀记录查询</span>
								</a>
							</dd>
						</dl>
					</li>
					<!-- 统计分析 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-piliangicon"></i>
							<span>统计分析</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							
							<dd>
								<a href="javascript:;">
									<i class='iconfont icon-xinxicaiji' data-icon='icon-xinxicaiji'></i>
									<span>用量统计</span>
								</a>
							</dd>
						</dl>
					</li>
					
				</ul>
			</div>
		</div>

		<!-- 左侧侧边导航结束 -->
		<!-- 右侧主体内容 -->
		<div class="layui-body" id="larry-body" style="bottom: 0;border-left: solid 2px #2299ee;">
			<div class="layui-tab layui-tab-card larry-tab-box" id="larry-tab" lay-filter="demo" lay-allowclose="true">
				<div class="go-left key-press pressKey" id="titleLeft" title="滚动至最右侧"><i
						class="larry-icon larry-weibiaoti6-copy"></i> </div>
				<ul class="layui-tab-title">
					<li class="layui-this" id="admin-home"><i class="iconfont icon-diannao1"></i><em>后台首页</em></li>
				</ul>
				<div class="go-right key-press pressKey" id="titleRight" title="滚动至最左侧"><i
						class="larry-icon larry-right"></i></div>
				<ul class="layui-nav closeBox">
					<li class="layui-nav-item">
						<a href="javascript:;"><i class="iconfont icon-caozuo"></i> 页面操作</a>
						<dl class="layui-nav-child">
							<dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">&#x1002;</i> 刷新当前</a>
							</dd>
							<dd><a href="javascript:;" class="closePageOther"><i class="iconfont icon-prohibit"></i> 关闭其他</a>
							</dd>
							<dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-guanbi"></i> 关闭全部</a></dd>
						</dl>
					</li>
				</ul>
				<div class="layui-tab-content" style="min-height: 150px; ">
					<div class="layui-tab-item layui-show">
						<iframe class="larry-iframe" data-id='0' src="admin/index/main" style="height:1200px"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- 底部区域 -->
		<div class="layui-footer layui-larry-foot" id="larry-footer">
			<div class="layui-mian">
				<p class="p-admin">
					<span>2019 &copy;</span>
					XXXX公司,版权所有
				</p>
			</div>
		</div>
	</div>
	<!-- 加载js文件-->
	<script type="text/javascript" src="/static/admin/common/layui/layui.js"></script>
	<script type="text/javascript" src="/static/admin/js/larry.js"></script>
	<script type="text/javascript" src="/static/admin/js/index.js"></script>
	<!-- 锁屏 -->
	<div class="lock-screen" style="display: none;">
		<div id="locker" class="lock-wrapper">
			<div id="time"></div>
			<div class="lock-box center">
				<img src="images/userimg.jpg" alt="">
				<h1>admin</h1>
				<duv class="form-group col-lg-12">
					<input type="password" placeholder='锁屏状态，请输入密码解锁' id="lock_password" class="form-control lock-input"
						autofocus name="lock_password">
					<button id="unlock" class="btn btn-lock">解锁</button>
				</duv>
			</div>
		</div>
	</div>

</body>

</html>