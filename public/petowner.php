<?php
   require_once("../include/db_connection.php");
   require_once("../include/functions.php");
?>
<?php
   include("../include/layout/header.php");
?>

<?php
   $owner_id = "1";
   $query = "SELECT * from owner WHERE owner_id = " . $owner_id;
   $result = mysqli_query($conn, $query);
   confirm_query($result);
   $owner_name = mysqli_fetch_assoc($result)["fname"];
   mysqli_free_result($result);
?>

<div id="main">
   <div id="navigation">
      <ul>
         <?php
            $query = "SELECT * FROM pet WHERE owner_id = '" . $owner_id . "'";
            $result = mysqli_query($conn, $query);
            confirm_query($result);

            while($pet = mysqli_fetch_assoc($result)) {
               echo "<li>" . $pet["name"] . "</li>";
            }
            $result
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
