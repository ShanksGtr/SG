<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='login.php';</script>";
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
        die ("<script>alert('Sorry, only JPG, JPEG & PNG  files are allowed'); location.href='/profile.php';</script>");
    }

    if(($filesize > 1000000)) {
        die ("<script>alert('File is more than 1mb'); location.href='/profile.php';</script>");
    }

    if(!$uploadtmp) {
        die ("<script>alert('No file selected'); location.href='/profile.php';</script>");

    }else{
        move_uploaded_file($uploadtmp, "" . $uploadname);

        require('config.php');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $userid = $_SESSION['userid'];
        $sqlinsert= "UPDATE profiles SET avatar='$uploadname' WHERE user_id='$userid'";
        $result = mysqli_query($db, $sqlinsert);
       // echo "<script>alert('Upload successfully'); location.href='/profile.php';</script>";
        echo  '<img src="'.$uploadname.'"/>' . "<br>";
        echo $uploadtmp;

    }
}


