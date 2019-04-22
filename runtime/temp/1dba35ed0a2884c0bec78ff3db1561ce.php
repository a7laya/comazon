<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:100:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_up_res.html";i:1555908930;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1555902821;}*/ ?>
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
            </ul>
            <form action="#" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="product name or ASIN">
                </div>
                <button type="submit" class="btn btn-default">search</button>
            </form>

        </div>
    </div>

<div class="container">
    <span id="msg" style="font-size: 22px; color:cornsilk">
        
    </span>
</div>
</body>
<script src="/static/js/jquery.min.js"></script>
<script>
    function reurl() {
        if ("<?php echo $status; ?>" == 1) {
            window.location = "<?php echo url('index/index/index'); ?>";
        } else {
            window.history.go(-1);
        }
    }
    setTimeout(reurl, 3000);
    $(function () {
        if ("<?php echo $status; ?>" == 1) {
            $('#msg').text(
                '<?php echo $post; ?>,Congratulations on your successful registration. You are turning to the home page.'
                )
        } else {
            $('#msg').text('<?php echo $post; ?>,Please re-registe')
        }

    })
</script>

</html>