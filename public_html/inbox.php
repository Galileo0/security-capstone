
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "inc/html_start.php";
    
    include "inc/navbar.php";
    session_start();
include 'db_connection/connect.php';
require 'encryption/encryption.php';
//session_start();
$user = $_SESSION['u_id'];
//echo $user;
if($user == "")
{
    //echo $user;
    header("Location: ../login");
}
?>	

		
<html>
<head>
<meta charset="utf-8">
<title>Inbox</title>
</head>
<body>
    <div class="container">
    <table class="table">
        <h3>Inbox</h3>
        <thead>
        <th>From</th>
        <th>Subject</th>
        <th>Message</th>  
         </thead> 
         <tbody>
	<?php
    
	$query = "SELECT  sender, subject, message FROM messages WHERE rec_id='$user'";
        $run_query = mysqli_query($mysqli ,$query);
	while($row = mysqli_fetch_array($run_query)) {
        
        $sender_id = $row['sender'];
        $sender_name = "";
        $query2 = "SELECT user_name from users where id = '$sender_id'"; // query to get sender name by id
        $run_q = mysqli_query($mysqli ,$query2);
        while($row2 = mysqli_fetch_array($run_q))
        {
            $sender_name = simple_crypt($row2['user_name'],'d'); // Decrypt sender name
            break;
        }

       echo '
<tr>
<td>' . filter_var($sender_name,FILTER_SANITIZE_FULL_SPECIAL_CHARS) .'</td>
    <td>' . filter_var(simple_crypt($row['subject'],'d'),FILTER_SANITIZE_FULL_SPECIAL_CHARS) .'</td>
        <td>' . filter_var(simple_crypt($row['message'],'d'),FILTER_SANITIZE_FULL_SPECIAL_CHARS) .'</td>
</tr>
';     
    }
    
    

    ?> </tbody> 
</table>
        </div>
</body>
</html>
