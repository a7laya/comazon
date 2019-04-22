<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_in.html";i:1555832140;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1555203361;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            </ul>
            <form action="#" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="product name or ASIN">
                </div>
                <button type="submit" class="btn btn-default">search</button>
            </form>

        </div>
    </div>
    <div class="container container-body">

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h2>Sign in</h2>
            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam consectetur saepe aut, ullam fuga
                nesciunt, tenetur vitae aspernatur blanditiis labore quam tempore debitis assumenda id</h4>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="panel panel-sign">
                <form id="login-form" action="">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" name="User[username]" class="form-control" placeholder="Input your email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="User[password]" class="form-control">
                    </div>
                    <div class="form-group">
                        <button id="btn-submit" type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/layer.js"></script>
    <script src="/static/js/jquery.form.min.js"></script>
    <script>
        $(function () {
            // 表单提交
            var $form = $('#login-form');
            $form.submit(function () {
                var $btn_submit = $('#btn-submit');
                $btn_submit.attr("disabled", true);
                $form.ajaxSubmit({
                    type: "post",
                    dataType: "json",
                    // url: '',
                    success: function (result) {
                        $btn_submit.attr('disabled', false);
                        if (result.code === 1) {
                            layer.msg(result.msg, {time: 1500, anim: 1}, function () {
                                window.location = result.url;
                            });
                            return true;
                        }
                        layer.msg(result.msg, {time: 1500, anim: 6});
                    }
                });
                return false;
            });
        });
    </script>