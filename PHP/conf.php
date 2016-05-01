<?php

if(isset($_POST['user'])){
    echo $_POST['user'];

} elseif ($_POST['art']) {
    echo $_POST['art'];

} elseif ($_POST['quote']) {
    echo $_POST['quote'];

} else {
    header('Location:/index');
}

