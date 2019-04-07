<?php
error_reporting(E_ALL);
//ini_set('display_errors', 1);
//session_start();
//include_once 'dbh.inc.php';
require_once '../db_connection/connect.php';
require '../encryption/encryption.php';
if (isset($_POST['login'])) {

        $uid = mysqli_real_escape_string($mysqli, $_POST['user_uid']);
        $pwd = mysqli_real_escape_string($mysqli, $_POST['user_pass']);
        $enc_user_id = simple_crypt($uid);
        $hash_pwd = sha1(md5($pwd));
        


if (empty($uid) || empty($pwd)) {


}else {
  $sql = "SELECT * FROM users WHERE user_name ='$enc_user_id'";
$result = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck < 1) {

  header("Location: ../login");
  exit();
}else {
  if ($row = mysqli_fetch_assoc($result)) {
    $hashedPwdCheck = password_verify($pwd, $row['user_pass']);
    if($hash_pwd==$row['user_pass'])
    {
      //session_start();
      $_SESSION['u_id'] = $row['id'];
      $_SESSION['u_first'] = $row['user_first'];
      $_SESSION['u_last'] = $row['user_last'];
      $_SESSION['u_uid'] = $row['user_uid'];
      header("Location: ../thanks_login.php");
    }
    else
    {
      $loc = 'Location: ../login';
      header($loc);
      exit();
    }
      
    }
  }
}
}

else {
  header("Location: ../login");
  exit();
}
