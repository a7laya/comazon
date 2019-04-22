<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\passport\sign_up.html";i:1555903671;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1555902821;}*/ ?>
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

<div class="container container-body">

    <div class="col-md-1"></div>
    <div class="col-md-5">
        <h2>Create your personal account</h2>
        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam consectetur saepe aut, ullam fuga
            nesciunt, tenetur vitae aspernatur blanditiis labore quam tempore debitis assumenda id</h4>

    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <div class="panel panel-sign">
            <form action="signUpRes" onsubmit="return sb1();">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Input your username"
                        id="username">
                    <div class="verify-info username chk_rule">
                        4-16 letters and numbers, beginning with letters.
                    </div>
                    <div class="verify-info username chk_exist" style="display:none">
                        正在验证用户名是否存在...
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Input your email" id="email">
                    <div class="verify-info email chk_rule">
                        email like: example@site.com
                    </div>
                    <div class="verify-info email chk_exist" style="display:none">
                        正在验证用邮箱是否已被注册...
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label>Check Password</label>
                    <input type="password" class="form-control" id="repassword">
                    <div class="verify-info repassword">
                        The password entered twice should be the same and cannot be empty
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" lay-submit lay-filter="sub" class="btn btn-primary btn-block" id="submit" disabled>Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="footer"></div>

</body>
<script src="/static/js/jquery.js"></script>
<script>
    $(function () {
        var username, email, repassword;
        // 验证变量
        var chk_username = false,
            chk_email = false,
            chk_repassword = false;

        // 验证用户名
        $('#username').blur(function () {
            checkUsername($('#username').val());
        })

        // 验证邮箱
        $('#email').blur(function () {
            checkEmail($('#email').val())
        })




        function checkEmail(email) {
            var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
            if (re.test(email)) {
                $('.verify-info.email').hide();
                $('.verify-info.email.chk_exist').show().removeAttr('style').text('正在检查邮箱是否存在。。。');
                // 异步验证邮箱是否存在
                $.ajax({
                    url: '<?php echo url("index/passport/checkEmail"); ?>',
                    data: {
                        email: email,
                    },
                    success: function (data) {
                        console.log('data :', data);
                        if (data == 0) {
                            chk_email = true;
                            $('.verify-info.email.chk_exist').text('该邮箱可用').css('color',
                                'yellowgreen');
                            $('#email').css('border-color', 'yellowgreen');
                            // 三个都通过了 让提交按钮可用
                            if (chk_username) $('#submit').removeAttr('disabled');
                        } else {
                            $('.verify-info.email.chk_exist').text('该邮箱已存在').css('color', 'red');
                            $('#email').css('border-color', 'red');
                        }
                        console.log('chk_email :', chk_email);
                    }
                })
                return true;
            } else {
                $('.verify-info.email').hide();
                $('#email').css('border-color', 'red');
                $('.verify-info.email.chk_rule').show().css('color', 'red');
                return false;
            }
        }

        function checkUsername(username) {
            var re = /^[a-zA-Z][a-zA-Z0-9]{3,15}$/;
            if (re.test(username)) {
                $('.verify-info.username').hide();
                $('.verify-info.username.chk_exist').show().removeAttr('style').text('正在检查用户名是否存在。。。');
                // 异步验证用户名是否存在
                $.ajax({
                    url: '<?php echo url("index/passport/checkUsername"); ?>',
                    data: {
                        username: username,
                    },
                    success: function (data) {
                        console.log('data :', data);
                        if (data == 0) {
                            chk_username = true;
                            $('.verify-info.username.chk_exist').text('该用户名可用').css('color',
                                'yellowgreen');
                            $('#username').css('border-color', 'yellowgreen');
                            // 三个都通过了 让提交按钮可用
                            if (chk_email) $('#submit').removeAttr('disabled');
                        } else {
                            $('.verify-info.username.chk_exist').text('该用户名已存在').css('color',
                                'red');
                            $('#username').css('border-color', 'red');
                        }
                        console.log('chk_username :', chk_username);
                    }
                })
                // $('.verify-info.username').removeAttr('style');

                // $('#username').css('border-color', 'yellowgreen');
                return true;
            } else {
                $('.verify-info.username').hide();
                $('#username').css('border-color', 'red');
                $('.verify-info.username.chk_rule').show().css('color', 'red');
                return false;
            }
        }

        function checkRepassword(repassword) {
            var password = $('#password').val();
            if (repassword && password === repassword) { // 密码不为空且相等 则通过
                console.log('password pass');
                return true;
            } else {
                return false;
            }
        }


    })
        function sb1() {
            var password = document.getElementById("password");
            var repassword = document.getElementById("repasssword");
            if (password.value == null || password.value == "") {
                alert("please enter password");
                password.focus();
                return false;
            } 
            return true;
        }
</script>
</html>