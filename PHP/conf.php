<script>
    var conf = confirm("Are you sure you want to delete?");
    if (conf){

<?php

if(isset($_POST['user'])){

    echo "Yes";
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
        } else {
                location.href='adp.php';
            }
</script>