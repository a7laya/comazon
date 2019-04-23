<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\index\index.html";i:1555202805;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1556005784;}*/ ?>
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
                <li><a href="<?php echo url('index/passport/logout'); ?>">Logout</a></li>
            </ul>
            <form action="#" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="product name or ASIN">
                </div>
                <button type="submit" class="btn btn-default">search</button>
            </form>

        </div>
    </div>
    <div class="container index">
        <div class="col-md-1"></div>
        <div class="col-md-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto vero qui quae perferendis
            dolorem, praesentium dignissimos nemo nobis aliquam laudantium cupiditate magnam sint quasi illum? Illo, autem.
            Cumque, mollitia rem?</div>
        <div class="col-md-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt, voluptatum veritatis
            dolores eligendi quo quod rem veniam soluta, perferendis molestiae animi nostrum atque reiciendis rerum, aperiam
            necessitatibus! Inventore, suscipit aliquid.</div>
        <div class="col-md-1"></div>
    </div>
</body>

</html>