<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_up.html";i:1555979120;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1556008282;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <!-- <link rel="stylesheet" href="/static/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
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
                <li><a href="<?php echo url('index/passport/logout'); ?>"><?php echo $shop_user; ?>Logout</a></li>
            </ul>
            <form action="#" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="product name or ASIN">
                </div>
                <button type="submit" class="btn btn-default">search</button>
            </form>

        </div>
    </div>
<link rel="stylesheet" href="/static/css/login.css">

<div class="login-main">
    <header class="layui-elip" style="width: 82%">Create your account</header>
    <!-- 表单选项 -->
    <form class="layui-form">
        <div class="layui-input-inline">
            <!-- 用户名 -->
            <div class="layui-inline" style="width: 85%">
                <input type="text" id="user" name="username" required lay-verify="required" placeholder="username"
                    autocomplete="off" class="layui-input">
            </div>
            <!-- loading -->
            <div class="layui-inline">
                <i class="layui-icon loading" id="loading" hidden></i>
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon ri" id="ri" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon wr" id="wr" hidden>ဆ</i>
            </div>
        </div>
        <div class="layui-input-inline">
            <!-- 邮箱 -->
            <div class="layui-inline" style="width: 85%">
                <input type="text" id="email" name="email" required lay-verify="required" placeholder="email"
                    autocomplete="off" class="layui-input">
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon ri" id="e-ri" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon wr" id="e-wr" hidden>ဆ</i>
            </div>
        </div>
        <!-- 密码 -->
        <div class="layui-input-inline">
            <div class="layui-inline" style="width: 85%">
                <input type="password" id="pwd" name="password" required lay-verify="required" placeholder="password"
                    autocomplete="off" class="layui-input">
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon ri" id="pri" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon wr" id="pwr" hidden>ဆ</i>
            </div>
        </div>
        <!-- 确认密码 -->
        <div class="layui-input-inline">
            <div class="layui-inline" style="width: 85%">
                <input type="password" id="rpwd" name="repassword" required lay-verify="required"
                    placeholder="Please confirm your password" autocomplete="off" class="layui-input">
            </div>
            <!-- 对号 -->
            <div class="layui-inline">
                <i class="layui-icon ri" id="rpri" hidden></i>
            </div>
            <!-- 错号 -->
            <div class="layui-inline">
                <i class="layui-icon wr" id="rpwr" hidden>ဆ</i>
            </div>
        </div>


        <div class="layui-input-inline login-btn" style="width: 85%">
            <button type="submit" lay-submit lay-filter="sub" class="layui-btn">Sign in</button>
        </div>
        <hr style="width: 85%" />
        <p style="width: 85%"><a href="signIn" class="fl">Login immediately</a><a href="javascript:;" class="fr">Forget
                password</a>
        </p>
    </form>
</div>


<script src="/static/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'jquery', 'layer'], function () {
        var form = layui.form;
        var $ = layui.jquery;
        var layer = layui.layer;
        //添加表单失焦事件
        //验证表单
        $('#user').blur(function () {
            var user = $(this).val();
            var re = /^[a-zA-Z][a-zA-Z0-9]{2,15}$/;
            // 先进行前端正则验证用户名格式是否正确，
            // 如果格式正确则发送到后端验证是否可用
            if (re.test(user)) {
                $.ajax({
                    url: '<?php echo url("index/passport/checkUsername"); ?>',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        username: user
                    },
                    //验证用户名是否可用
                    success: function (data) {
                        if (data == 0) {
                            $('#ri').removeAttr('hidden');
                            $('#wr').attr('hidden', 'hidden');


                        } else {
                            $('#wr').removeAttr('hidden');
                            $('#ri').attr('hidden', 'hidden');
                            layer.msg('The current username has been occupied!')

                        }

                    }
                })
            } else {
                $('#wr').removeAttr('hidden');
                $('#ri').attr('hidden', 'hidden');
                layer.msg('Username must be 3-16 letters and numbers, beginning with letters! ')
            }



        });
        $('#email').blur(function () {
            var email = $(this).val();
            var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
            // 先进行前端正则验证邮箱格式是否正确，
            // 如果格式正确则发送到后端验证是否可用
            if (re.test(email)) {
                $.ajax({
                    url: '<?php echo url("index/passport/checkEmail"); ?>',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        email: email
                    },
                    //验证邮箱是否可用
                    success: function (data) {
                        console.log('email-data :', data);
                        if (data == 0) {
                            $('#e-ri').removeAttr('hidden');
                            $('#e-wr').attr('hidden', 'hidden');
                        } else {
                            $('#e-wr').removeAttr('hidden');
                            $('#e-ri').attr('hidden', 'hidden');
                            layer.msg('The current emailname has been occupied!')

                        }

                    }
                })
            } else {
                $('#e-wr').removeAttr('hidden');
                $('#e-ri').attr('hidden', 'hidden');
                layer.msg('The email format is incorrect! ')
            }



        });

        // you code ...
        // 为密码添加正则验证
        $('#pwd').blur(function () {
            var reg = /^[\w]{6,12}$/;
            if (!($('#pwd').val().match(reg))) {
                //layer.msg('请输入合法密码');
                $('#pwr').removeAttr('hidden');
                $('#pri').attr('hidden', 'hidden');
                layer.msg('Password must be 6-12 letters and numbers, not null!');
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
                layer.msg('Two inconsistent passwords!');
            } else {
                $('#rpri').removeAttr('hidden');
                $('#rpwr').attr('hidden', 'hidden');
            };
        });

        //
        //添加表单监听事件,提交注册信息
        form.on('submit(sub)', function () {
            $.ajax({
                url: 'signUpRes',
                type: 'post',
                dataType: 'text',
                data: {
                    username: $('#user').val(),
                    email: $('#email').val(),
                    password: $('#pwd').val(),
                },
                success: function (data) {
                    console.log('submit-data.status :', data);
                    if (data == 1) {
                        layer.open({
                            content: 'Registration succeed',
                            yes: function (index, layero) {
                                //do something
                                layer.close(index); //如果设定了yes回调，需进行手工关闭
                                location.href = "signIn";
                            }
                        });
                        // layer.msg('Registration succeed');
                        
                    } else {
                        layer.msg('Registration failed');
                    }
                }
            })
            //防止页面跳转
            return false;
        });

    });
</script>