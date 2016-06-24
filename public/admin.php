<?php
   include("../include/layout/header.php");
?>

<div id="main">
   <div id="navigation">
      &nbsp;
   </div>
   <div id="page">
        
<?php
      $conn = mysqli_connect(
      "us-cdbr-azure-west-c.cloudapp.net",
      "b19257a1ad0368",
      "08ac5ec15b6233e",
      "petsoin"
      );
      if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
      }
      
      $query = "SELECT * from owner WHERE username = 'ownr1' ";
      $result = mysqli_query($conn, $query);
      if (!$result) {
            die("Database connection failed.");
      }
      
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
