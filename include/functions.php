<?php
   function redirect_to($location) {
      header("Location: " . $location);
      exit;
   }
   
   function confirm_query($result_set) {
      if (!$result_set) {
         die("Database connection failed.");
      }
   }
?>
