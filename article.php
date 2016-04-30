<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
}
if($_GET['art'] == NULL){
    echo "<script>location.href='/articles.php';</script>";
}
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
        <?php

        require('PHP/config.php');

        $art_id = $_GET['art'];
        $get_id= "SELECT a_id, user_id FROM articles WHERE a_id='$art_id' limit 1";
        $get_art_id= mysqli_query($db, $get_id) or die;
        $id_row = mysqli_fetch_object($get_art_id);
        if ($id_row == false) {
            die("<script>alert('Article does not exist'); location.href='/articles.php';</script>");
        }
        $id = $id_row->a_id;
        $user_id = $id_row->user_id;

        $get_user= "SELECT user_name FROM users WHERE user_id='$user_id' limit 1";
        $get_user_name= mysqli_query($db, $get_user) or die;
        $user_row = mysqli_fetch_object($get_user_name);
        $user_name = $user_row->user_name;

        ////////////////////////////////////////////////////////
        $query = "SELECT * FROM articles WHERE a_id='$id'";
        $result = mysqli_query($db, $query) or die;

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $a_title = $row['a_title'];
        $a_game = $row['a_game'];
        $a_time = $row['a_time'];
        $a_article = $row['a_text'];
        ?>
        <div class="page-header textglow3">
            <h1>Article: <?= $a_title; ?></h1> Posted date: <?=substr($a_time, 0,10);?>
        </div>
        <div>
            <h2>About: <?=$a_game;?></h2>
            <h2>By: <a href="profiles.php?user=<?=$user_name;?>"><?=$user_name;?></a></h2>
        </div>
        <div class="pushp">
            <h3><?=$a_article;?></h3>
            <?php }?>
        </div>

        <div class="addcomment">
            <?php if ($_SESSION['username'] == true) { ?>
            <form action="PHP/comment.php" method="post">
                <textarea class="form-control" rows="5" required="required" placeholder="Write your comment" maxlength="300" name="comment"></textarea><br>
                <input name="a_id" value="<?=$_GET['art'];?>" hidden>
                <button class="btn btn-default btn-lg" type="submit" value="submit" name="submit">Comment</button>
            </form>
            <?php } else { ?>
                <h3> --> Please login to comment :D</h3>
            <?php } ?>
        </div>
            <?php
                $a_id = $_GET['art'];

                $query = "SELECT * FROM comments WHERE a_id='$a_id'";
                $result = mysqli_query($db, $query) or die;
                $num_rows = mysqli_num_rows($result);


            ?>
        <div class="comment">
            <h2>Comments: (<?=$num_rows;?>)</h2>
        </div>
        <div class="row">
        <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                $comment = $row['comment'];
                $user_id = $row['user_id'];
                $get_user= "SELECT user_name FROM users WHERE user_id='$user_id' limit 1";
                $get_user_name= mysqli_query($db, $get_user) or die;
                $user_row = mysqli_fetch_object($get_user_name);
                $user_name = $user_row->user_name;

                $get_avatar= "SELECT avatar FROM profiles WHERE user_id='$user_id' limit 1";
                $get_image= mysqli_query($db, $get_avatar) or die;
                $avatar_row = mysqli_fetch_object($get_image);
                $avatar = $avatar_row->avatar;

        ?>

        <div class="">
            <a href="profiles.php?user=<?=$user_name?>"><img alt="user avatar" src="Pictures/<?=$avatar?>" width="100" height="100"></a>
        </div>
        <div class="">
            <a href="profiles.php?user=<?=$user_name?>"></a>
            <p><?=$comment?></p>
        </div>
        <?php } ?>
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
        <div class="col-md-4">
            <a href="about.php">About</a><br>
            <a href="terms.php">Terms</a>
        </div>
    </div>
</div>
</body>
</html>