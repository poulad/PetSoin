<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>untitled</title>
		<link href="css/public.css" media="all" rel="stylesheet" type="text/css" />
	</head>
	<body>
    <div id="header">
      <h1>Widget Corp</h1>
    </div>
    <div id="main">
      <div id="navigation">
        &nbsp;
      </div>
      <div id="page">
        <h2>Admin Menu</h2>
        
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
        <p>Welcome <?php echo $row["fname"]; ?></p>
        <ul>
          <li><a href="manage_content.php">Manage Website Content</a></li>
          <li><a href="manage_admins.php">Manage Admin Users</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="footer">Copyright 20xx, Widget Corp</div>

	</body>
</html>
