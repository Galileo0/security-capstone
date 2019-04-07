
<?php 
    include "init.php";
    include "inc/html_start.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include "inc/navbar.php";
    include 'db_connection/connect.php';
    require 'encryption/encryption.php';
?>



<?php    
//session_start();
$user = $_SESSION['u_id'];
//echo $user;
if($user == "")
{
    //echo $user;
    header("Location: ../login");
}

 if (isset($_POST['submit']))
{
  $reciever = $_POST['reciever'];
  $sender = $_POST['sender'];
  $subject = filter_var(simple_crypt($_POST['subject']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $message = filter_var(simple_crypt($_POST['message']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  /*
  echo $reciever;
  echo '<br>';
  echo $sender;
  echo '<br>';
  echo $subject;
  echo '<br>';
  echo $message;
  echo '<br>';
*/

  $query = "INSERT into `messages` (sender, subject, message,seen, rec_id)
    VALUES ('$sender', '$subject','$message',0,'$reciever')";

    
    $result = mysqli_query($mysqli,$query);
    

    if($result){
            echo "<div class='form'>
            <h3>Message Sent Successfully.</h3>
            <br/>Click here to <a href='index.php'>Dashboard</a></div>";
        }else{
            echo "<div class='form'>
            <h3>Error.</h3>
            <br/>Click here to <a href='index.php'>Dashboard</a></div>";
        }
    }else
    
    
        {
    
    ?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm()" name="myForm">

    <div class="container">
        <div class="title text-left">
            <h3>New Message</h3>
            <input type="hidden" name="sender" maxlength="32" value = <?php echo $_SESSION['u_id']; ?>>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                   
                        

                        <div class="form-group">
                        <label for="reciever">To</label>
                            <?php 
                                $q = $mysqli->query("select * from users");
                                echo '<select name="reciever">';
                                while($row2 = mysqli_fetch_array($q))
                                    {
                                        $decrypt_user_name = simple_crypt($row2['user_name'],'d');
                                        echo '<option value="'.$row2['id'].'">'.$decrypt_user_name.'</option>'; 
                                        
                                    }
                                echo '</select>';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject"required >
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter your Message" name="message"  minlength="10" maxlength="500"></textarea>
                        </div>

                        <button name="submit" type="submit" class="btn btn-default">Send</button>
                   

                </div>
            </div>
            
        </div>
    </div>
</form>
<script>

function validateForm() {
  var subject_len = document.forms["myForm"]["subject"].value;
  var message_len = document.forms["myForm"]["message"].value;
  if (subject_len.length >20 ) {
    alert("max subject input");
    return false;
  }

  if (message_len.length >80 ) {
    alert("max message input");
    return false;
  }
}
</script>
<?php
}
?>
