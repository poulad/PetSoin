<?
   define("DB_SERVER", "us-cdbr-azure-west-c.cloudapp.net");
   define("DB_USER", "b19257a1ad0368");
   define("DB_PASS", "08ac5ec15b6233e");
   define("DB_NAME", "petsoin");

   $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

   if (mysqli_connect_errno()) {
         die("Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
   }
