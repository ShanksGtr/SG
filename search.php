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
    <title>Search</title>
    <!-- Free icon from http://findicons.com/icon/115500/input_gaming -->
    <link rel="icon" type="image/png" href="Pictures/input_gaming.ico" sizes="32x32"/>
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
                <li class="active"><a href="search.php"><span class="glyphicon glyphicon-search" style="font-size:20px; margin-right: 2px"></span></a></li>
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
            <h1>Search: </h1>
        </div>
        <div>
            <form action="search.php" method="post">
                <p><input type="text" class="form-control" required="required" maxlength="50" placeholder="Search using Articles, Quotes and Users" name="search"></p>
                <select class="form-control" name="select">
                    <option>Users</option>
                    <option>Articles</option>
                    <option>Quotes</option>
                </select><br>
                <button class="btn btn-primary btn-lg" type="submit" value="submit" name="submit">Search</button>
            </form>
        </div><br>
        <div>
            <h2>Results: </h2>
        <?php
        require('PHP/config.php');
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $search = mysqli_real_escape_string($db, $search);
                $search = htmlspecialchars($search);

                $select = $_POST['select'];

                if($select == 'Users'){
                    $query = "SELECT user_name FROM users WHERE user_name LIKE '%$search%' ORDER BY user_name";
                    $result = mysqli_query($db, $query) or die;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                        <div>
                            <h3><a style="color: silver;" href="profiles.php?user=<?=$row['user_name'];?>"><?=$row['user_name'];?></a></h3>
                        </div>
                   <?php  } $result->close();
                } elseif ($select == 'Articles'){
                    $query = "SELECT a_title, a_id FROM articles WHERE a_title LIKE'%$search%'";
                    $result = mysqli_query($db, $query) or die;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                        <div>
                            <h3><a style="color: silver;" href="article.php?art=<?=$row['a_id'];?>"><?=$row['a_title'];?></a></h3>
                        </div>
                   <?php  } $result->close();
                } elseif ($select == 'Quotes'){
                    $query = "SELECT * FROM quotes WHERE q_quote LIKE '%$search%'";
                    $result = mysqli_query($db, $query) or die;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                    <div>
                        <blockquote>
                            <?php echo $row['q_quote'];?>
                            <cite><?php echo $row['q_name'] . " From " . $row['q_game'];?></cite>
                        </blockquote>
                    </div>

                   <?php } $result->close();
                }
            }
        $db->close();
        ?>
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
    @media all and (max-width: 970px) and (min-width: 100px) {
        .footer {
            position: absolute;
        }
    }
</style>
</body>
</html>