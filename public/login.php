<?php
   require_once("../include/db_connection.php");
   require_once("../include/functions.php");
   
   if(isset($_POST['submit'])) {
      $username = $_POST["username"];
      $passphrase = $_POST["passphrase"];
      
      if(verify_user($username, $passphrase)) {
      
         $user = find_user($username, $passphrase);
         
         switch ($user['type']) {
            case "A":
               redirect_to("admin.php");
               break;
            case "D":
               redirect_to("../index.php");
               break;
            case "O":
               redirect_to("petowner.php");
               break;
            case "C":
               redirect_to("clinic.php");
               break;
            default:
               break; 
         }
      } else {
         echo "LOGIN FAILED";
      } 
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
         <form action="login.php" method="post">
            Username: <input type="text" name="username" required > <br>
            Passphrase: <input type="password" name="passphrase" required> <br>
            <input type="submit" name="submit" value="Login"> <br>
            <input type="reset" name="reset" value="Clear">
         </form>
   </div>
</div>

<?php
   include("../include/layout/footer.php");
?>
