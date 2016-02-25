<?php
require('PHP/config.php');

if (isset($_POST['submit'])) {

    session_start();
    if ($_POST['captcha'] != $_SESSION['digit']) die ("<script>alert('Please re-check the captcha'); location.href='Register.php';</script>");
    session_destroy();

    include('$db');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reg_date = date('Y-m-d G:i:s');
    $password = md5($password);

    $sqlinsert = "INSERT INTO users (user_name, email, password, reg_date) VALUES
            ('$username', '$email', '$password', '$reg_date')";
    if (!mysqli_query($db, $sqlinsert)) {
        echo "<script>alert('Username or Email has been used already'); location.href='Register.php';</script>";
    }
    $newrecord = "<script>alert('You are successfully registered'); location.href='login.html';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- For Mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>SGamers</title>
    <!-- Bootstrap CSS,JQ&JS Libraries-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link id="pagesstyle" rel="stylesheet" type="text/css" href="Style/SG.css">;
    <script type="text/javascript">
        function swapStyleSheet(sheet){
            document.getElementById('pagesstyle').setAttribute('href', sheet);
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">SGamers</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.html"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid"></div>
</nav>
<div class="container">
    <div class="jumbotron">
        <div class="page-header">
            <h1>Registration: </h1>
        </div>
        <div>
            <form class="form-horizontal" action="register.php" method="post">
                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" pattern=".{4,30}" required="required" maxlength="30" name="username" class="form-control" id="inputUsername" placeholder="Username" oninvalid="setCustomValidity('Must be between 4 to 30 characters ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" pattern=".{5,100}" required="required" maxlength="100" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" pattern=".{8,32}" maxlength="32" required="required" name="password" class="form-control" id="inputPassword3" placeholder="Password" oninvalid="setCustomValidity('Must be between 8 to 32 characters ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Captcha</label>
                    <div class="col-sm-3">
                        <form method="post" action="register.php" onsubmit="return checkForm(this);">
                            <img id="captcha" src="captcha.php" width="232.5" height="70" border="1">
                            <p><a href="#" style="font-family: 'Press Start 2P', cursive" onclick="
                              document.getElementById('captcha').src = 'captcha.php?' + Math.random();
                              document.getElementById('captcha_code').value = '';
                              return false;
                               "><span class="glyphicon glyphicon-refresh"></span> Refresh</a></p>
                            <input id="captcha_code" type="text" required="required" size="6" maxlength="5" name="captcha" class="form-control" placeholder="Captcha" style="margin-top: 5px" oninvalid="setCustomValidity('Please enter the numbers from the Captcha ')" onchange="try{setCustomValidity('')}catch(e){}" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"><br>
                            <button type="submit" name="submit" class="btn btn-default">Sign up</button>
                            <?php
                                echo $newrecord;
                            ?>
                        </form>
                            <script type="text/javascript">

                                function checkForm(form) {
                                    if (!form.captcha.value.match(/^\d{5}$/)) {
                                        alert('Please enter the CAPTCHA digits in the box provided');
                                        form.captcha.focus();
                                        return false;

                                    } else {
                                        return true;
                                    }
                                }
                            </script>
                            <!--<input type="text" id="randomfield" disabled>
                            <script>
                                function Captcha() {
                                   var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                                   var string_length = '4';
                                   var Captcha = '';
                                       for (var i=0; i<string_length; i++) {
                                           var rnum= Math.floor(Math.random() * chars.length);
                                           Captcha += chars.substring(rnum,rnum+1);
                                       }
                                   document.getElementById('randomfield').value = Captcha;
                               }
                                       if(document.
                                   function check() {getElementById('CaptchaEnter').value == document.getElementById('randomfield').value){

                                       } else {

                                       }
                                   }
                           </script> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container-fluid" style="height: 2px"></div>
    <div class=container>
        <div class="col-md-4">
            <p>Choose your Theme!</p>
            <button onclick="swapStyleSheet('Style/SG.css')">Dark Blue</button>
            <button onclick="swapStyleSheet('Style/BR.css')">Dark Red</button>
            <button onclick="swapStyleSheet('Style/BG.css')">Dark Green</button>
            <button onclick="swapStyleSheet('Style/WB.css')">White Blue</button>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><a href="about.html">About</a></div>
    </div>
</div>
</body>
