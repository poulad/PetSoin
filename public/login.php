<?php
   require_once("../include/session.php");
   require_once("../include/db_connection.php");
   require_once("../include/functions.php");
   
   if(isset($_POST['submit'])) {
      $username = $_POST["username"];
      $passphrase = $_POST["passphrase"];
      
      if(verify_login($username, $passphrase)) {
         switch ($_SESSION['usertype']) {
            case "A":
               redirect_to("admin.php");
               break;
            case "D":
               redirect_to("../index.php");
               break;
            case "O":
               $_SESSION['owner'] = find_owner_by_username($username);
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
   } else {
      $username = null;
      $passphrase = null;
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
         <form class='login' action="login.php" method="post">
            Username: <input type="text" name="username" required value='<?php echo $username ?>'> <br>
            Passphrase: <input type="password" name="passphrase" required value='<?php echo $passphrase ?>' > <br>
            <input type="submit" name="submit" value="Login"> <br>
         </form>
   </div>
</div>

<?php
   include("../include/layout/footer.php");
?>
