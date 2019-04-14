<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:93:"C:\Users\Administrator\Desktop\amazon_web\public/../application/index\view\index\sign_up.html";i:1555202161;s:80:"C:\Users\Administrator\Desktop\amazon_web\application\index\view\inc\header.html";i:1555202601;}*/ ?>
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
                <li><a href="signin">Sign in</a></li>
                <li><a href="signup">Sign up</a></li>
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
            <form action="signUpRes">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Input your username"
                        id="username">
                    <div class="verify-info username">
                        4-16 letters and numbers, beginning with letters.
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Input your email" id="email">
                    <div class="verify-info email">
                        email like: example@site.com
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
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Sign up</button>
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
        var username, email, password;
        $('#username').blur(function () {
            username = $('#username').val();
            if (!checkUsername(username)) {
                $('.verify-info.username').css('color', 'red');
                $('#username').css('border-color', 'red');
            } else {
                $('.verify-info.username').removeAttr('style');
                $('#username').css('border-color', 'yellowgreen');
            };
        })

        $('#email').blur(function () {
            email = $('#email').val();
            if (!checkEmail(email)) {
                $('.verify-info.email').css('color', 'red');
                $('#email').css('border-color', 'red');
            } else {
                $('.verify-info.email').removeAttr('style');
                $('#email').css('border-color', 'yellowgreen');
            };
        })
        $('#submit').click(function () {
            username = $('#username').val();
            email = $('#email').val();
            console.log((checkUsername(username) && checkEmail(email)));
            if (!(checkUsername(username) && checkEmail(email))) {
                console.log('2222 :', 2222);
                return false;
            } else {
                console.log('1111 :', 1111);
                var psw = $('#password').val();
                console.log('psw :', psw);
                var repsw = $('#repassword').val();
                console.log('repsw :', repsw);
                if (psw !== repsw || psw === '') {
                    console.log('pppppppppppp :');
                    $('.verify-info.repassword').css('color', 'red');
                    return false;
                }
            }
        })
    })

    function checkEmail(email) {
        var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
        if (re.test(email)) {
            console.log('email pass');
            return true;
        } else {
            return false;
        }
    }

    function checkUsername(username) {
        var re = /^[a-zA-Z][a-zA-Z0-9]{3,15}$/;
        if (re.test(username)) {
            console.log('username pass');
            return true;
        } else {
            return false;
        }
    }

    function checkPassword(psw) {
        if (psw) {
            console.log('password pass');
            return true;
        } else {
            return false;
        }
    }
</script>

</html>