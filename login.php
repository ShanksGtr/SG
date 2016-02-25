<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    header('location:/index.php');
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
    <link rel="stylesheet" type="text/css" href="Style/SG.css">
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
                <li class="active"><a href="login.html"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
            </ul>

        </div>
    </div>
    <div class="container-fluid"></div>
</nav>
<div class="container">
    <div class="jumbotron" style="margin-top: 40px">
        <div class="page-header">
            <h1>Login: </h1>
        </div>
        <div>
            <form class="form-horizontal" action="PHP/logging.php" method="post">
                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username:</label>
                    <div class="col-sm-5">
                        <input type="text" pattern=".{4,30}" required="required" maxlength="30" name="username" class="form-control" id="inputUsername" placeholder="Username" oninvalid="setCustomValidity('Must be between 4 to 30 characters ')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" pattern=".{8,32}" maxlength="32" required="required" name="password" class="form-control" id="inputPassword3" placeholder="Password" oninvalid="setCustomValidity('Must be between 8 to 32 characters ')" onchange="try{setCustomValidity('')}catch(e){}">
                        <button type="submit" name="submit" class="btn btn-default" style="margin-top: 10px">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container-fluid" style="height: 2px"></div>
    <div class=container>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="about.php">About</a><br>
            <a href="terms.php">Terms</a>
        </div>
    </div>
</div>
</body>
</html>