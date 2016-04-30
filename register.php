<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

} else {
    header('location:/index.php');
}

require('PHP/config.php');

if (isset($_POST['submit'])) {

    session_start();
    if ($_POST['captcha'] != $_SESSION['digit']) die ("<script>alert('Please re-check the captcha'); location.href='Register.php';</script>");
    session_destroy();

    include('$db');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reg_date = gmdate('Y-m-d G:i:s', (strtotime("+1 hour")));
    $password = md5($password);

    $sqlinsert = "INSERT INTO users (user_name, email, password, reg_date) VALUES
            ('$username', '$email', '$password', '$reg_date')";
    if (!mysqli_query($db, $sqlinsert)) {
        echo ("<script>alert('Username or Email has been used already'); location.href='Register.php';</script>");

    } else {
        $sqlinsert= "INSERT INTO profiles (user_id)"
            ."SELECT user_id FROM users WHERE user_name='$username'";
        $result = mysqli_query($db, $sqlinsert);
     echo "<script>alert('You are successfully registered'); location.href='login.php';</script>";
}}
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
    <!-- Glyphicons from http://fortawesome.github.io/Font-Awesome/get-started/ && http://ionicons.com/ && http://zurb.com/playground/foundation-icon-fonts-3/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="Style/foundation-icons/foundation-icons.css">
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
            <a class="navbar-brand" href="index.php">SGamers</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">UpcomingGames<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="upcoming.php?plat=ps3">Playstation 3</a></li>
                        <li><a href="upcoming.php?plat=ps4">Playstation 4</a></li>
                        <li><a href="upcoming.php?plat=vita">Playstation Vita</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="upcoming.php?plat=xbox">Xbox One</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="upcoming.php?plat=wii">Wii U</a></li>
                        <li><a href="upcoming.php?plat=3ds">3DS</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="upcoming.php?plat=pc">PC</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <li class="active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in" style="margin-right: 7px; font-size: 20px;"></span>SignIn/Up</a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
                        </ul>
                    </li>
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
            <form class="form-horizontal" action="register.php" method="post" onSubmit="return validate();">
                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username:</label>
                    <div class="col-sm-5">
                        <input type="text" pattern=".{4,30}" required="required" maxlength="30" name="username" class="form-control" id="inputUsername" placeholder="Username" oninvalid="setCustomValidity('Must be between 4 to 30 characters ')" onchange="try{setCustomValidity('')}catch(e){}" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" pattern=".{5,100}" required="required" maxlength="100" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" pattern=".{8,32}" maxlength="32" required="required" name="password" class="form-control" id="password" placeholder="Password" oninvalid="setCustomValidity('Must be between 8 to 32 characters ')" onchange="try{setCustomValidity('')}catch(e){}">
                        <input type="password" pattern=".{8,32}" maxlength="32" required="required" name="Rpassword" class="form-control" id="Rpassword" placeholder="Re-enter Password" oninvalid="setCustomValidity('Must be between 8 to 32 characters ')" onchange="try{setCustomValidity('')}catch(e){}" style="margin-top: 10px;">
                            <script>
                                function validate(){

                                    var a = document.getElementById("password").value;
                                    var b = document.getElementById("Rpassword").value;
                                    if (a!=b) {
                                        alert("Passwords do no match");
                                        return false;
                                    }
                                }
                            </script>
                    </div>
                </div><br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Captcha:</label>
                        <div class="col-sm-3">
                            <form method="post" action="register.php" onsubmit="return checkForm(this);">
                                <img id="captcha" src="captcha.php" width="232.5" height="70" border="1">
                                <p style="margin-bottom: 0"><a href="#"  onclick="
                                  document.getElementById('captcha').src = 'captcha.php?' + Math.random();
                                  document.getElementById('captcha_code').value = '';
                                  return false;
                                   "><span class="glyphicon glyphicon-refresh"></span></a></p>
                                <input id="captcha_code" type="number" required="required" size="6" max="99999" name="captcha" class="form-control" placeholder="Captcha"  onchange="try{setCustomValidity('')}catch(e){}" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');">
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Terms and conditions:</label>
                            <div class="col-sm-4" style="padding-top: 7px">
                                <input type="checkbox" name="terms" id="terms" onchange="document.getElementById('agree').disabled = !this.checked;"> <label for="terms">I agree on the <a href="terms.php" target="_blank">terms and conditions</a></label>
                                <button id="agree" type="submit" name="submit" class="btn btn-default btn-lg" value="send" style="margin-top: 10px" disabled>Sign up <span class="glyphicon glyphicon-menu-right"></span></button>
                            </div>
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
            </form>
        </div>
    </div>
</div>
<div class="footer" style="position: fixed">
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
        <div class="col-md-4">
            <a href="about.php">About</a><br>
            <a href="terms.php">Terms</a>
        </div>
    </div>
    <style>
        @media all and (max-width: 970px) and (min-width: 100px) {
            .footer {
                position: absolute;
            }
        }
    </style>
</div>
</body>
