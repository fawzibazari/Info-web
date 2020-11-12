<?php 

ini_set("SMTP","smtp.gmail.com");

ini_set("smtp_port","587");

ini_set('sendmail_from', 'exodelouis43@gmail.com');

include '../admin/database.php';

session_start(); 

try{ 
		if(isset($_POST['forminscription'])) {   
		$nom = 			checkInput($_POST['nom']);
		$prenom = 		checkInput($_POST['prenom']);
		$titre =     	checkInput($_POST['titre']);
		$mail = 		checkInput($_POST['mail']);
		$pass =      	checkInput($_POST['password']);
		$mdp = 			checkInput($_POST['mdp']);
			$msg = "";
			$nonlength = strlen($nom);
			$prenomlength = strlen($prenom);
			$longueurKey = 9;
			$key = "";
			for($i=1;$i<$longueurKey;$i++) {
			//faire des nombre aleatoire  
			$key .= mt_rand(0,9);
			// var_dump($key);
			//  exit();
			}
			checkInput('data'); 
			//verification de formulaire si vide 
			if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])  || empty($_POST['password']) ) {
				$erreur = "Tous les champs doivent être complétés !";
			}else{
				if($nonlength >= 60 || $prenomlength >= 60 ){
					//calcule des nom et prenom si de passe limite 
						//var_dump($prenomlength,$nonlength);
						$erreur = "Votre nom et prenom ne doit pas dépasser 60 caractères !";
				}else{
					if($pass !== $mdp ) {
						//recherche si mon de passe diferent 
							$erreur = "Vos mots de passes ne correspondent pas !";	
					}else{
						if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
							//voir si mail est au norme 
							$pass1 = sha1($mdp);
							$salt = "ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V";
        					$pass = ($salt.$pass1);



							$db = Database::connect(); 
							$reqmail = $db->prepare("SELECT * FROM authentification WHERE mail=? AND `mot-de-passe`=? ");
							$reqmail->execute(array($mail,$pass));
							$mailexist = $reqmail->rowCount();
							//verification si mail est déjà dans la base
							if($mailexist > 0) {
								$message = "Adresse mail existe  !";
								$number = '1';
								$db = Database::connect(); 
								$reqmail = $db->prepare("SELECT * FROM authentification WHERE mail=? AND `confirme`=? ");
								$reqmail->execute(array($mail,$number));
								$mailex = $reqmail->rowCount();
								if($mailex > 0) {
									$message = "Adresse mail existe et déjà été authentifier   !";

								}else{
									$number = '0';
									$reqmail = $db->prepare("SELECT * FROM authentification WHERE mail=? AND `confirme`=? ");
									$reqmail->execute(array($mail,$number));
									$mailex = $reqmail->rowCount();
									$erreur = "Adresse mail existe mais n'a pas encore été authentifier  !";

								}
							} elseif($mailexist == 0) {

								include_once '../admin/inscription_function.php';	

								// var_dump($mailexist);
								if( empty($titre )){ 
									//$erreur= 'selection votre statut';
								}elseif( $titre == '19' ){ 
									$erreur= 'si vous etre adminstateur veuiller vous connecter dans la page adminstateur ';
								}elseif( $titre == '20' ){
									inscription($nom, $prenom, $mail, $pass, $key, $titre, $db);
									$msg = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter </a>";
									//$erreur= 'data note save ';#verification que le compte existe 
									insertStagiaire( $key,$titre,$mail);
									$message= " .<br/>$msg.<br/>Votre code stage $key.";
								}elseif( $titre == '21' ){
									//$erreur= 'data note save ';
									inscription($nom, $prenom, $mail, $pass, $key, $titre, $db);
									$msg = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter $key</a>";
									$message= ".$msg.";	
									insertIntervenant($key,$titre,$mail);
								} elseif( $titre == '22' ){
									 inscription($nom, $prenom, $mail, $pass, $key, $titre, $db);
									$msg = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter $key </a>";
									//$erreur= 'data note save ';
									insertFormateur($key,$titre,$mail);

									$message= "$msg";

								}
								Database::disconnect();

									
							}
						}else{
							$message = "mail n'est pas au norme !";
						}
					
					}
				}
			}
		}
			
	}catch(PDOException $error) {  
		$msg = $error->getMessage();  
}
// pour le nom de la page
$title= 'Inscription';


include_once '../functions/header/header.php';
?> 
    <link rel="stylesheet" href="../main/css/index2.css" />

 <div class="wrapper fadeInDown">
  <div id="formContent">
      <div align="center">
<form method="POST" class="container" style="width:500px" text-align='center' action="">

         <table>
         <tr>
            <td align="right">
               <label for="name">Nom :</label>
            </td>
            <td>
               <input type="text"class="form-control" placeholder="Votre nom" id="name" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>"  />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="prenom">Prenom :</label>
            </td>
            <td>
               <input type="text"class="form-control" placeholder="Votre prenom" name="prenom" id="prenom"  value="<?php if(isset($prenom)) { echo $prenom; } ?>"  />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mail">Mail :</label>
            </td>
            <td>
               <input type="email"class="form-control" placeholder="Votre mail" id="mail" name="mail"  value="<?php if(isset($mail)) { echo $mail; } ?>" />
            </td>
         </tr>
         <tr>
            
         </tr>
         <tr>
            <td align="right">
               <label for="password">Mot de passe :</label>
            </td>
            <td>
               <input type="password"class="form-control" placeholder="Votre mot de passe" id="password" name="password" />
            </td>
         </tr>
         <tr>
            <td align="right">
               <label for="mdp2">Confirmation du mot de passe :</label>
            </td>
            <td>
               <input type="password"class="form-control" placeholder="Confirmez votre mot de passe" id="mdp" name="mdp" />
            </td>
         </tr>
     
         <tr>
              <td  align="right">
                  <label   for="type">Titre :</label>
              </td>
              <td>
            <select name="titre" id="titre">
               <?php
                  $db = Database::connect();    
                  $statement = $db->query('SELECT * FROM `titre` WHERE `titre`.`id`  ');
                  $categories = $statement->fetchAll();
                  var_dump($categories); 
                  Database::disconnect();  
                  ////////////////////////pour la conexion tes type
               ?>
              <?php foreach ($categories as $category) :?>
                    <option  style="width:50%;" value='<?= $category['id']?>'><?=   $category['nom'];?></option>
                    <?php////////////////////////////recher le nom et id?>

               <?php endforeach;?>	        		 
          </select> 
              </td>
     
          </tr>
          <tr>
            <td></td>
            <td align="center">
               <br />
               <input type="submit"  class='inscris' name="forminscription" value="Je m'inscris" />
            </td>
         </tr>
      </table>
     <?php if(isset($erreur)):?>  
		 <label class="text-danger"><?=$erreur?></label>
	<?php elseif(isset($message)) :?> 
		 <label class=" success " style="color:green;"><?=$message?></label>  
 
      <?php endif?>
</form> 

</div>
</div>
</div>

<?php include '../functions/footer/footer.php' ;?>
