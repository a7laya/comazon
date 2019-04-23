<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"C:\Users\Administrator\Desktop\amazon_web\public/../application/admin\view\index\login.html";i:1556019252;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A7LAYA-CMS后台登录</title>
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<!-- load css --> 
	<link rel="stylesheet" type="text/css" href="/static/admin/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/admin/css/login.css" media="all">
</head>
<body>
<div class="layui-canvs"></div>
<link rel="stylesheet" href="/static/css/login.css">

<div class="login-main">
    <header class="layui-elip">Administrator Login</header>
    <form class="layui-form">
        <div class="layui-input-inline">
            <input type="text" name="account" required lay-verify="required" placeholder="Username" autocomplete="off"
                class="layui-input">
        </div>
        <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="Password" autocomplete="off"
                class="layui-input">
        </div>
        <div class="layui-input-inline login-btn">
            <button lay-submit lay-filter="login" class="layui-btn">Sign in</button>
        </div>
        <hr />
        <p><a href="signUp" class="fl">Sign up</a><a href="javascript:;" class="fr">Forget the password?</a></p>
    </form>
</div>
<script type="text/javascript" src="/static/admin/common/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript" src="/static/admin/js/login.js"></script>
<script type="text/javascript" src="/static/admin/jsplug/jparticle.jquery.js"></script>
<script type="text/javascript">
$(function(){
	$(".layui-canvs").jParticle({
		background: "#141414",
		color: "#E6E6E6"
	});
	//登录链接测试，使用时可删除
	$(".submit_btn").click(function(){
	  location.href="index.html";
	});
});
</script>
</body>
</html>