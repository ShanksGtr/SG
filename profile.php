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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($_SESSION['username'] == true) { ?>
                            <li><a href="PHP/logout.php"><span class="glyphicon glyphicon-log-out" style="font-size:20px; margin-right: 3px"></span>Logoff</a></li>
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>MyProfile</a></li>
                        <?php } else { ?>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                            <li><a href="register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
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
                        <h2>Welcome <?php echo $_SESSION['username']; ?>...</h2>
                    <?php } else { ?>
                        <h1>Welcome to SGamers</h1> <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-9" style="border-right: 1px solid silver;">
                        <p>djafjdpoiajpfidjmpfijmapsdjmpifjmapsjmdpfjajsfapiajspoifjapisjfmpoiajmspofiajfpoijaijfpiajspimfjmsapifjpiajmspifjmpiajmspifjapisjmfpiajmspifjmapisjmfpisajmpifsaj</p>
                    </div>
                    <div class="col-sm-3">
                        <p>hello there</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container-fluid" style="height: 2px"></div>
            <div class=container>
                <div class="row">
                    <div class="col-sm-4">
                        <p>Choose your Theme!</p>
                        <button onclick="swapStyleSheet('Style/SG.css')">Dark Blue</button>
                        <button onclick="swapStyleSheet('Style/BR.css')">Dark Red</button>
                        <button onclick="swapStyleSheet('Style/BG.css')">Dark Green</button>
                        <button onclick="swapStyleSheet('Style/WB.css')">White Blue</button>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <a href="about.php">About</a><br>
                        <a href="terms.php">Terms</a>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </html>