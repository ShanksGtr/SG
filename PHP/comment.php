<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    echo "<script>alert('Please Login'); location.href='login.php';</script>";
}

    if(isset($_POST['submit'])){
        require('config.php');

        $comment = mysqli_real_escape_string($db, $_POST['comment']);
        $comment = htmlspecialchars($comment);


        $a_id = $_POST['a_id'];
        $user_id = $_SESSION['userid'];

        echo $a_id . "<br>";
        echo $comment . "<br>";
        echo $user_id;

        $sqlinsert = "INSERT INTO comments (comment, a_id, user_id) VALUES
                    ('$comment', '$a_id', '$user_id')";
        if (!mysqli_query($db, $sqlinsert)) {
            echo ("<script>alert('Something went wrong'); location.href='/articles.php?art=$a_id';</script>");
        } else {
            echo "<script>alert('You have commented successfully'); location.href='/articles.php?art=$a_id';</script>";
        }
    }