<?php
$db = Database::connect();   
  // $msg="$titre";

  $reqmail = $db->prepare("SELECT * FROM authentification WHERE mail=? AND `mot-de-passe`=? AND `titre`=?");
  $reqmail->execute(array($mail,$pass,$titre));
  $mailexist = $reqmail->rowCount();
  if($mailexist == 0) {
    $msg='Votre mail ou mot de passe incorect   <p><a href="../mdp/motdepasse.php">Mot de passe oublié</a></p> ';	

    //  $msg= "Adresse mail n' existe pas !";

// démarrage d'une session
        // on vérifie que les données du formulaire sont présentes			
        
    }elseif ($mailexist > 0) {
      $msg= "Adresse mail existe  !";
                  // l'utilisateur existe dans la table
                  // on ajoute ses infos en tant que variables de session
      $_SESSION['mail'] = $mail ;
      $_SESSION['titre'] = $titre ;
      $nb='1';

  // cette variable indique que l'authentification a réussi
     
        $reqmail = $db->prepare("SELECT * FROM authentification WHERE mail=? AND `confirme`=? ");
        $reqmail->execute(array($mail,$nb));
        $mailexist = $reqmail->rowCount();
        if($mailexist > 0) {
          $message = "Adresse mail existe et déjà été authentifier   !";
          $_SESSION['prenom'] = $prenom;
          $_SESSION["confirmkey"] = $number;
          
          header("Location: ../index/redirection_page.php");

        }else{
          $msg = "Adresse mail existe mais n'a pas encore été authentifier  !";

        }
        //var_dump($validation);
        
       
  }
  ?>
