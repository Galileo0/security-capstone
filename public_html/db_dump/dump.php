<?php

error_reporting(E_ALL);
//ini_set('display_errors', 1);

require ('../db_connection/connect.php');
require '../encryption/encryption.php';

$user = $_SESSION['u_id'];
//echo $user;
if($user == "")
{
    //echo $user;
    header("Location: ../login");
}

echo "<br><a href='../index.php'>Back To Home</a><br>";

echo "------- Users -------- <br>";
$result = $mysqli->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) 
 { 
    echo $row["user_name"];
    
    echo '<br>';
 }
 echo '-------------Decrypting---------';
 echo '<br>';
 $result = $mysqli->query("SELECT * FROM users");
 while ($row = $result->fetch_assoc()) 
 {
     // decrypt User names 
     $user_name_dump = $row['user_name'];
     $user_pass = $row['user_pass'];
     $first_name_dump = $row['user_first'];
     $last_name_dump = $row['user_last'];
     $user_email_dump = $row['user_email'];
     $dec_user_name = simple_crypt($user_name_dump,'d');
     $dec_user_pass = simple_crypt($user_pass,'d');
     $dec_first =  simple_crypt($first_name_dump,'d');
     $dec_last = simple_crypt($last_name_dump,'d');
     $dec_email = simple_crypt($user_email_dump,'d');
     echo $dec_user_name . ' -> '.$dec_first.' -> '.$dec_last.' -> '.$dec_email; 
     echo '<br>';
    
 }
 
 echo '<br>';
 echo '------------- messages ---------';
 echo '<br>';
 
 $result = $mysqli->query("SELECT * FROM messages");
while ($row = $result->fetch_assoc()) 
 { 
    echo $row["sender"] ."->". $row["subject"]."->".$row["message"];
    
    echo '<br>';
 }
 echo '-------------Decrypting---------';
 echo '<br>';
 $result = $mysqli->query("SELECT * FROM messages");
 while ($row = $result->fetch_assoc()) 
 {
     // decrypt User names 
     $sender = $row['sender'];
     $subject = $row['subject'];
     $message = $row['message'];
     
     $sender_d = simple_crypt($sender,'d');
     $subject_d = simple_crypt($subject,'d');
     $message_d = simple_crypt($message,'d');
     
     echo $sender_d . ' -> '.$sender_d.' -> '.$message_d; 
     echo '<br>';
    
 }
 
 echo "<br><a href='../index.php'>Back To Home</a>";
 
?>
