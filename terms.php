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
    <title>Terms and Conditions</title>
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
        <div class="page-header"> <!-- http://www.ironmountain.com/Utility/Legal/Website-Terms.aspx -->
            <h1><span class="glyphicon glyphicon-tower"></span> The terms and conditions and disclaimer for SGamers website:</h1>
        </div>
            <p>This website is a project honor for my final year as a student in Robert Gordon University. By accessing this website
            you are indicating your acknowledgement and acceptance of these Terms of Use.</p>
            <h3><span class="glyphicon glyphicon-pushpin"></span> Restrictions of Use:</h3>
            <p>- This website is for free for anyone.</p>
            <p>- Any material on this Site is for academic usage.</p>
            <p>- You may download, copy, print from this site since everything is for free and for academic purpose.</p>
            <p>- Anything you write on this website will be on your personal risk !!!!</p>
            <p>- This website will not store any information that has been deleted. So deleting your information will also be deleted forever</p>

                <h3><span class="glyphicon glyphicon-fire"></span> Users on the site must not:</h3>
                <p>1. Monitor, gather or copy any Content on this Site by using any robot, “bot,” spider, crawler, spyware, engine, device, software, extraction tool or any other automatic device, utility or manual process of any kind.</p>
                <p>2. Engage in any activities through or in connection with this Site that seek to attempt to harm minors or are unlawful, offensive, obscene, threatening, harassing, abusive or that violate any right of any third party.</p>
                <p>3. Attempt to circumvent the security systems of the Site.</p>
                <p>4. Attempt to gain unauthorized access to services, materials, other accounts is prohibited.</p>
                <p>5. Upload or submit any data or information that contains viruses or any other computer code, corrupt files or programs designed to interrupt, destroy or limit the functionality or disrupt any software, hardware, telecommunications, networks, servers or other equipment.</p>
                <p>6. Engage in any activity that interferes with a user’s access to this Site or the proper operation of this Site. You also agree that, in using this Site, you will not impersonate any person or entity.</p>

            <h3><span class="glyphicon glyphicon-pushpin"></span> Disclaimer:</h3>
                <p>Sgamers cannot guarantee that the Site or its content is error free and Sgamers makes no representations about the technical accuracy or functionality of the Site or that the Content is accurate, error free or up to date.</p>
                    <p>THIS SITE IS PROVIDED BY SGAMERS ON AN “AS IS” AND “AS AVAILABLE” BASIS. SGAMERS MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, OR NON-INFRINGEMENT OF THIRD-PARTY RIGHTS OR INTELLECTUAL PROPERTY. YOU EXPRESSLY AGREE THAT YOUR USE OF THIS SITE IS AT YOUR SOLE RISK.
                    SGAMERS DOES NOT WARRANT THAT THE INFORMATION IN THIS SITE IS ACCURATE, RELIABLE, UP TO DATE OR CORRECT,
                    THAT THIS SITE WILL BE AVAILABLE AT ANY PARTICULAR TIME OR LOCATION OR THAT THE SITE IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.
                    THE CONTENT MAY INCLUDE TECHNICAL INACCURACIES OR TYPOGRAPHICAL ERRORS, AND SGAMERS MAY MAKE CHANGES OR IMPROVEMENTS AT ANY TIME. YOU,
                    AND NOT SGAMERS, ASSUME THE ENTIRE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION IN THE EVENT OF ANY LOSS OR DAMAGE ARISING FROM THE USE OF THIS SITE OR ITS CONTENT.
                    SGAMERS MAKES NO WARRANTIES THAT YOUR USE OF THE CONTENT WILL NOT INFRINGE THE RIGHTS OF OTHERS AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ERRORS OR OMISSIONS IN SUCH CONTENT.</p>

            <h3><span class="glyphicon glyphicon-pushpin"></span>Govering Law:</h3>
                <p>You agree that your use of this Site,
                    this Agreement and any disputes relating thereto shall be governed in all respects by the laws of the UNITED KINGDOM.
                    Any dispute relating to this Agreement shall be resolved solely in the state or federal courts.</p>
            <h3><span class="ion-happy"></span>Cookies:</h3>
                <p>SGamers does not use any sort of cookies so far, a notification will be made if any used</p>
    </div>
</div>

<div class="footer">
    <div class="container-fluid" style="height: 2px"></div>
    <div class=container>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <p>Copyright <span class="fa fa-copyright"></span> 2016 by <a href="http://www.rgu.ac.uk/" target="_blank">Robert Gordon University</a></p>
        </div>
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