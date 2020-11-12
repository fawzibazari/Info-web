
<?php 
      include_once '../admin/database.php';


if(isset($_SESSION['mail'])) {
    $mail= $_SESSION['mail'];
    $bdd = Database::connect(); 
   $requser = $bdd->prepare("SELECT * FROM authentification WHERE mail = ?");
   $requser->execute(array($_SESSION['mail']));
   $userinfo = $requser->fetch();
   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $user['mail']) {
      $newNom = htmlspecialchars($_POST['newNom']);
      $newPrenom = htmlspecialchars($_POST['newPrenom']);


      $insertpseudo = $bdd->prepare("UPDATE `authentification` SET `nom` = ?, `prenom` = ? WHERE `authentification`.`mail` = ?");

      $insertpseudo->execute(array($newNom,$newPrenom,$mail));

      header('Location: ../session/logout.php');
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = $_POST['newmail'];

      if(isset($_SESSION["titre"])){
        // var_dump($_SESSION["titre"]);

      if( $_SESSION["titre"]== '22'){
            $newmail = htmlspecialchars($_POST['newmail']);
            $insertmail = $bdd->prepare("UPDATE authentification, formateur, projet SET authentification.mail = ?, formateur.username = ?,  projet.username = ? WHERE authentification.mail = ?");
            $insertmail->execute(array($newmail,$newmail,$newmail,$mail));
      //UPDATE authentification, formateur, projet SET `authentification`.`mail`= 'leonardlouis509@yahoo.fr', `formateur`.`username` = 'leonardlouis509@yahoo.fr', `projet`.`username` = 'leonardlouis509@yahoo.fr' WHERE authentification.mail = 'leonardlouis509@yahoo.fr'
     }elseif($_SESSION["titre"]== '21'){
            $newmail = htmlspecialchars($_POST['newmail']);
            $insertmail = $bdd->prepare("UPDATE authentification, intervenant, projet SET authentification.mail = ?, intervenant.username = ?, projet.username = ? WHERE authentification.mail = ?");
            $insertmail->execute(array($newmail,$newmail,$newmail,$mail));
         // $titre =      	checkInput($_POST['titre']);
     }else{
            $newmail = htmlspecialchars($_POST['newmail']);
            $insertmail = $bdd->prepare("UPDATE authentification, stagiaire SET authentification.mail = ?, stagiaire.username = ? WHERE authentification.mail = ? ");
            $insertmail->execute(array($newmail,$newmail,$mail));
     }

   }else{
      header('Location: ../session/connexion.php');

      $msg= "Selectionner votre titre  ";
   } 
 }

   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']); 
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $salt = "ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V";
         $pass = ($salt.$mdp1);
         $insertmdp = $bdd->prepare("UPDATE authentification SET `mot-de-passe` = ? WHERE mail = ?");
         $insertmdp->execute(array($pass, $mail));
         header('Location: ../session/connexion.php');

        // header('Location: profil.php?mail='.$_SESSION['mail']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
   
}
    Database::disconnect();

 ?>
 <?php
 /*
function modifStagiaire($newmail,$mail){
   $newmail = $_POST['newmail'];
   $bdd = Database::connect(); 
							$requser = $bdd->prepare("UPDATE `stagiaire` SET `username` = ? WHERE `stagiaire`.`username` = ?");
							$requser->execute([$mail,$mail]);
						//	$exist = $requser->rowCount();		
                            Database::disconnect();                   
                    
    }


    function modifIntervenant($newmail,$mail){
      $newmail = $_POST['newmail'];
              $bdd = Database::connect(); 
              $requser = $bdd->prepare("UPDATE `intervenant` SET  `username` = ? WHERE `intervenant`.`username` = ?");
              $requser->execute([$newmail,$mail]);
            //  $exist = $requser->rowCount();
            Database::disconnect();                   

    }
    function modifFormateur($newmail,$mail){
      $newmail = $_POST['newmail'];
      $bdd = Database::connect(); 
      $requser = $bdd->prepare(" UPDATE `formateur` SET  `username` = ? WHERE `formateur`.`username` = ?");
      $requser->execute([$newmail,$mail]);
      
      Database::disconnect();
}*/
    ?>