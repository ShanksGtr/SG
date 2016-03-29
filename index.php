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
                    <?php if ($_SESSION['username'] == true) { ?>
                        <h2>Welcome <?php echo $_SESSION['username'] ?> ...</h2>
                     <?php } else { ?>
                     <h1>Welcome to SGamers</h1> <?php } ?>
                </div>
                <div class="row">
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
                    echo '<div class="row textglow ">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img src="' . $images . '"/>' . '</div>' .
                        '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';
                    }
                    echo '</li>';
                    ?>
                </div>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                <script src="Style/responsiveslides/responsiveslides.min.js"></script>
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
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>