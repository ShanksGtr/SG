<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('config.php');

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password = md5($password);

        $sqlget = "SELECT * FROM users WHERE user_name ='$username'
                                AND password ='$password'";
        $run_user = mysqli_query($db, $sqlget);
        $check_user = mysqli_num_rows($run_user);
        if ($check_user == 1) {

            session_start();
            $_SESSION['username'] = $username;

            $getid = "SELECT user_id FROM users WHERE user_name = '$username' limit 1";
            $result = mysqli_query($db, $getid);
            $row = mysqli_fetch_object($result);
            $_SESSION['userid'] = $row->user_id;

            header('location:/index.php');

        } else {
            echo "<script>alert('Username or Password is incorrect'); location.href='/login.php';</script>";
        }
        $run_user->close();
        $db->close();
    }
