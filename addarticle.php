<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='login.php';</script>";
}

//http://stackoverflow.com/questions/15194051/mysqli-real-escape-string-returns-empty-string
if(isset($_POST['submit'])){
    require('PHP/config.php');

    $a_title = mysqli_real_escape_string($db, $_POST['title']);
    $a_title = htmlspecialchars($a_title);

    $a_game = mysqli_real_escape_string($db, $_POST['game']);
    $a_game = htmlspecialchars($a_game);

    $time = gmdate('Y-m-d G:i:s', (strtotime("+1 hour")));

    $article = mysqli_real_escape_string($db, $_POST['article']);
    $article = htmlspecialchars($article);

    $user_id = $_SESSION['userid'];

    $sqlinsert = "INSERT INTO articles (a_title, a_game, a_time, a_text, user_id) VALUES
                    ('$a_title', '$a_game', '$time', '$article',  '$user_id')";
    if (!mysqli_query($db, $sqlinsert)) {
        echo ("<script>alert('Quote is already registered'); location.href='addquote.php';</script>");

    } else {
        echo "<script>alert('You are successfully uploaded an article'); location.href='articles.php';</script>";
    } }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>

    </script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/Style/responsiveslides/responsiveslides.min.js"></script>
    <!-- <script type="text/javascript">
         if (document.cookie == false) {
             window.location.href ="choose.html";
         } else if (document.cookie == true) {
             function swapStyleSheet(sheet){
                 document.getElementById('pagesstyle').setAttribute('href', sheet);
             }

         }  a
     </script> -->
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
                <li class="active"><a href="articles.php">Articles<span class="sr-only">(current)</span></a></li>
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
    <div class="jumbotron">
        <div class="page-header">
            <?php if ($_SESSION['username'] == true) { ?>
                <h1>Welcome <?php echo $_SESSION['username'] ?> ...</h1>
            <?php } else { ?>
                <h1>VVelcome to SGamers</h1> <?php } ?>
        </div>
        <div>
            <div class="textglow2">
                <h2><u>Adding an article:</u></h2>
                <form action="addarticle.php" method="post">
                    <h3><span class=""></span> Title:</h3>
                    <p><input type="text" class="form-control" required="required" maxlength="45" placeholder="Title" name="title"></p>
                    <h3><span class="ion-ios-game-controller-b"></span> Game's name:</h3>
                    <p><input type="text" class="form-control" required="required" maxlength="50" placeholder="The game you want to talk about" name="game"></p>
                    <h3><span class="ion-quote"></span> Article:</h3>
                    <textarea class="form-control" rows="5" id="fg" placeholder="Your article" maxlength="2000" name="article"></textarea><br>
                    <button class="btn btn-default btn-lg" type="submit" value="submit" name="submit">Submit</button>
                </form>
            </div>
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
</div>
</body>
</html>