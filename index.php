<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
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
    <!-- Free icon from http://findicons.com/icon/115500/input_gaming -->
    <link rel="icon" type="image/png" href="Pictures/input_gaming.ico" sizes="32x32"/>
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
                                    <li role="separator" class="divider"></li>
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
                        <h2><span class="fa fa-gamepad" style="margin-right: 8px; font-size: 40px;"></span><u>Upcoming random games:</u></h2>
                    </div>
                    <div class="rslides">
                        <!--  https://www.youtube.com/watch?v=MwTm53hpzi8 && http://responsiveslides.com/themes/themes.html -->
                        <?php
                        include('simple_html_dom.php');
                        $html = file_get_html('http://www.videogamecountdown.com/');
                        $games = $html->find('div[class=inner]');

                        $games= array($games[0], $games[1], $games[3], $games[4], $games[5]);
                        foreach ($games as $game) {


                            $titles = $game->find('h3 a', 0)->plaintext;
                            $images = $game->find('div[class=gridimg] img', 0)->attr['src'];
                            $info = $game->find('div[class=gridimg] a', 0)->attr['href'];
                            $date = $game->find('div[class=date] span', 0)->outertext;
                            $html = file_get_html('http://www.videogamecountdown.com/' . $info);
                            $desc = $html->find('div[class=two_third]', 0)->innertext;
                            $details = $html->find('div[class="one_third last projectdetails"]', 0)->outertext;
                            $amazon = $html->find('div[class=pagerwrapper] a', -1)->outertext;
                            //$titles = $game->find('h3', 0);

                            echo '<li>';
                            echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                            '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';
                        }
                            echo '</li>';
                        ?>
                    </div>
                    <script>
                        $(function() {
                            $(".rslides").responsiveSlides({
                                auto: false,             // Boolean: Animate automatically, true or false
                                speed: 500,            // Integer: Speed of the transition, in milliseconds
                                timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
                                pager: true,           // Boolean: Show pager, true or false
                                nav: true,             // Boolean: Show navigation, true or false
                                random: false,          // Boolean: Randomize the order of the slides, true or false
                                pause: true,           // Boolean: Pause on hover, true or false
                                pauseControls: true,    // Boolean: Pause when hovering controls, true or false
                                prevText: "<",   // String: Text for the "previous" button
                                nextText: ">",       // String: Text for the "next" button
                                maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
                                navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                                manualControls: "",     // Selector: Declare custom pager navigation
                                namespace: "rslides",   // String: Change the default namespace used
                                before: function(){},   // Function: Before callback
                                after: function(){}     // Function: After callback
                            });
                        });
                    </script>
                </div>
                <div>
                    <div class="row">
                        <div class="col col-md-4 indexo">
                            <h2><span class="ion-quote"></span> Latest Quote:</h2>
                            <?php
                            require('PHP/config.php');
                            $query = "SELECT * FROM quotes ORDER BY q_id DESC limit 1";
                            $result = mysqli_query($db, $query) or die;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            $q_game = $row['q_game'];
                            $q_name = $row['q_name'];
                            $q_quote = $row['q_quote'];
                            ?>
                                    <blockquote>
                                        <?=$q_quote?>
                                        <cite><?php echo $q_name . " From " . $q_game;?></cite>
                                    </blockquote>
                            <?php }?>
                        </div>
                        <div class="col col-md-4 indexo">
                            <h2><span class="ion-person-stalker"></span> New users:</h2>
                            <?php
                            $query= "SELECT * FROM users ORDER BY user_id DESC limit 5";
                            $result = mysqli_query($db, $query) or die;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $username = $row['user_name'];
                                ?>
                                <h3><a href="profiles.php?user=<?=$username?>"><?=$username?></a></h3>
                            <?php }?>

                        </div>
                        <div class="col col-md-4 indexo">
                            <h2><span class="ion-wand"></span> Latest 3 Articles:</h2>
                            <?php
                            $query = "SELECT * FROM articles ORDER BY a_id DESC limit 3";
                            $result = mysqli_query($db, $query) or die;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $art_id= $row['a_id'];
                                $a_title = $row['a_title'];
                                $a_game = $row['a_game'];
                                $q_time = $row['a_time'];
                                $a_article = $row['a_text'];
                                $user_id = $row['user_id'];
                                ?>
                                <h3><a href="article.php?art=<?=$art_id?>"><?=$a_title?></a></h3>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer" style="position: absolute">
            <div class="container-fluid" style="height: 2px"></div>
            <div class=container>
                <div class="col-md-4">
                    <p>Copyright <span class="fa fa-copyright"></span> 2016 by <a href="http://www.rgu.ac.uk/" target="_blank">Robert Gordon University</a></p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="about.php">About</a><br>
                    <a href="terms.php">Terms</a><br>
                    <a href="choose.php">Themes</a>
                </div>
            </div>
        </div>
</body>
</html>