<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"C:\Users\Administrator\Desktop\amazon_web\public/../application/admin\view\index\main.html";i:1555662336;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A7LAYABlogCMS-Home</title>
  <meta name="renderer" content="webkit"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
  <meta name="apple-mobile-web-app-capable" content="yes">  
  <meta name="format-detection" content="telephone=no"> 
	<link rel="stylesheet" type="text/css" href="/static/admin/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/admin/common/bootstrap/css/bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/admin/common/global.css">
	<link rel="stylesheet" type="text/css" href="/static/admin/css/main.css" media="all">
</head>
<body>
<section class="larry-wrapper">
    <!-- overview -->
	<div class="row state-overview">
		<div class="col-lg-3 col-sm-6 layui-anim layui-anim-up">
			<section class="panel">
				<div class="symbol userblue layui-anim layui-anim-rotate"> <i class="iconpx-users"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count1">999</h1>
					</a>
					<p>总用户</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6 layui-anim layui-anim-up">
			<section class="panel">
				<div class="symbol commred layui-anim layui-anim-rotate"> <i class="iconpx-user-add"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count2">999</h1>
					</a>
					<p>总表数</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6 layui-anim layui-anim-up">
			<section class="panel">
				<div class="symbol articlegreen layui-anim layui-anim-rotate">
					<i class="iconpx-file-word-o"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count3">50</h1>
					</a>
					<p>已抄</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6 layui-anim layui-anim-up">
			<section class="panel">
				<div class="symbol rsswet layui-anim layui-anim-rotate">
					<i class="iconpx-check-circle"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count4">0</h1>
					</a>
					<p>未抄</p>
				</div>
			</section>
		</div>
	</div>
	<!-- overview end -->
	<div class="row">
		<div class="col-lg-6">
			
      <!-- 网站信息统计｛SEO数据统计｝ -->
      <section class="panel">
                  <header class="panel-heading bm0">
                       <span class='span-title'>表状态统计</span>
                       <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                  </header>
                  <div class="panel-body laery-seo-box">
                        <div class="larry-seo-stats" id="larry-seo-stats"></div>
                  </div>
      </section>
		</div>
		<div class="col-lg-6">
		     <!-- 快捷操作 -->
             <section class="panel">
                  <header class="panel-heading bm0">
                        <span class='span-title'>快捷操作</span>
                        <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                  </header>
                  <div class="panel-body">
                        <table class="table table-hover personal-task shortcut">
                            <tr>
                            	<td>
                            		<div class="c1">1</div>
                            		<div class="c2">2</div>
                            		<br>
                            	</td>
                            </tr>
                        </table>
                  </div>
             </section>
          <!-- 系统公告 -->
             <section class="panel">
                 <header class="panel-heading bm0">
                        <span class='span-title'>系统公告</span>
                        <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                  </header>
                  <div class="panel-body">
                        <table class="table table-hover personal-task shortcut">
                            <tr>
                              <td>
                                <div class="c1">1</div>
                                <div class="c2">2</div>
                                <br>
                              </td>
                            </tr>
                        </table>
                  </div>
             </section>

              
		</div>
	</div>

</section>

<script type="text/javascript" src="common/layui/layui.js"></script>
<script type="text/javascript">
	layui.use(['jquery','layer','element'],function(){
		window.jQuery = window.$ = layui.jquery;
		window.layer = layui.layer;
        window.element = layui.element();

       $('.panel .tools .iconpx-chevron-down').click(function(){
       	   var el = $(this).parents(".panel").children(".panel-body");
       	   if($(this).hasClass("iconpx-chevron-down")){
       	   	   $(this).removeClass("iconpx-chevron-down").addClass("iconpx-chevron-up");
       	   	   el.slideUp(200);
       	   }else{
       	   	   $(this).removeClass("iconpx-chevron-up").addClass("iconpx-chevron-down");
       	   	   el.slideDown(200);
       	   }
       })

	});
</script>
<script type="text/javascript" src="/static/admin/jsplug/echarts.min.js"></script>
<script type="text/javascript" src="/static/admin/js/main.js"></script>
</body>
</html>