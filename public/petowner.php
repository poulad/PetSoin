<?php
   require_once("../include/db_connection.php");
   require_once("../include/functions.php");
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
      <ul>
         <?php
            $pets_set = find_all_pets($owner_id);
            while($pet = mysqli_fetch_assoc($pets_set)) {
               echo "<li ";
               if ($pet["pet_id"] == $pet_id) {
                  echo " class='selected' ";
               }
               echo ">";
               echo "<a href=\"petowner.php?o=" . $owner_id . "&p=" . $pet['pet_id'] . "\">";
               echo $pet['name'] . " (" . $pet['breed'] . ")";
               echo "</a></li>";
            }
         ?>
      </ul>
   </div>
   <div id="page">
      <h3>Welcome, <?php echo $owner_name; ?></h3>

   </div>
</div>

<?php
   include("../include/layout/footer.php");
?>
