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
        $status = mysqli_real_escape_string($db, $status);
        $status = htmlspecialchars($status);

        $about_me = $_POST['about_me'];
        $about_me = mysqli_real_escape_string($db, $about_me);
        $about_me = htmlspecialchars($about_me);

        $age = $_POST['age'];
        //$avatar = $_FILES['avatar'];
        $gender = $_POST['gender'];

        $fav_games = $_POST['fav_games'];
        $fav_games = mysqli_real_escape_string($db, $fav_games);
        $fav_games = htmlspecialchars($fav_games);

        $skype = $_POST['skype'];
        $skype = htmlspecialchars($skype);

        $msn = $_POST['msn'];
        $msn = htmlspecialchars($msn);

        $instagram = $_POST['instagram'];
        $instagram = htmlspecialchars($instagram);

        $youtube = $_POST['youtube'];
        $youtube = htmlspecialchars($youtube);

        $steam = $_POST['steam'];
        $steam = htmlspecialchars($steam);

        $twitch = $_POST['twitch'];
        $twitch = htmlspecialchars($twitch);

        $psn = $_POST['psn'];
        $psn = htmlspecialchars($psn);

        $xbox = $_POST['xbox'];
        $xbox = htmlspecialchars($xbox);

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



