<?php session_start();?>
<?php    
    
        include_once '../admin/database.php';
            $db = Database::connect(); 
            $emailUser = $_SESSION["mail"]; $typeUser = $_SESSION["titre"];
            if(empty($typeUser)){
                header('Location: ./session/connexion.php?mail='.$_SESSION['mail']);

            }else{
                //appele de la page madif dans admin
                include_once '../admin/modif-info/modif.php';	
            }
    
?>
<?php 

include_once '../functions/header/header_profil.php';
// definire le nom de la page  $userinfo = $requser->fetch();
   //pour afficer l'utilisater 
   //autre faire les modifications
$title= 'Edition';

?>
                    <link rel="stylesheet" href="../main/css/index2.css" />

<div class="wrapper fadeInDown">
          <div id="formContent">
               <div align="center">
                    <h2>Edition de mon profil</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                    <label>NOM :</label><br>
                    <input type="text" name="newNom" placeholder="nom" value="<?php if(isset($userinfo['nom'])) echo checkInput($userinfo['nom']); ?>" /><br /><br />
                    <label>PRENOM :</label><br>

                    <input type="text" name="newPrenom" placeholder="Prenom" value="<?php if(isset($userinfo['prenom'])) echo checkInput($userinfo['prenom']); ?>" /><br /><?php //var_dump($user['username']);?><br />
                    
                    <label>Mail :</label><br>
                    <input type="text" name="newmail" placeholder="Mail" value="<?php if(isset($userinfo['mail'])) echo checkInput($userinfo['mail']); ?>" /><br /><br />
                    <label>Mot de passe :</label><br>
                    <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                    <label>Confirmation - mot de passe :</label><br>
                    <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
                   
                    <input type="submit" value="Mettre ajour Mon profil" />
                    </form>
                    <?php// if(isset($msg)) { echo $msg; } ?>
            </div>
      </div>
</div>
