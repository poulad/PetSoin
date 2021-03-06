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
   
   function find_user($username) {
      global $conn;
      $username = mysqli_real_escape_string($conn, $username);
      $query = "SELECT * FROM login WHERE user = '{$username}'";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      if(mysqli_num_rows($result) > 0) {
         return mysqli_fetch_assoc($result);
      } else {
         return null;
      }
   }
   
   function find_owner_by_id($owner_id) {
      global $conn;
      $owner_id = mysqli_real_escape_string($conn, $owner_id);
      $query = "SELECT * FROM owner WHERE owner_id = '{$owner_id}'";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return mysqli_fetch_assoc($result);
   }
   
   function find_owner_by_username($username) {
         global $conn;
         $username = mysqli_real_escape_string($conn, $username);
         $query = "select owner_id, fname, lname from login left join owner on login.user = owner.username where login.type = 'O' and login.user = '{$username}'";
         $result = mysqli_query($conn, $query);
         confirm_query($result);
         return mysqli_fetch_assoc($result);
   }
   
   function find_doctor_by_id($doctor_id) {
      global $conn;
      $doctor_id = mysqli_real_escape_string($conn, $doctor_id);
      $query = "SELECT * FROM doctor WHERE doc_id = '{$doctor_id}'";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return mysqli_fetch_assoc($result);
   }
   
   function find_all_pets($owner_id) {
      global $conn;
      $owner_id = mysqli_real_escape_string($conn, $owner_id);
      $query = "SELECT * FROM pet WHERE owner_id = '{$owner_id}' ORDER BY name";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      return $result;
   }
   
   function create_petowner_navigation($owner_id, $pet_id) {
      $output = "";
      
      $output .= "<ul>";
      $pets_set = find_all_pets($owner_id);
      while($pet = mysqli_fetch_assoc($pets_set)) {
         $output .= "<li ";
         if ($pet["pet_id"] == $pet_id) {
            $output .= " class='selected' ";
         }
         $output .= ">";
         $output .= "<a href=\"petowner.php?p=" . urlencode($pet['pet_id']) . "\">";
         $output .= $pet['name'] . " (" . $pet['breed'] . ")";
         $output .= "</a></li>";
      }
      $output .= "</ul>";
      
      return $output;
   }
   
   function create_pet_info_form($pet_id) {
      global $conn;
      $output = "";
      $pet_id = mysqli_real_escape_string($conn, $pet_id);
      $query = "SELECT * FROM pet WHERE pet_id = '{$pet_id}'";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      $pet = mysqli_fetch_assoc($result);

      $output .= "<form class='petinfo' method='post' action='updatepet.php?p=" . $pet_id . "'>";
      $output .= "<table><tr>";
      $output .= "<th>PetID</th><th>Name</th><th>Gender</th><th>Birthdate</th><th>Weight</th><th>Breed</th>";
      $output .= "</tr><tr>";
      $output .= "<td>" . $pet_id . "</td>";
      $output .= "<td><input name='name' value='" . $pet['name'] . "' ></td>";
      $output .= "<td><input name='gender' value='" . $pet['sex'] . "' ></td>";
      $output .= "<td><input name='birthdate' value='" . $pet['birthdate'] . "' ></td>";
      $output .= "<td><input name='weight' value='" . $pet['weight'] . "' ></td>";
      $output .= "<td><input name='breed' value='" . $pet['breed'] . "' ></td>";
      $output .= "</tr></table>";
      $output .= "<input type='submit' name='submit' value='Update Information'></form>";
      
      mysqli_free_result($result);
      return $output;
   }
   
   function create_pet_appointment_table($pet_id) {
      global $conn;
      $output = "";
      $pet_id = mysqli_real_escape_string($conn, $pet_id);
      $query = "SELECT * FROM appointment WHERE pet_id = '{$pet_id}' ORDER BY datetime";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      
      $output .= "<form class='appointment' method='post' action='make_appointment.php?p=" . $pet_id . "'>";
      $output .= "<table><tr><th>Appointment ID</th><th>Date</th><th>Doctor Name</th></tr>";

      while ($appointment = mysqli_fetch_assoc($result)) {
         $output .= "<tr>";
         $output .= "<td>" . $appointment['appoint_id'] . "</td>";
         $output .= "<td>" . $appointment['datetime'] . "</td>";
         $doctor = find_doctor_by_id($appointment['doc_id']);
         $output .= "<td>" . $doctor['fname'] . " " . $doctor['lname'] . "</td>";
         $output .= "</tr>";
      }
      
      $output .= "<tr>";
      $output .= "<td> + NEW </td>";
      $output .= "<td><input type='date' name='date' ></td>";
      $output .= "<td><input name='doctor' value='" . $doctor['fname'] . " " . $doctor['lname'] . "' ></td>";
      $output .= "</tr></table>";
      $output .= "<input type='submit' name='submit' value='Make appointment'></form>";

      return $output;
   }
   
   
   function create_pet_vaccination_table($pet_id) {
      global $conn;
      $output = "";
      $pet_id = mysqli_real_escape_string($conn, $pet_id);
      $query = "SELECT vaccine_id, vaccine_type, datetime, clinic.name " .
            "FROM vaccine LEFT JOIN clinic ON(vaccine.clinic_id = clinic.clinic_id) " . 
            "WHERE pet_id = '{$pet_id}' ORDER BY datetime";

      $result = mysqli_query($conn, $query);
      confirm_query($result);
      
      $output .= "<table class='vaccination'><tr><th>Vaccine ID</th><th>Vaccine Type</th><th>Date & Time</th><th>Clinic</th></tr>";

      while ($vaccine = mysqli_fetch_assoc($result)) {
         $output .= "<tr>";
         $output .= "<td>" . $vaccine['vaccine_id'] . "</td>";
         $output .= "<td>" . $vaccine['vaccine_type'] . "</td>";
         $output .= "<td>" . $vaccine['datetime'] . "</td>";
         $output .= "<td>" . $vaccine['name'] . "</td>";
         $output .= "</tr>";
      }

      $output .= "</table>";
      return $output;
   }
   
   
   function verify_login($username, $passphrase) {
      $user = find_user($username);
      if($user) {
         if (sha1($passphrase) === $user["pass"]) {
            $_SESSION["usrname"] = $user["user"];
            $_SESSION["usertype"] = $user["type"];
            return true;
         }
         else {
            return false;
         }
      } else {
         // user does not exist
         return null;
      }
   }
   
?>
