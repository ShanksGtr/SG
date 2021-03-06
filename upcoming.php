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
    <title><?=$_GET['plat']?> Upcoming games</title>
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
                <li class="active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">UpcomingGames<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if ($_GET['plat'] == "ps3") { ?>
                            <li class="active"><a href="upcoming.php?plat=ps3">Playstation 3</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=ps3">Playstation 3</a></li>
                        <?php } ?>
                        <?php if ($_GET['plat'] == "ps4") { ?>
                            <li class="active"><a href="upcoming.php?plat=ps4">Playstation 4</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=ps4">Playstation 4</a></li>
                        <?php } ?>
                        <?php if ($_GET['plat'] == "vita") { ?>
                            <li class="active"><a href="upcoming.php?plat=vita">Playstation Vita</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=vita">Playstation Vita</a></li>
                        <?php } ?>
                        <li role="separator" class="divider"></li>
                        <?php if ($_GET['plat'] == "xbox") { ?>
                            <li class="active"><a href="upcoming.php?plat=xbox">Xbox One</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=xbox">Xbox one</a></li>
                        <?php } ?>
                        <li role="separator" class="divider"></li>
                        <?php if ($_GET['plat'] == "wii") { ?>
                            <li class="active"><a href="upcoming.php?plat=wii">Wii U</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=wii">Wii U</a></li>
                        <?php } ?>
                        <?php if ($_GET['plat'] == "3ds") { ?>
                            <li class="active"><a href="upcoming.php?plat=3ds">3DS</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=3ds">3DS</a></li>
                        <?php } ?>
                        <li role="separator" class="divider"></li>
                        <?php if ($_GET['plat'] == "pc") { ?>
                            <li class="active"><a href="upcoming.php?plat=pc">PC</a></li>
                        <?php } else { ?>
                            <li><a href="upcoming.php?plat=pc">PC</a></li>
                        <?php } ?>
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
    <div class="jumbotron">
        <div class="page-header">
            <?php if ($_GET['plat'] == 'ps3') {
                echo "<h1>" . "Playstation 3:" . "<h1>";
            } elseif ($_GET['plat'] == 'ps4') {
                echo "<h1>" . "Playstation 4:" . "<h1>";
            } elseif ($_GET['plat'] == 'vita') {
                echo "<h1>" . "Playstation Vita:" . "<h1>";
            } elseif ($_GET['plat'] == 'xbox') {
                echo "<h1>" . "Xbox One:" . "<h1>";
            } elseif ($_GET['plat'] == 'wii') {
                echo "<h1>" . "Wii U:" . "<h1>";
            } elseif ($_GET['plat'] == '3ds') {
                echo "<h1>" . "Nintendo 3DS:" . "<h1>";
            } elseif ($_GET['plat'] == 'pc') {
                echo "<h1>" . "PC:" . "<h1>";
            }
            ?>
        </div>
                <?php
                include('simple_html_dom.php');
                    if ($_GET['plat'] == "ps3") {
                    $html = file_get_html('http://www.videogamecountdown.com/coming-soon/PlayStation-3');
                    $games = $html->find('div[class=inner]');
                    $games = array($games[0], $games[1], $games[3], $games[4], $games[5]);
                    foreach ($games as $game) {

                        $titles = $game->find('h3 a', 0)->plaintext;
                        $images = $game->find('div[class=gridimg] img',0)->attr['src'];
                        $info = $game->find('div[class=gridimg] a',0)->attr['href'];
                        $date = $game->find('div[class=date] span', 0)->outertext;
                        $html = file_get_html('http://www.videogamecountdown.com/'.$info);
                        $desc = $html->find('div[class=two_third]', 0)->innertext;
                        $details = $html->find('div[class="one_third last projectdetails"]', 0)->outertext;
                        $amazon = $html->find('div[class=pagerwrapper] a', -1)->outertext;
                        //$titles = $game->find('h3', 0);

                        echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image" src="' . $images . '"/>' . '</div>' .
                            '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';
                    }

                        } elseif ($_GET['plat'] == "ps4") {
                            $html = file_get_html('http://www.videogamecountdown.com/coming-soon/PlayStation-4');
                            $games = $html->find('div[class=inner]');
                            $games = array($games[0], $games[1], $games[3], $games[4], $games[5]);
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

                                echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                                    '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';
                            }
                            } elseif ($_GET['plat'] == "vita") {
                                $html = file_get_html('http://www.videogamecountdown.com/coming-soon/PlayStation-Vita');
                                $games = $html->find('div[class=inner]');
                                $games = array($games[0], $games[1], $games[3], $games[4], $games[5]);
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

                                    echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                                        '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';
                                }

                         } elseif ($_GET['plat'] == "xbox") {
                        $html = file_get_html('http://www.videogamecountdown.com/coming-soon/Xbox-One');
                        $games = $html->find('div[class=inner]');
                        $games = array($games[0], $games[1], $games[3], $games[4], $games[5]);
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

                            echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                                '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';

                        }} elseif ($_GET['plat'] == "wii") {
                            $html = file_get_html('http://www.videogamecountdown.com/coming-soon/Nintendo-Wii-U');
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

                                echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                                    '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';

                            }
                            } elseif ($_GET['plat'] == "3ds") {
                                $html = file_get_html('http://www.videogamecountdown.com/coming-soon/Nintendo-3DS');
                                $games = $html->find('div[class=inner]');
                                $games = array($games[0], $games[1], $games[3], $games[4], $games[5]);
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

                                    echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                                        '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';
                                }

                    } elseif ($_GET['plat'] == "pc") {
                            $html = file_get_html('http://www.videogamecountdown.com/coming-soon/Windows');
                            $games = $html->find('div[class=inner]');
                            $games= array($games[0], $games[1], $games[3], $games[4], $games[5]);
                            foreach ($games as $game) {

                                $titles = $game->find('h3 a', 0)->plaintext;
                                $images = $game->find('div[class=gridimg] img',0)->attr['src'];
                                $info = $game->find('div[class=gridimg] a',0)->attr['href'];
                                $date = $game->find('div[class=date] span', 0)->outertext;
                                $html = file_get_html('http://www.videogamecountdown.com/'.$info);
                                $desc = $html->find('div[class=two_third]', 0)->innertext;
                                $details = $html->find('div[class="one_third last projectdetails"]', 0)->outertext;
                                $amazon = $html->find('div[class=pagerwrapper] a', -1)->outertext;
                                //$titles = $game->find('h3', 0);

                                echo '<div class="row textglow">' . '<div class="col col-md-6">' . "<h2>" . $titles . "</h2>" . '<img alt="Game image"  src="' . $images . '"/>' . '</div>' .
                                    '<div class="col col-md-6">' . $desc . "<br>" . "<p>Upcoming in: " . $date . "</p>" . "<br>" . $details . "<br>" . $amazon . '</div>' . '</div>';

                            }} else {
                                    header('location:/index.php');
                                }

                            ?>

            </div>
        </div>
<div class="footer">
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
<style>
    @media all and (max-width: 699px) and (min-width: 100px) {
       .footer {
           position: absolute;
       }
    }
</style>
</body>
</html>