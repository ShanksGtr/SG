<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

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
        <!-- Glyphicons from http://fortawesome.github.io/Font-Awesome/get-started/ && http://ionicons.com/ && http://zurb.com/playground/foundation-icon-fonts-3/-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="Style/foundation-icons/foundation-icons.css">
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
                            <li role="separator" class="divider"></li>
                            <li><a href="upcoming.php?plat=xbox">Xbox One</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="upcoming.php?plat=wii">Wii U</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="upcoming.php?plat=pc">PC</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($_SESSION['username'] == true) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" style="font-size: 20px;"></span><?php echo substr($_SESSION['username'], 0 , 9);?></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php"><span class="glyphicon glyphicon-edit" style="font-size:20px; margin-right: 2px"></span>MyProfile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="PHP/logout.php"><span class="glyphicon glyphicon-log-out" style="font-size:20px; margin-right: 3px"></span>Logoff</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in" style="margin-right: 7px; font-size: 20px;"></span>SignIn/Up</a>
                            <ul class="dropdown-menu">
                                <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="container-fluid"></div>
    </nav>
    <div class="container">
        <div class="jumbotron">
            <div class="page-header">
                <h1>About: </h1>
            </div>
            <div>
                <h2>SGamers is an abbreviation for Sekai Gamers, Sekai means World in Japanese! Hence it is World Gamers! </h2>
            </div>
            <div class="page-header">
                <h1>Contact Admin on </h1>
            </div>
            <h2>1400003@rgu.ac.uk</h2>
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