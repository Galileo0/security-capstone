<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
    include "init.php";
if(isset($_POST['sendmsg'])){
    if(saveMsg($_POST)){
        header("Location: thanks.php");
    }else{
        header("Location: index.php?contactError#contact");
    }
}