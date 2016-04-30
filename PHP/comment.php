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
        /*$sqlinsert = "INSERT INTO comments (a_title, a_game, a_time, a_text, user_id) VALUES
                    ('$a_title', '$a_game', '$time', '$article',  '$user_id')";
        if (!mysqli_query($db, $sqlinsert)) {
            echo ("<script>alert('Quote is already registered'); location.href='addquote.php';</script>");

        } else {
            echo "<script>alert('You are successfully uploaded an article'); location.href='articles.php';</script>";
        } */
    }