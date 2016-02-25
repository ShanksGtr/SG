<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('config.php');

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password = md5($password);

        $sqlget = "SELECT * FROM users WHERE username ='$username'
                                AND password ='$password'";
        $run_user = mysqli_query($db, $sqlget);
        $check_user = mysqli_num_rows($run_user);
        if ($check_user == 1) {
            session_start();
            $_SESSION['username'] = $username;
            header('location:index.html');
        } else {
            echo "<script>alert('Username or Password is incorrect'); location.href='login.html';</script>";
        }
    }
