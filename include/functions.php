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
   
   function find_owner_by_id($id) {
      global $conn;
      $query = "SELECT * from owner WHERE owner_id = '{$id}' ";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return mysqli_free_result($result);
   }
   
   function find_all_pets($owner_id) {
      global $conn;
      $query = "SELECT * FROM pet WHERE owner_id = '{$owner_id}' ORDER BY name";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return $result;
   }
   
   
?>
