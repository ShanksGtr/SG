<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    die("<script>alert('Please Login'); location.href='/login.php';</script>");
}


require('config.php');

if(isset($_POST['user'])){

    $user_id = $_POST['user'];
    $del = "DELETE FROM users WHERE user_id='$user_id'";
    $run = $db->query($del);
    if ($run){
       echo "<script>alert('User Deleted'); location.href='adp.php';</script>";
    } else {
        echo "<script>alert('Something went wrong'); location.href='adp.php';</script>";
    }

} elseif ($_POST['art']) {
    $art_id = $_POST['art'];
    $del = "DELETE FROM articles WHERE a_id='$art_id'";
    $run = $db->query($del);
    if ($run){
        echo "<script>alert('Article Deleted'); location.href='adp.php';</script>";
    } else {
        echo "<script>alert('Something went wrong'); location.href='adp.php';</script>";
    }

} elseif ($_POST['quote']) {
    $q_id = $_POST['quote'];
    $del = "DELETE FROM quotes WHERE q_id='$q_id'";
    $run = $db->query($del);
    if ($run){
        echo "<script>alert('Quote Deleted'); location.href='adp.php';</script>";
    } else {
        echo "<script>alert('Something went wrong'); location.href='adp.php';</script>";
    }

} elseif($_POST['update']) {
    $user_id = $_POST['user'];
    $role = $_POST['select'];
    echo $user_id . " " . $role;
} else {
    header('Location:/index.php');
    }

