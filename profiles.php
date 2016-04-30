<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='/login.php';</script>";
}
if($_GET['user'] == NULL){
    echo "<script>location.href='/index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>

    </script>
    <!-- For Mobiles -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no"> -->
    <meta charset="UTF-8">
    <title>SGamers</title>
    <!-- Bootstrap CSS,JQ&JS Libraries-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link id="pagesstyle" rel="stylesheet" type="text/css" href="Style/SG.css">;
    <!-- Glyphicons from http://fortawesome.github.io/Font-Awesome/get-started/ && http://ionicons.com/ && http://zurb.com/playground/foundation-icon-fonts-3/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="Style/foundation-icons/foundation-icons.css">

    <!-- <script type="text/javascript">
         if (document.cookie == false) {
             window.location.href ="choose.html";
         } else if (document.cookie == true) {
             function swapStyleSheet(sheet){
                 document.getElementById('pagesstyle').setAttribute('href', sheet);
             }

         }  a
     </script> -->
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
                <?php if ($_SESSION['username'] == true) { ?>
                    <li class="active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" style="font-size: 20px;"></span><?php echo substr($_SESSION['username'], 0 , 9);?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-edit" style="font-size:20px; margin-right: 2px"></span>MyProfile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="PHP/logout.php"><span class="glyphicon glyphicon-log-out" style="font-size:20px; margin-right: 3px"></span>Logoff</a></li>
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
                <h2><?php echo $_SESSION['username']; ?> Profile:D</h2>
            <?php } else { ?>
                <h1>Welcome to SGamers</h1> <?php } ?>
        </div>
        <div class="row" style="word-wrap: break-word ">
            <?php
            require('PHP/config.php');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $user = $_GET['user'];
            $get_id= "SELECT user_id FROM users WHERE user_name='$user' limit 1";
            $get_user_id= mysqli_query($db, $get_id) or die;
            $id_row = mysqli_fetch_object($get_user_id);
            if ($id_row == false) {
                echo "<script>alert('User does not exist'); location.href='/index.php';</script>";
            }
            $id = $id_row->user_id;

            $query = "SELECT * FROM profiles WHERE user_id='$id'";
            $result = mysqli_query($db, $query) or die;
            while($row = mysqli_fetch_array($result)) {
            $status = $row['status'];
            $about_me = $row['about_me'];
            $age = $row['age'];
            $avatar = $row['avatar'];
            $gender = $row['gender'];

            $fav_games = $row['fav_games'];
            $skype = $row['skype'];
            $msn = $row['msn'];
            $instagram = $row['instagram'];
            $youtube = $row['youtube'];

            $steam = $row['steam'];
            $twitch = $row['twitch'];
            $psn = $row['psn'];
            $xbox = $row['xbox'];

            ?>
            <div class="col col-md-3">
                <div>
                    <div>
                        <img class="img-circle" style="height: 200px; width: 240px; margin-left: -10px" src="<?php if($avatar == NULL){ echo "Pictures/empty-user.jpg"; }else{ echo "Pictures/".$avatar;} ?>">
                    </div>
                    <div style="border-right: 1px groove silver; margin-left: -5px;">
                        <h3><span class="glyphicon glyphicon-road"></span> Age:</h3>
                        <p><?php echo $age;?></p>
                        <h3><span class="fi-torsos-male-female"></span> Gender:</h3>
                        <p><?php echo $gender;?></p>
                        <h3><span class="fa fa-steam"></span> Steam:</h3>
                        <p><?php echo $steam;?></p>
                        <h3><span class="ionicons ion-playstation"></span> PSN:</h3>
                        <p><?php echo $psn;?></p>
                        <h3><span class="ion-xbox"></span> Xbox Live:</h3>
                        <p><?php echo $xbox;?></p>
                        <h3><span class="fa fa-skype"></span> Skype:</h3>
                        <p><?php echo $skype;?></p>
                        <h3><span class="fa fa-at"></span> Email:</h3>
                        <p><?php echo $msn;?></p>
                        <h3><span class="fa fa-instagram"></span> Instagram:</h3>
                        <p><?php echo $instagram;?></p>
                        <h3><span class="fa fa-youtube"></span> Youtube:</h3>
                        <p><?php echo $youtube;?></p>
                        <h3><span class="ion-social-twitch-outline"></span> Twitch:</h3>
                        <p><?php echo $twitch;?></p>
                    </div>
                </div>
            </div>
            <div class="col col-md-9" style="word-wrap: break-word; padding-left: 35px;">
                <div>
                    <h2>Status:</h2>
                    <p><?php echo $status;?></p>
                    <h2>About Me:</h2>
                    <p><?php echo $about_me;?></p>
                    <h2>Favorite Games:</h2>
                    <p><?php echo $fav_games;?></p>
                </div>
            </div>
        </div><?php } ?>
    </div>
</div>

<div class="footer">
    <div class="container-fluid" style="height: 2px"></div>
    <div class=container>
        <div class="row" style="word-wrap: break-word">
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
</div>
</body>
</html>