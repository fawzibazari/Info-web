<?php
session_start();

include '../admin/database.php';
$bdd = Database::connect();
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM administrateur WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: ./read.php");
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<link rel="stylesheet" href="../main/css/profil.css" />
 <link rel="stylesheet" href="../main/css/index2.css" />    


      <!-- <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         
      </div> -->
      <div class="wrapper fadeInDown">
  <div id="formContent">
    
  <h1>Connexion</h1>

    
    <div class="fadeIn first">
     
    </div>

    
    <form method="POST" action="">
      <input type="email" id="login" class="fadeIn second" name="mailconnect" placeholder="Mail">
      <input type="password" id="password" class="fadeIn third" name="mdpconnect" placeholder="Mot de passe">
      <input type="submit" name="formconnexion" class="fadeIn fourth" value="Se connecter !">
    </form>
    <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
    
    <div id="formFooter">
      <a class="underlineHover" href="inscription_admin.php">s'inscrire</a>
    </div>

  </div>
</div>
