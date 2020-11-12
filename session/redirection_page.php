<?php if(session_start()){
         $_SESSION["mail"];

   $typeUser = $_SESSION["titre"];
   
   if($typeUser == 22){
    header("Location: ../index/profil_formateur.php");

   }elseif($typeUser == 21){
      $_SESSION["titre"];
    header("Location: ./in_intervenant.php");

   }else {
      $_SESSION["titre"];

    header("Location: ./in_stagiaire.php");


   }
}
 
    
