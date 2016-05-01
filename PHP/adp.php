<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
     die("<script>alert('Please Login'); location.href='/login.php';</script>");
}

require('config.php');
$username = $_SESSION['username'];
    $getid = "SELECT role FROM users WHERE user_name = '$username' limit 1";
    $result = mysqli_query($db, $getid) or die;
    $row = mysqli_fetch_object($result);
    $role = $row->role;

    if($role == 'user'){
        die("<script>location.href='/index.php';</script>");
    } elseif ($role == 'admin'){

    } else {
        die("<script>location.href='/index.php';</script>");
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- For Mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <!-- Free icon from http://findicons.com/icon/115500/input_gaming -->
    <link rel="icon" type="image/png" href="/Pictures/input_gaming.ico" sizes="32x32"/>
    <!-- Bootstrap CSS,JQ&JS Libraries-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Style/SG.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Glyphicons from http://fortawesome.github.io/Font-Awesome/get-started/ && http://ionicons.com/ && http://zurb.com/playground/foundation-icon-fonts-3/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/Style/foundation-icons/foundation-icons.css">
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
            <a class="navbar-brand" href="/index.php">SGamers</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/chat.php"><span class="ion-chatbubble-working"></span>Chat</a></li>
                <li><a href="/articles.php">Articles<span class="sr-only">(current)</span></a></li>
                <li><a href="/quotes.php">Quotes</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">UpcomingGames<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/upcoming.php?plat=ps3">Playstation 3</a></li>
                        <li><a href="/upcoming.php?plat=ps4">Playstation 4</a></li>
                        <li><a href="/upcoming.php?plat=vita">Playstation Vita</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/upcoming.php?plat=xbox">Xbox One</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/upcoming.php?plat=wii">Wii U</a></li>
                        <li><a href="/upcoming.php?plat=3ds">3DS</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/upcoming.php?plat=pc">PC</a></li>
                    </ul>
                </li>
                <li><a href="/search.php"><span class="glyphicon glyphicon-search" style="font-size:20px; margin-right: 2px"></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($_SESSION['username'] == true) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" style="font-size: 20px;"></span><?php echo substr($_SESSION['username'], 0 , 9);?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile.php"><span class="glyphicon glyphicon-edit" style="font-size:20px; margin-right: 2px"></span>MyProfile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="font-size:20px; margin-right: 3px"></span>Logoff</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in" style="margin-right: 7px; font-size: 20px;"></span>SignIn/Up<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/login.php"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
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
            <h1>Admin Panel: </h1>
        </div>
        <div>
            <form action="adp.php" method="post">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-default" name="user">Users</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-default" name="articles">Articles</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-default" name="quotes">Quotes</button>
                    </div>
                </div>
            </form><br>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <!-- How to confirm before proceed with the delete: http://stackoverflow.com/questions/20899490/javascript-confirm-box-inside-php-echo-function -->
                    <?php
                    if(isset($_POST['user'])) {
                        ?> <tr>
                            <th><b><u>User ID:</u></b></th>
                            <th><b><u>User Name:</u></b></th>
                            <th><b><u>Email:</u></b></th>
                            <th><b><u>Registered Date:</u></b></th>
                            <th><b><u>Role:</u></b></th>
                            <th><b><u>Action:</u></b></th>
                        </tr> <?php
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($db, $query) or die;
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $user_id = $row['user_id'];
                        $username = $row['user_name'];
                        $email = $row['email'];
                        $reg_date = $row['reg_date'];
                        $role = $row['role'];

                    ?>
                    <tr>
                        <td><?=$user_id?></td>
                        <td><?=$username?></td>
                        <td><?=$email?></td>
                        <td><?=$reg_date?></td>
                        <td><?=$role?></td>
                        <td><form action="conf.php" method="post">
                            <button type="submit" class="btn btn-primary" value="<?=$user_id?>" name="user" onclick="return confirm('Are you sure you want to delete?');">Delete</button><br>
                                <select class="form-control" name="select">
                                    <option>admin</option>
                                    <option>super</option>
                                    <option>user</option>
                                </select>
                            <button type="submit" class="btn btn-primary" value="<?=$user_id?>" name="update" onclick="return confirm('Are you sure you want to update?');">Update</button>
                        </form></td>
                    </tr>
                    <?php } } ?>

                    <?php
                    if(isset($_POST['articles'])) {
                        ?> <tr>
                            <th><b><u>Article ID:</u></b></th>
                            <th><b><u>Article Title:</u></b></th>
                            <th><b><u>Article Game:</u></b></th>
                            <th><b><u>Article Date:</u></b></th>
                            <th><b><u>Article:</u></b></th>
                            <th><b><u>User ID:</u></b></th>
                            <th><b><u>Action:</u></b></th>
                        </tr> <?php
                        $query = "SELECT * FROM articles";
                        $result = mysqli_query($db, $query) or die;
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $art_id = $row['a_id'];
                            $art_title = $row['a_title'];
                            $art_game = $row['a_game'];
                            $art_date = $row['a_time'];
                            $art = $row['a_text'];
                            $user_id = $row['user_id'];

                            ?>
                            <tr>
                                <td><?=$art_id?></td>
                                <td><?=$art_title?></td>
                                <td><?=$art_game?></td>
                                <td><?=$art_date?></td>
                                <td><?=$art?></td>
                                <td><?=$user_id?></td>
                                <td><form action="conf.php" method="post">
                                        <button type="submit" class="btn btn-primary" value="<?=$art_id?>" name="art" onclick="return confirm('Are you sure you want to delete?');">Delete</button>
                                    </form></td>
                            </tr>
                        <?php } } ?>

                        <?php
                        if(isset($_POST['quotes'])) {
                            ?> <tr>
                                <th><b><u>Quote ID:</u></b></th>
                                <th><b><u>Character Name:</u></b></th>
                                <th><b><u>Quote Game:</u></b></th>
                                <th><b><u>Quote:</u></b></th>
                                <th><b><u>User ID:</u></b></th>
                                <th><b><u>Action:</u></b></th>
                            </tr> <?php
                            $query = "SELECT * FROM quotes";
                            $result = mysqli_query($db, $query) or die;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $q_id = $row['q_id'];
                                $q_name = $row['q_name'];
                                $q_game = $row['q_game'];
                                $quote = $row['q_quote'];
                                $user_id = $row['user_id'];

                                ?>
                                <tr>
                                    <td><?=$q_id?></td>
                                    <td><?=$q_name?></td>
                                    <td><?=$q_game?></td>
                                    <td><?=$quote?></td>
                                    <td><?=$user_id?></td>
                                    <td><form action="conf.php" method="post">
                                            <button type="submit" class="btn btn-primary" value="<?=$q_id?>" name="quote" onclick="return confirm('Are you sure you want to delete?');">Delete</button>
                                        </form></td>
                                </tr>
                            <?php } } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container-fluid" style="height: 2px"></div>
    <div class=container>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="/about.php">About</a><br>
            <a href="/terms.php">Terms</a><br>
            <a href="/choose.php">Themes</a>
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