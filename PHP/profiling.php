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


        $list_query = "SELECT * FROM profiles WHERE user_name ='{$_SESSION['username']}'";
        $run_query = $db->query($list_query);
        $check_user = mysqli_num_rows($run_query);
            if ($check_user == 1) {
                $list_query = "SELECT * FROM profiles WHERE user_name ='{$_SESSION['username']}'";


            } elseif ($check_user == 0) {
                $list_query = "INSERT INTO profiles WHERE user_name ='{$_SESSION['username']}'";


            }
    }
