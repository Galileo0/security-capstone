<?php
error_reporting(E_ALL);
//ini_set('display_errors', 1);

//db_connect
$sql_user = 'id9200556_galilio';
$pass = '$ilent%%cyberG';
$mysqli = new mysqli("localhost", $sql_user ,$pass, "id9200556_capstone_messages_system");

//db_check errors
if(mysqli_connect_errno())
{
    echo mysqli_connect_error(); 
}





?>