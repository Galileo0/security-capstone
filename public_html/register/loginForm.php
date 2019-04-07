<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>register form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>
    <body>
        <div class="login">
            <header class="login-header"><span class="text">Register</span><span class="loader"></span></header>
            
            <form class="login-form" action="./index.php" method="post" onsubmit="return validateForm()" name="myForm">
                 
                 <a href="../index.php">Home</a>
                 
                <input class="login-input" type="text" placeholder="First name" name="firstName" required="required"/>
                <input class="login-input" type="text" placeholder="Last name" name="lastName" required="required"/>
                <input class="login-input" type="text" placeholder="Username" name="userName" required="required"/>
                <input class="login-input" type="email" placeholder="E-mail" name="email" required="required"/>
                <input class="login-input" type="password" placeholder="Password" name="password" required="required"/>
                <select class="login-input" name="gender" required="required">
                    <option value disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br/>
                <label>&nbsp;&nbsp;&nbsp;Enter This code: <?php echo codeGenerator(); ?></label>
                <br/>
                <input class="login-input" style="width: 80%;" type="text" placeholder="Verify" name="verificationCode" required="required"/>
                <button class="login-btn" type="submit">login</button>
            </form>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    </body>
    <script>

function validateForm() {
  var first_name = document.forms["myForm"]["firstName"].value;
  var last_name = document.forms["myForm"]["lastName"].value;
  var user_name = document.forms["myForm"]["userName"].value;

  if (first_name.length > 20 || last_name.length > 20 || user_name.length > 20 ) {
    alert("max input");
    return false;
  }
}
</script>
</html>
<?php
error_reporting(E_ALL);
//ini_set('display_errors', 1);
function codeGenerator() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $code = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $alphaLength);
        $code[] = $alphabet[$n];
    }
    $_SESSION['VerificationCode'] = implode($code);
    return implode($code);
}
?>