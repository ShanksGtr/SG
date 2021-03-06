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
    <title>Quotes</title>
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
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SGamers</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="chat.php"><span class="ion-chatbubble-working"></span>Chat</a></li>
                <li><a href="articles.php">Articles<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="quotes.php">Quotes</a></li>
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
    <div class="jumbotron">
        <div class="page-header">
            <?php if ($_SESSION['username'] == true) { ?>
                <h1>Welcome <?php echo $_SESSION['username'] ?> ...</h1>
            <?php } else { ?>
                <h1>VVelcome to SGamers</h1> <?php } ?>
            <?php if ($_SESSION['username'] == true) { ?>
                <a class="btn btn-default btn-lg hidden-xs" style="float: right; margin-top: -48px; font-family: 'Press Start 2P', cursive;" href="addquote.php"  type="submit"><span class="glyphicon glyphicon-plus"></span> Add</a>
                <a class="btn btn-default btn-sm visible-xs-block" style="float: right; margin-top: -80px; font-family: 'Press Start 2P', cursive;" href="addquote.php" type="submit"><span class="glyphicon glyphicon-plus"></span> Add</a>
            <?php } else {
            }?>
        </div>
        <div>
            <div class="textglow2">
                <h2>Video games quotes:</h2>
            </div>
        </div>
        <div>
            <?php
                // Got pagination from:  https://www.youtube.com/watch?v=T2QFNu_mivw
                require('PHP/config.php');
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $query = "SELECT COUNT(q_id) FROM quotes";
                $result = mysqli_query($db, $query) or die;
                $row = mysqli_fetch_row($result);

                // Total of row count
                $rows = $row[0];
                // results each page
                $page_rows = 5;
                // page number of last page
                $last = ceil($rows/$page_rows);
                // $last cannot be less than 1
                if($last <1){
                    $last = 1;
                }
                // page number var
                $pagenum = 1;
                // Get URL
                if(isset($_GET['page'])){
                    $pagenum = preg_replace('#[^0-9]#', '', $_GET['page'] );
                }
                // ensure page number not less than 1 or more than last page
                if ($pagenum <1 ) {
                    $pagenum = 1;
                } elseif ($pagenum > $last) {
                    $pagenum = $last;
                }
                // range of the rows for the chosen page number
                $limit = 'LIMIT ' . ($pagenum - 1) * $page_rows. ',' .$page_rows;
                // Query again, using the limit
                 $query = "SELECT * FROM quotes ORDER BY q_id DESC $limit";
                 $result = mysqli_query($db, $query) or die;

                // Pagination control var
                $paginationcontrol = '';
                // if there is only one page
                if($last != 1) {
                    if($pagenum > 1){
                        $previous = $pagenum -1;
                        $paginationcontrol .= '<a class="btn btn-default" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'"><span class="glyphicon glyphicon-chevron-left"></span></a> &nbsp; &nbsp; ';
                        // clickable number links
                        for($i = $pagenum-4; $i < $pagenum; $i++){
                            if($i > 0){
                                $paginationcontrol .= '<a class="btn btn-default" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
                            }
                        }
                    }
                    // Render the target page number, without it being a link
                    $paginationcontrol .= ''.$pagenum.' &nbsp; ';
                    // Render clickable number links that should appear on the right
                    for($i = $pagenum+1; $i <= $last; $i++){
                        $paginationcontrol .= '<a class="btn btn-default" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
                        if($i >= $pagenum+4){
                            break;
                        }
                    }
                    // This does Next button
                    if ($pagenum != $last){
                        $next = $pagenum +1;
                        $paginationcontrol .= '<a class="btn btn-default" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'"><span class="glyphicon glyphicon-chevron-right"></span></a> &nbsp; ';

                    }
                }

                $list = '';
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $q_game = $row['q_game'];
                    $q_name = $row['q_name'];
                    $q_quote = $row['q_quote'];

            ?>
            <blockquote>
                <?php echo $q_quote;?>
                <cite><?php echo $q_name . " From " . $q_game;?></cite>
            </blockquote>
            <?php } ?>
            <div id="pagecontrol"><?php echo $paginationcontrol;?></div>
        </div>
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