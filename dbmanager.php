<?php
   $oConn;
   $oStmt;

   function connect() {
      try {
         $oConn = new PDO(
         "mysql:host=us-cdbr-azure-west-c.cloudapp.net;dbname=petsoin",
         "b19257a1ad0368",
         "08ac5ec15b6233e"
      );
      $oConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
         echo 'ERROR: ' . $e->getMessage();
      }
   }

   function executeSql($sqlCmnd) {
      try {
         $oConn = new PDO(
            "mysql:host=us-cdbr-azure-west-c.cloudapp.net;dbname=petsoin",
            "b19257a1ad0368",
            "08ac5ec15b6233e"
         );
         $oConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $oStmt = $oConn->prepare($sqlCmnd);
         $oStmt->execute();
      } catch(PDOException $e) {
         echo 'ERROR: ' . $e->getMessage();
      }
   }
?>
