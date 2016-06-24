<?php
   require_once("../include/functions.php");
   
   if(isset($_POST['submit'])) {
      $username = $_POST["username"];
      $passphrase = $_POST["passphrase"];

      // Checking it against the Database
      try {
         $oConn = new PDO(
            "mysql:host=us-cdbr-azure-west-c.cloudapp.net;dbname=petsoin",
            "b19257a1ad0368",
            "08ac5ec15b6233e"
         );
         $oConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $oStmt = $oConn->prepare("SELECT user, pass, type FROM login WHERE user = '{$username}'");
         $oStmt->execute();

         $oResult = $oStmt->fetchAll();
         foreach ($oResult as $aRow) {
            if ($username == $aRow['user'] && $passphrase == $aRow['pass']) {
               switch($aRow['type']) {
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
            }
         }
      } catch(PDOException $e) {
         echo 'ERROR: ' . $e->getMessage();
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
