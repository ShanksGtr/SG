
<?php

if(isset($_POST['user'])){

   $user_id = $_POST['user'];
    $del = "DELETE FROM users WHERE user_id='$user_id'";
    $run = $db->query($del);
    if ($run){

    }
} elseif ($_POST['art']) {
    $art_id = $_POST['art'];


} elseif ($_POST['quote']) {
    $q_id = $_POST['quote'];


} else {
    header('Location:/index');
}

