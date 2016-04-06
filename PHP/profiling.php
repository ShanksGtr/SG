<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='login.php';</script>";
}
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('config.php');


    if (isset($_POST['submit'])) {
        $status = $_POST['status'];
        $about_me = $_POST['about_me'];
        $age = $_POST['age'];
        //$avatar = $_FILES['avatar'];
        $gender = $_POST['gender'];

        $fav_games = $_POST['fav_games'];
        $skype = $_POST['skype'];
        $msn = $_POST['msn'];
        $instagram = $_POST['instagram'];
        $youtube = $_POST['youtube'];

        $steam = $_POST['steam'];
        $twitch = $_POST['twitch'];
        $psn = $_POST['psn'];
        $xbox = $_POST['xbox'];
        $user_id = $_SESSION['userid'];
        /*echo $status, $about_me, $birthday, $gender, $fav_games, $skype, $msn, $instagram, $youtube, $steam, $twitch, $psn, $xbox, $user_id;*/

        $list_query = "SELECT * FROM profiles WHERE user_id ='$user_id'";
        $run_query = $db->query($list_query);
        $check_user = mysqli_num_rows($run_query);
            if ($check_user == 1) {
                //$list_query = "UPDATE profiles SET  WHERE user_name ='{$_SESSION['userid']}'";
                $listI_query = "UPDATE profiles SET status='$status', about_me='$about_me', age='$age', gender='$gender', fav_games='$fav_games', skype='$skype', msn='$msn',
                instagram='$instagram', youtube='$youtube', steam='$steam', twitch='$twitch', psn='$psn', xbox='$xbox', user_id='$user_id' WHERE user_id='$user_id'";

                $run_queryI = $db->query($listI_query);
                if ($run_queryI == true) {
                    echo "<script>alert('Profile updated!'); location.href='/profile.php';</script>";
                }

            } elseif ($check_user == 0) {

                echo "<script>alert('Somthing went wrong'); location.href='/profile.php';</script>";
            }
    }



// https://www.youtube.com/watch?v=wEmxwNLjf_c  && http://www.w3schools.com/php/php_file_upload.asp
if(isset($_FILES['fileToUpload'])){

    $uploadname = $_FILES['fileToUpload']['name'];
    $uploadname = mt_rand(10000, 99999).$uploadname;
    $uploadtmp = $_FILES['fileToUpload']['tmp_name'];
    $uploadtype = $_FILES['fileToUpload']['type'];
    $filesize = $_FILES['fileToUpload']['size'];
    // incase there's a space in the name or so
    $uploadname = preg_replace("#[^a-z0-9.]#i", "", $uploadname);

    $imageFileType = pathinfo($uploadname,PATHINFO_EXTENSION);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "<script>alert('Sorry, only JPG, JPEG & PNG  files are allowed'); location.href='/profile.php';</script>";
    }

    if(($filesize > 1000000)) {
        echo "<script>alert('File is more than 1mb'); location.href='/profile.php';</script>";
    }

    if(!$uploadtmp) {
        echo "<script>alert('No file selected'); location.href='/profile.php';</script>";

    }else{
        move_uploaded_file($uploadtmp, "" . $uploadname);
        $userid = $_SESSION['userid'];
        $sqlinsert= "UPDATE profiles SET avatar='$uploadname' WHERE user_id='$userid'";
        $result = mysqli_query($db, $sqlinsert);
        echo "<script>alert('Upload successfully'); location.href='profile.php';</script>";
        //echo  '<img src="'.$uploadname.'"/>' . "<br>";


    }
}