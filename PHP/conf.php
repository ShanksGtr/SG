
<?php

if(isset($_POST['user'])){
    $user_id = $_POST['user'];
    echo $confirm = "<script>confirm('Are you sure you want to delete this User ID: $user_id?');</script>";
    if ($confirm == true) {
        echo "YES";
    } else {
        echo "else";
    }
   // //$user_id = $_POST['user'];
  //  $del = "DELETE FROM users WHERE user_id='$user_id'";
   // $run = $db->query($del);
   // if ($run){

  //  }
} elseif ($_POST['art']) {
    $art_id = $_POST['art'];


} elseif ($_POST['quote']) {
    $q_id = $_POST['quote'];


} else {
    header('Location:/index');
}
?>
