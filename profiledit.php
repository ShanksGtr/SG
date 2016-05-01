<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='login.php';</script>";
}

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('PHP/config.php');

    $list_query = "SELECT * FROM profiles WHERE user_id='{$_SESSION['userid']}'";
    $result = mysqli_query($db, $list_query) or die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>

    </script>
    <!-- For Mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>Profile Edit</title>
    <!-- Free icon from http://findicons.com/icon/115500/input_gaming -->
    <link rel="icon" type="image/png" href="Pictures/input_gaming.ico" sizes="32x32"/>
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
                <h2>Editing <?php echo $_SESSION['username']; ?> ...</h2>
            <?php } else {} ?>
        </div>
        <!-- Got the way to do it from: http://stackoverflow.com/questions/17463641/how-to-remember-text-input-in-php-forms -->
        <div class="row" style="word-wrap: break-word ">
            <form action="PHP/profiling.php" method="post" >
                <?php
                while($row = mysqli_fetch_array($result)) {

                ?>
                <div class="col col-md-3" >
                    <div>
                        <div>
                            <img alt="user avatar" class="img-circle" style="height: 200px; width: 240px; margin-left: -10px" src="<?php if($row['avatar'] == NULL){ echo "Pictures/empty-user.jpg"; }else{ echo "Pictures/".$row['avatar'];} ?>">
                        </div>
                        <div style="border-right: 1px groove silver; padding-right: 11px;">
                                <h3><span class="glyphicon glyphicon-road"></span> Age:</h3>
                                <p><input type="number" max="150" class="form-control" placeholder="Your age" name="age" required="required" value="<?=$row['age']; ?>"/> </p>
                                <h3><span class="fi-torsos-male-female"></span> Gender:</h3>
                                <!-- The way to do it was from: http://stackoverflow.com/questions/8443827/save-radio-button-status-php -->
                                <h3><input type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>> Male
                                    <input type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>> Female <br>
                                    <input required="required" type="radio" name="gender" value="Not saying" <?php if ($row['gender'] == 'Not saying') echo 'checked'; ?>> Not saying
                                </h3>
                                <h3><span class="fa fa-steam"></span> Steam:</h3>
                                <p><input type="text" class="form-control"  placeholder="Steam" name="steam" value="<?= $row['steam']; ?>"> </p>
                                <h3><span class="ionicons ion-playstation"></span> PSN:</h3>
                                <p><input type="text" class="form-control" placeholder="Playstation Network" name="psn" value="<?= $row['psn']; ?>"> </p>
                                <h3><span class="ion-xbox"></span> Xbox Live:</h3>
                                <p><input type="text" class="form-control" placeholder="Xbox Live" name="xbox" value="<?= $row['xbox']; ?>"> </p>
                                <h3><span class="fa fa-skype"></span> Skype:</h3>
                                <p><input type="text" class="form-control" placeholder="Skype" name="skype" value="<?= $row['skype']; ?>"> </p>
                                <h3><span class="fa fa-at"></span> Email:</h3>
                                <p><input type="text" class="form-control" placeholder="Email address" name="msn" value="<?= $row['msn']; ?>"> </p>
                                <h3><span class="fa fa-instagram"></span> Instagram:</h3>
                                <p><input type="text" class="form-control" placeholder="Instagram" name="instagram" value="<?= $row['instagram']; ?>"> </p>
                                <h3><span class="fa fa-youtube"></span> Youtube:</h3>
                                <p><input type="text" class="form-control" placeholder="Youtube Channel" name="youtube" value="<?= $row['youtube']; ?>"> </p>
                                <h3><span class="ion-social-twitch-outline"></span> Twitch:</h3>
                                <p><input type="text" class="form-control" placeholder="Twitch" name="twitch" value="<?= $row['twitch']; ?>"> </p>
                        </div>
                    </div>
                </div>
                <div class="col col-md-9" style="word-wrap: break-word">
                    <div>
                            <h2>Status:</h2>
                            <textarea class="form-control" rows="3" id="status" placeholder="Status" maxlength="255" name="status" ><?= $row['status']; ?></textarea>
                            <h2>About Me:</h2>
                            <textarea class="form-control" rows="10"  id="aboutme" placeholder="About You" maxlength="2000" name="about_me"><?= $row['about_me']; ?></textarea>
                            <h2>Favorite Games:</h2>
                            <textarea class="form-control" rows="10" id="fg" placeholder="Favorite games using hashtags form! seperated by a comma (e.g. #MyFavoriteGame, #is)" maxlength="2000" name="fav_games"><?= $row['fav_games']; ?></textarea><br>
                            <?php } ?>
                        <!-- <script>
                             submitprofile = function() {
                                document.getElementById("form1").submit();
                                document.getElementById("form1").action='PHP/profiling.php';
                                document.getElementById("form2").submit();
                                document.getElementById("form2").action='PHP/profiling.php';
                                return true;
                            }
                        </script> -->
                        <button class="btn btn-default btn-lg" type="submit" value="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container-fluid" style="height: 2px"></div>
    <div class=container>
        <div class="row" style="word-wrap: break-word">
            <div class="col-md-4">

            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="about.php">About</a><br>
                <a href="terms.php">Terms</a><br>
                <a href="choose.php">Themes</a>
            </div>
        </div>
    </div>
</div>
<style>
    @media all and (max-width: 970px) and (min-width: 100px) {
        .footer {
            position: absolute;
        }
    }
</style>
</body>
</html>