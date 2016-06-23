<!DOCTYPE html>

<html>
   <head>
   <title>PetSoin</title>
   <link rel="stylesheet" href="resources/styles.css">
   <style>

   </style>
   </head>
   <body>
      <h3>Pet</h3>
      <table>
         <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Breed</th>
            <th>Birthdate</th>
            <th>Weight</th>
         </tr>
<?
try {
      $oConn = new PDO(
      "mysql:host=us-cdbr-azure-west-c.cloudapp.net;dbname=petsoin", 
      "b19257a1ad0368", 
      "08ac5ec15b6233e");
      $oConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $oStmt = $oConn->prepare("select * from pet");
      $oStmt->execute();

      $oResult = $oStmt->fetchAll();
      foreach ($oResult as $aRow) {
         echo "<tr>";
            echo "<td>".$aRow['pet_id']."</td>";
            echo "<td>".$aRow['name']."</td>";
            echo "<td>".$aRow['sex']."</td>";
            echo "<td>".$aRow['breed']."</td>";
            echo "<td>".$aRow['birthdate']."</td>";
            echo "<td>".$aRow['weight']."</td>";
         echo "</tr>";
      }
   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }
?>
      </table>
   </body>
</html>
