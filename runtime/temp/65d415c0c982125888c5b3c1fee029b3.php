<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_up.html";i:1555923193;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1555921051;}*/ ?>
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
    <header class="layui-elip" style="width: 82%">Create your account</header>

    <!-- 表单选项 -->
    <form class="layui-form">
        <div class="layui-input-inline">
            <!-- 用户名 -->
            <div class="layui-inline" style="width: 85%">
                <input type="text" id="user" name="account" required lay-verify="required" placeholder="请输入用户名"
                    autocomplete="off" class="layui-input">
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon" id="ri" style="color: green;font-weight: bolder;" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon" id="wr" style="color: red; font-weight: bolder;" hidden>ဆ</i>
            </div>
        </div>
        <!-- 密码 -->
        <div class="layui-input-inline">
            <div class="layui-inline" style="width: 85%">
                <input type="password" id="pwd" name="password" required lay-verify="required" placeholder="请输入密码"
                    autocomplete="off" class="layui-input">
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon" id="pri" style="color: green;font-weight: bolder;" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon" id="pwr" style="color: red; font-weight: bolder;" hidden>ဆ</i>
            </div>
        </div>
        <!-- 确认密码 -->
        <div class="layui-input-inline">
            <div class="layui-inline" style="width: 85%">
                <input type="password" id="rpwd" name="repassword" required lay-verify="required" placeholder="请确认密码"
                    autocomplete="off" class="layui-input">
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon" id="rpri" style="color: green;font-weight: bolder;" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon" id="rpwr" style="color: red; font-weight: bolder;" hidden>ဆ</i>
            </div>
        </div>


        <div class="layui-input-inline login-btn" style="width: 85%">
            <button type="submit" lay-submit lay-filter="sub" class="layui-btn">注册</button>
        </div>
        <hr style="width: 85%" />
        <p style="width: 85%"><a href="login.html" class="fl">已有账号？立即登录</a><a href="javascript:;" class="fr">忘记密码？</a>
        </p>
    </form>
</div>


<script src="../frame/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'jquery', 'layer'], function () {
        var form = layui.form;
        var $ = layui.jquery;
        var layer = layui.layer;
        //添加表单失焦事件
        //验证表单
        $('#user').blur(function () {
            var user = $(this).val();

            //alert(user);
            $.ajax({
                url: 'checkUser.php',
                type: 'post',
                dataType: 'text',
                data: {
                    user: user
                },
                //验证用户名是否可用
                success: function (data) {
                    if (data == 1) {
                        $('#ri').removeAttr('hidden');
                        $('#wr').attr('hidden', 'hidden');


                    } else {
                        $('#wr').removeAttr('hidden');
                        $('#ri').attr('hidden', 'hidden');
                        layer.msg('当前用户名已被占用! ')

                    }

                }
            })

        });

        // you code ...
        // 为密码添加正则验证
        $('#pwd').blur(function () {
            var reg = /^[\w]{6,12}$/;
            if (!($('#pwd').val().match(reg))) {
                //layer.msg('请输入合法密码');
                $('#pwr').removeAttr('hidden');
                $('#pri').attr('hidden', 'hidden');
                layer.msg('请输入合法密码');
            } else {
                $('#pri').removeAttr('hidden');
                $('#pwr').attr('hidden', 'hidden');
            }
        });

        //验证两次密码是否一致
        $('#rpwd').blur(function () {
            if ($('#pwd').val() != $('#rpwd').val()) {
                $('#rpwr').removeAttr('hidden');
                $('#rpri').attr('hidden', 'hidden');
                layer.msg('两次输入密码不一致!');
            } else {
                $('#rpri').removeAttr('hidden');
                $('#rpwr').attr('hidden', 'hidden');
            };
        });

        //
        //添加表单监听事件,提交注册信息
        form.on('submit(sub)', function () {
            $.ajax({
                url: 'reg.php',
                type: 'post',
                dataType: 'text',
                data: {
                    user: $('#user').val(),
                    pwd: $('#pwd').val(),
                },
                success: function (data) {
                    if (data == 1) {
                        layer.msg('注册成功');
                        ///location.href = "login.html";
                    } else {
                        layer.msg('注册失败');
                    }
                }
            })
            //防止页面跳转
            return false;
        });

    });
</script>
