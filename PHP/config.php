<?php
$db = new mysqli("eu-cdbr-azure-north-d.cloudapp.net",
    "be56106772d6a4", "33eeb80a", "SGamers" );

if ($db->connect_error){
    die('Connectfailed'['.$db->connect_error.']);
}

