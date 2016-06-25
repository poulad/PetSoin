<?php
   require_once("include/session.php");
   
   if(!is_logged_in() || $_SESSION["usertype"] != "A") {
      header("Location: public/login.php");
      exit;
   }
   
   echo phpinfo();
?>
