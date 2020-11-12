<?php
 $db = Database::connect();   
 $requete = "SELECT * FROM authentification WHERE mail=? AND `mot-de-passe`=?  AND  `confirmkey`= ? ";

 //$requete = "SELECT * FROM utilis WHERE LoginUtil=? AND PassUtil=?";

 $resultat = $db->prepare($requete);

 //$login = $_POST['login'];
 //$mdp = $_POST['mdp'];
 $resultat->execute(array($mail,$pass,$number));
 $mailexist = $resultat->rowCount();
 if($mailexist == 0) {
    $msg='Votre mail ou mot de passe incorect <p><a href="../mdp/motdepasse.php">Mot de passe oublié</a></p>';	

    // $msg= "Adresse mail n' existe pas !";

 // démarrage d'une session
       // on vérifie que les données du formulaire sont présentes			
       
   }
  
 elseif ($mailexist > 0) {
  

   $nb='1';
   $reqmail = $db->prepare("SELECT * FROM authentification WHERE mail=? AND `confirme`=? ");
   $reqmail->execute(array($mail,$nb));
   $mailexist = $reqmail->rowCount();
   if($mailexist > 0) {
     $_SESSION['prenom'] = $prenom;
     $_SESSION["confirmkey"] = $number;
     $_SESSION['mail'] = $mail ;
     $_SESSION['titre'] = $titre ;
     $message = "Adresse mail existe et déjà été authentifier   !";
     header("Location: ../session/redirection_page.php");

   }else{
     $msg = "Adresse mail existe mais n'a pas encore été authentifier  !";

   }
   }
 
?>
