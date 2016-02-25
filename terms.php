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
                    <li><a href="login.html"><span class="glyphicon glyphicon-log-in" style="font-size:20px; margin-right: 3px"></span>SignIn</a></li>
                    <li><a href="register.php"><span class="glyphicon glyphicon-user" style="font-size:20px; margin-right: 2px"></span>SignUp</a></li>
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
        <div class="col-md-4"><a href="about.php">About</a></div>
    </div>
</div>
</body>
</html>