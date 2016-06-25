<?php
   require_once("../include/session.php");
   require_once("../include/functions.php");
   
    if(isset($_SESSION['usrname'])) {
        $_SESSION['usrname'] = null;
        $_SESSION['usertype'] = null;
        
    }
    
    redirect_to("../index.php");
    
?> 
