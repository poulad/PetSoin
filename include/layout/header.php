<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
   <head>
      <title>PetSoin Project</title>
      <link href="css/public.css" media="all" rel="stylesheet" type="text/css" />
   </head>
   <body>
   <div id="header">
      <h1>PetSoin Project</h1>
   </div>
<?php
   if(is_logged_in()) {
      echo "<div class='logout'>Hi, " . $_SESSION["usrname"] . "<a href='logout.php'><img src='image/logout.png' /> </a></div>";
   };
?>
