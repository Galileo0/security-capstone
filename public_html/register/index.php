<?php
error_reporting(E_ALL);
//ini_set('display_errors', 1);
//session_start();

if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['userName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['verificationCode']) && $_POST['verificationCode'] == $_SESSION['VerificationCode']) {
    require_once '../db_connection/connect.php';
    require '../encryption/encryption.php';
    // start encryption  

    $first_name = simple_crypt($_POST['firstName']);
    $last_name = simple_crypt($_POST['lastName']);
    $user_name = simple_crypt($_POST['userName']);
    $email = simple_crypt($_POST['email']);
    $gender = simple_crypt($_POST['gender']);
    

    // end encryption

    // Query
    $sql = "INSERT INTO `users` (`user_first`, `user_last`, `user_name`, `user_email`, `user_pass`, `gender`)"
            . " VALUES ('" . $first_name . "', '" . $last_name . "', '" . $user_name . "', '" . $email
            . "', '" . sha1(md5($_POST['password'])) . "', '" . $gender . "');";

    // End_Query 

    if ($mysqli->query($sql)) {
        header('Location: ../thanks.php');
    } else {
        echo "Error, Try again";
    }
} 
else 
{
    include_once './loginForm.php';
}
?>