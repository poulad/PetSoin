<?php
   require_once("../include/db_connection.php");
   require_once("../include/functions.php");
?>
<?php
   include("../include/layout/header.php");
?>

<?php
   // get owner's id from super global GET
   if(isset($_GET["id"])) {
      $owner_id = $_GET["id"];
   } else {
      $owner_id = "1";
   }
   $owner_name = find_owner_by_id($owner_id)["fname"];
?>

<div id="main">
   <div id="navigation">
      <ul>
         <?php
            $pets_set = find_all_pets($owner_id);
            while($pet = mysqli_fetch_assoc($pets_set)) {
               echo "<li>" . $pet["name"] . " (" . $pet["breed"] . ")" . "</li>";
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
