<?php
   session_start();
   
   function is_logged_in() {
      if (isset($_SESSION["usrname"])) {
         global $username;
         $username = $_SESSION["usrname"];
         return true;
      }
      else {
         return false;
      }
   }
?>
