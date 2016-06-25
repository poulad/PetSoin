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

<div id="main">
   <div id="navigation">
      &nbsp;
   </div>
   <div id="page">
        
<?php
      $query = "SELECT * from owner WHERE username = 'ownr1' ";
      $result = mysqli_query($conn, $query);
      confirm_query($result);
      
      $row = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
?>

      <h2>Welcome <?php echo $row["fname"]; ?></h2>
      <p>Administration Menu</p>
      <ul>
         <li><a href="manage_users.php">Manage Users</a></li>
         <li><a href="logout.php">Logout</a></li>
      </ul>
   </div>
</div>

<?php
   include("../include/layout/footer.php");
?>
