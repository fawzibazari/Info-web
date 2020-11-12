<?php
    session_start();
    include_once '../admin/database.php';
    $DB = Database::connect();
    include_once './function_connexion.php';
    connexion();


    //include('./connexionDB.php'); // Fichier PHP contenant la connexion � votre BDD

  // S'il y a une session alors on ne retourne plus sur cette page  
    if (isset($_GET['key'])):?>  
<?php

$mdp= checkInput($_GET['key']);
// $mail= checkInput($_GET['mail']);
//var_dump($mdp,$mail);
$DB = Database::connect();
$pas = sha1($mdp);

$salt = "ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V";
$pass = ($salt.$pas);

$verification_mail = $DB->prepare("SELECT * FROM authentification WHERE    `mot-de-passe` =?");

$verification_mail->execute(array($pass));
//var_dump($verification_mail);
$req = $verification_mail->fetch();
$un=checkInput($req['n_mdp']);
$mailBD=checkInput($req['mail']);

    if($req == false ){
        $error= "Vous m'avez pas  partager la bonne kléeeeee!";
    }else{


        // Si la variable "$_Post" contient des informations alors on les traitres

        $valid = true;

        if (isset($_POST['connexion'])){

            // $mail = htmlentities(strtolower(trim($mail)));
            // $mdp = trim($mdp);

            if(isset($_POST['mdp']) || isset($_POST['mdp1'])){ // V�rification qu'il y est bien un mail de renseign�
               

                // On fait une requ�te pour savoir si le couple mail / mot de passe existe bien car le mail est unique !

                if($_POST['mdp'] === $_POST['mdp1']){
                    $mdpv= checkInput($_POST['mdp']);
                    $pass1 = sha1($mdpv);
                    $salt = "ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V";
                    $pass = ($salt.$pass1);

                    $verification_mail= $DB->prepare("UPDATE authentification SET `mot-de-passe` = ? WHERE mail = ?");
                    $verification_mail->execute(array($pass,$mailBD));

                    if($un == 1){ // On remet � z�ro la demande de nouveau mot de passe s'il y a bien un couple mail / mot de passe
                        
                        $set= checkInput(0);
                        $returnN=	$DB->prepare("UPDATE authentification SET n_mdp = ? WHERE mail = ?");
                        $returnN->execute(array($set,$mailBD));
            
                            // array($req['id']));
            
                        // S'il y a un r�sultat alors on va charger la SESSION de l'utilisateur en utilisateur les variables $_SESSION
                        if ($valid){
            
                            $_SESSION['id'] = $req['id']; // id de l'utilisateur unique pour les requ�tes futures
                            $_SESSION['nom'] = $req['nom'];
                            $_SESSION['prenom'] = $req['prenom'];
                            $titre= $_SESSION['titre'] = $req['titre'];
                            $_SESSION['mail'] = $req['mail'];
                            //var_dump($titre);
            
                         header("Location:  ./logout.php");
                        }   
                    } 
                }else{
                    $er_mdp = "les mode de passe ne corespond pas";
                }

            }else{
                $valid = false;
                $error = "Il faut mettre un mot de passe";
            }
        }
    }
    // include_once './function_connexion.php';
    
    $title='mot de passe oublié';

?>
<?php include '../functions/header/header.php';?>
<link rel="stylesheet" href="../main/css/index2.css" />

<div class="container">
		<div class="center">
			<div class="wrapper fadeInDown">
          		<div id="formContent">
				  <div class="center">
                <div>Se connecter</div>
                <br>
                <form method="post">

                    <?php
                        if (isset($error)){
                    ?>
                        <div><?= $error ?></div>
                    <?php   
                        }
                    ?>
                    </label>
                        <label> <p>Mot de passe </p> </label>

                            <input type="password" placeholder="votre mot de passe" name="mdp" value="" required>

                            <p>Mot de passe de confirmation</p>
                        
                            <div class="password-icon">
                            <i data-feather="eye"></i>
                            <i data-feather="eye-off"></i>
                            </div>
                        


                            <input type="password" placeholder="votre confirme votre mot de pase" name="mdp1" value="" required>

                        
                    <?php
                        if (isset($er_mdp)){
                    ?>
                        <div><?= $er_mdp ?></div>
                    <?php   
                        }
                    ?>
        
                        <!-- ICON SCRIPT -->
                    

                    <button  class="btn btn-primary" type="submit" name="connexion">Enregister</button>

                </form>
        <script src="./mdp.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php else :?> 
        <h1>Nous arrivons pas avoir votre mail</h1> 
       <?php endif?>  
<?php     include_once '../functions/footer/footer.php'; ?>
