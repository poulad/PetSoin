<?php
   require_once("../include/session.php");
   require_once("../include/db_connection.php");
   require_once("../include/functions.php");
   
   if(!is_logged_in()) {
      redirect_to("login.php");
   }
   
?>
<?php
   include("../include/layout/header.php");
?>

<?php
   // get owner's id from super global GET
   if(isset($_GET["o"])) {
      $owner_id = $_GET["o"];
   } else {
      $owner_id = "1";
   }
   
   if(isset($_GET["p"])) {
      $pet_id = $_GET["p"];
   } else {
      $pet_id = null;
   }
   
   $owner_name = find_owner_by_id($owner_id)["fname"];
?>

<div id="main">
   <div id="navigation">
      <?php echo create_petowner_navigation($owner_id, $pet_id); ?>
   </div>
   <div id="page">
      <h3>Welcome, <?php echo $owner_name; ?></h3>
      <?php
         if($pet_id) {
            echo "<h4>Pet Information:</h4>";
            echo create_pet_info_form($pet_id);
            echo "<br>";
            echo "<h4>Appointment:</h4>";
            echo create_pet_appointment_table($pet_id);
            echo "<br>";
            echo "<h4>Vaccination:</h4>";            
            // echo create_pet_vaccination_table($owner_id, $pet_id);
            echo "<br>";
            // echo create_pet_treatment_table($owner_id, $pet_id);
            echo "<br>";
         }
      ?>
   </div>
</div>

<?php
   include("../include/layout/footer.php");
?>
