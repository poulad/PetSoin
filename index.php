<?php
   require_once("include/session.php");
   $_SESSION['index_dir'] = "http://petsoin.azurewebsites.net/";
   include("include/layout/header.php");
?>

<div id="main">
   <link href="public/css/styles.css" media="all" rel="stylesheet" type="text/css" />
   <link href="public/css/public.css" media="all" rel="stylesheet" type="text/css" />

   <div id="page">
      <div class="index">
         <img src="public/image/logo.png">
         <h2>PetSoin: A Pet Health Care System</h2>
         <p>
            A growing number of people tend to own a pet and therefore there is a need of a better health care system for our beloved pets. The number of veterinary clinics is increasing that means new clinics need to be managed well to serve the pet owners and pets well. The access to pet’s medical conditions and treatment records is essential to the veterinarians. 
         </p>
      </div>
   </div>
</div>

<?php
   include("../include/layout/footer.php");
?>