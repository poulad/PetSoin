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
   
   function find_owner_by_id($owner_id) {
      global $conn;
      $query = "SELECT * FROM owner WHERE owner_id = '{$owner_id}'";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return mysqli_fetch_assoc($result);
   }
   
   function find_all_pets($owner_id) {
      global $conn;
      $query = "SELECT * FROM pet WHERE owner_id = '{$owner_id}' ORDER BY name";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return $result;
   }
   
   function create_petowner_navigation() {
      global $owner_id;
      global $pet_id;
      
      $output = "";
      
      $output .= "<ul>";
      $pets_set = find_all_pets($owner_id);
      while($pet = mysqli_fetch_assoc($pets_set)) {
         $output .= "<li ";
         if ($pet["pet_id"] == $pet_id) {
            $output .= " class='selected' ";
         }
         $output .= ">";
         $output .= "<a href=\"petowner.php?o=" . urlencode($owner_id) . "&p=" . urlencode($pet['pet_id']) . "\">";
         $output .= $pet['name'] . " (" . $pet['breed'] . ")";
         $output .= "</a></li>";
      }
      $output .= "</ul>";
      
      return $output;
   }
?>
