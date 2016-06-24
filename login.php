<?php
   ob_start();
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Login</title>
   </head>
   
   <body>
      <form action="login_processing.php" method="post">
         Username: <input type="text" name="username" required> <br>
         Passphrase: <input type="password" name="passphrase" required> <br>
         <input type="submit" name="submit" value="Login"> <br>
         <input type="reset" name="reset" value="Clear">
      </form>
   </body>
</html>

<?php
   ob_end_flush();
?>
