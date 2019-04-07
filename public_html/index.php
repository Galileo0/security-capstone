<?php 
error_reporting(E_ALL);
//ini_set('display_errors', 1);
    //include "init.php";
    require ('db_connection/connect.php');
    include "inc/html_start.php";
    
    include "inc/navbar.php";
    
    
    include "inc/sections/about.php";
  
    //include "inc/sections/contact.php";
    
    include "inc/footer.php";
    
    include "inc/html_end.php";
?>