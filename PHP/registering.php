<?php
    require('config.php');

    if (isset($_POST['submit'])) {
        include('$db');
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $sqlinsert = "INSERT INTO users (user_name, email, password) VALUES
            ('$username', '$email', '$password')";
        if (!mysqli_query($db, $sqlinsert)) {
            echo "<script>alert('Username or Email has been used already'); location.href='Register.php';</script>";
        }
        $newrecord = "You're successfully registered";
    }
?>
