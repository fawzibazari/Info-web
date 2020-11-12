<?php if(session_start()){
         $_SESSION["mail"];
         $_SESSION["titre"];
   $typeUser = $_SESSION["titre"];
   
   if($typeUser == 22){
    header("Location: ./profil_formateur.php");

   }elseif($typeUser == 21){
      $_SESSION["titre"];
    header("Location: ./profil_intervenant.php");

   }elseif ($typeUser == 20){
      $_SESSION["titre"];

    header("Location: ./profil_stagiaire.php");


   }
}
 
    
