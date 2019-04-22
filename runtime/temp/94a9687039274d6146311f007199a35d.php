<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_in.html";i:1555922722;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1555921051;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <!-- <link rel="stylesheet" href="/static/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/main.css">
    <title>COMAZON</title>
</head>
<body>
    <div class="navbar navbar-default navbar-light">
        <div class="container">
            <div class="navbar-brand">COMAZON</div>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo url('index/index/index'); ?>">Home</a></li>
                <li><a href="<?php echo url('index/product/index'); ?>">Product</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo url('index/passport/signIn'); ?>">Sign in</a></li>
                <li><a href="<?php echo url('index/passport/signUp'); ?>">Sign up</a></li>
            </ul>
            <form action="#" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="product name or ASIN">
                </div>
                <button type="submit" class="btn btn-default">search</button>
            </form>

        </div>
    </div>

<div class="login-main">
    <header class="layui-elip">LOGIN</header>
    <form class="layui-form">
        <div class="layui-input-inline">
            <input type="text" name="account" required lay-verify="required" placeholder="Username / Email" autocomplete="off"
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
        <!--<div class="layui-input-inline">
                <button type="button" class="layui-btn layui-btn-primary">QQ登录</button>
            </div>
            <div class="layui-input-inline">
                <button type="button" class="layui-btn layui-btn-normal">微信登录</button>
            </div>-->
        <p><a href="register.html" class="fl">Sign up</a><a href="javascript:;" class="fr">Forget the password?</a></p>
    </form>
</div>

<script src="/static/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'layer', 'jquery'], function () {

        // 操作对象
        var form = layui.form;
        var $ = layui.jquery;
        form.on('submit(login)', function (data) {
            // console.log(data.field);
            $.ajax({
                url: 'login.php',
                data: data.field,
                dataType: 'text',
                type: 'post',
                success: function (data) {
                    if (data == '1') {
                        location.href = "../index.php";
                    } else {
                        layer.msg('登录名或密码错误');
                    }
                }
            })
            return false;
        })

    });
</script>