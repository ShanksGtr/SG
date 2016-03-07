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
        $about_me = $_POST['about_me'];
        $birthday = $_POST['birthday'];
        //$avatar = $_FILES['avatar'];
        $gender = $_POST['gender'];

        $fav_games = $_POST['fav_games'];
        $skype = $_POST['skype'];
        $msn = $_POST['msn'];
        $instagram = $_POST['instagram'];
        $youtube = $_POST['youtube'];

        $steam = $_POST['steam'];
        $twitch = $_POST['twitch'];
        $psn = $_POST['psn'];
        $xbox = $_POST['xbox'];
        $user_id = $_SESSION['userid'];
        /*echo $status, $about_me, $birthday, $gender, $fav_games, $skype, $msn, $instagram, $youtube, $steam, $twitch, $psn, $xbox, $user_id;*/

        $list_query = "SELECT * FROM profiles WHERE user_id ='$user_id'";
        $run_query = $db->query($list_query);
        $check_user = mysqli_num_rows($run_query);
            if ($check_user == 1) {
                //$list_query = "UPDATE profiles SET  WHERE user_name ='{$_SESSION['userid']}'";
                echo "<script>alert('COOL'); location.href='/profile.php';</script>";

            } elseif ($check_user == 0) {
                $listI_query = "INSERT INTO profiles (status, about_me, birthday, gender, fav_games, skype, msn, instagram, youtube, steam, twitch, psn, xbox, user_id)
                                          VALUES ('$status', '$about_me', '$birthday', '$gender', '$fav_games', '$skype', '$msn', '$instagram', '$youtube',
                                           '$steam', '$twitch', '$psn', '$xbox', '$user_id') ";

                $run_queryI = $db->query($listI_query);
                if ($run_queryI == true) {
                    echo "<script>alert('Profile updated!'); location.href='/profile.php';</script>";
                }

            }
    }