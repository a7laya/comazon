<<<<<<< HEAD
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_in.html";i:1556096292;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1558011327;}*/ ?>
=======
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_in.html";i:1556089449;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1556066867;}*/ ?>
>>>>>>> 3f8da86ad8fc48bf634c52042b5fc8b42ad19f33
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <!-- <link rel="stylesheet" href="/static/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/static/admin/common/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/static/css/main.css">
    <title>COMAZON</title>
</head>
<body>
    <div class="navbar navbar-default navbar-light">
        <div class="container">
            <div class="navbar-brand">COMAZON</div>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo url('index/index/index'); ?>">Home</a></li>
                <li><a href="<?php echo url('index/products/productsList'); ?>">Products</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                

                <?php if(($shop_user == null)): ?> 
                <li><a href="<?php echo url('index/passport/signIn'); ?>">Sign in</a></li>
                <li><a href="<?php echo url('index/passport/signUp'); ?>">Sign up</a></li>
                <?php else: ?> 
                <li id="username"><a href="<?php echo url('index/user/index'); ?>"><?php echo $shop_user['username']; ?></a></li>
                <li><a href="<?php echo url('index/passport/logout'); ?>">Logout</a></li>
                <?php endif; ?>
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
        <p><a href="signUp" class="fl">Sign up</a><a href="javascript:;" class="fr">Forget the password?</a></p>
    </form>
</div>

<script src="/static/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'layer', 'jquery'], function () {

        // 操作对象
        var form = layui.form;
        var $ = layui.jquery;
        form.on('submit(login)', function (data) {
            console.log('data.field: ',data.field);
            $.ajax({
                url: 'signIn',
                data: data.field,
                dataType: 'text',
                type: 'post',
                success: function (data) {
                    console.log('data :', data);
                    if (data == 1) {
                        layer.msg('Verification passed!');
                        location.href = "<?php echo url('index/index/index'); ?>";
                    } else {
                        layer.msg('Account or password error!');
                    }
                }
            })
            return false;
        })

    });
</script>