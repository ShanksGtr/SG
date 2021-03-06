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
    <title>Themes</title>
    <!-- Free icon from http://findicons.com/icon/115500/input_gaming -->
    <link rel="icon" type="image/png" href="Pictures/input_gaming.ico" sizes="32x32"/>
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
    <!-- Glyphicons from http://fortawesome.github.io/Font-Awesome/get-started/ && http://ionicons.com/ && http://zurb.com/playground/foundation-icon-fonts-3/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="Style/foundation-icons/foundation-icons.css">
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
                <li><a href="chat.php"><span class="ion-chatbubble-working"></span>Chat</a></li>
                <li><a href="articles.php">Articles<span class="sr-only">(current)</span></a></li>
                <li><a href="quotes.php">Quotes</a></li>
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
                <li><a href="search.php"><span class="glyphicon glyphicon-search" style="font-size:20px; margin-right: 2px"></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($_SESSION['username'] == true) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" style="font-size: 20px;"></span><?php echo substr($_SESSION['username'], 0 , 9);?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-edit" style="font-size:20px; margin-right: 2px"></span>MyProfile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="PHP/logout.php"><span class="glyphicon glyphicon-log-out" style="font-size:20px; margin-right: 3px"></span>Logoff</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in" style="margin-right: 7px; font-size: 20px;"></span>SignIn/Up<span class="caret"></span></a>
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
    <div class="jumbotron" style="margin-top: 40px">
        <div class="page-header">
            <?php if ($_SESSION['username'] == true) { ?>
                <h1>Welcome <?php echo $_SESSION['username'] ?> ...</h1>
            <?php } else { ?>
                <h1>VVelcome to SGamers</h1> <?php } ?>
        </div>
        <h2>Unfortunately, Themes are on maintenance at this moment.</h2>
        <h2>Sorry for any inconvenience</h2>

        <!--<div class="container">
              <div class="col-md-3">
                  <h2>Dark Blue</h2><br>
                  <button type="button" class="btn btn-primary">Submit</button>
              </div>
              <div class="col-md-3">
                  <h2>Dark Red</h2><br>
                  <button type="button" class="btn btn-danger">Submit</button>
              </div>
              <div class="col-md-3">
                  <h2>Dark Green</h2><br>
                  <button type="button" class="btn btn-success">Submit</button>
              </div>
              <div class="col-md-3">
                  <h2>Light Blue</h2><br>
                  <form action="index.php">
                      <button type="button" class="btn btn-info" onclick="colcookies('Style/WB.css');">Submit</button>
                  </form>
              </div>
           </div>-->
       </div>
   </div>

   <div class="footer">
       <div class="container-fluid" style="height: 2px"></div>
       <div class=container style="word-wrap: break-word">
           <div class="col-md-4">
               <!--<p>Choose your Theme!</p>
               <button onclick="swapStyleSheet('Style/SG.css')">Dark Blue</button>
               <button onclick="swapStyleSheet('Style/BR.css')">Dark Red</button>
               <button onclick="swapStyleSheet('Style/BG.css')">Dark Green</button>
               <button onclick="swapStyleSheet('Style/WB.css')">White Blue</button>
               -->
        </div>
        <div class="col-md-4">
            <p>Copyright <span class="fa fa-copyright"></span> 2016 by <a href="http://www.rgu.ac.uk/" target="_blank">Robert Gordon University</a></p>
        </div>
        <div class="col-md-4">
            <a href="about.php">About</a><br>
            <a href="terms.php">Terms</a><br>
            <a href="choose.php">Themes</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    function colcookies() {
        var now = new Date();
        var expires = new Date(now.setTime(now.getTime() + 60 * 60 * 1000)); //Expire in one hour
        document.cookie = 'n=1;path=/;expires='+expires.toGMTString()+';';
    }
</script>
</body>
</html>