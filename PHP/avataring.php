<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='login.php';</script>";
}




// https://www.youtube.com/watch?v=wEmxwNLjf_c  && http://www.w3schools.com/php/php_file_upload.asp
/*if(isset($_FILES['fileToUpload'])){

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
        require('config.php');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        move_uploaded_file($uploadtmp, "" . $uploadname);
        $userid = $_SESSION['userid'];
        $sqlinsert= "UPDATE profiles SET avatar='$uploadname' WHERE user_id='$userid'";
        $result = mysqli_query($db, $sqlinsert);
        echo "<script>alert('Upload successfully'); location.href='profile.php';</script>";
        //echo  '<img src="'.$uploadname.'"/>' . "<br>";


    }
}*/

$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            echo $imageFileType . "<br>";
            echo $target_file  . "<br>";
            echo $target_dir  . "<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
