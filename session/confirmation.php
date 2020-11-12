<?php
	session_start(); 

	include_once '../admin/database.php';
	include_once '../admin/inscription_function.php';	

	$bdd = Database::connect(); 

	if(isset ($_GET['mail'], $_GET['key']) AND !empty($_GET['mail']) AND !empty($_GET['key']) ) {
	//	inscription($nom, $prenom, $mail, $pass, $key, $titre, $db);

	   $mail = checkInput(urldecode($_GET['mail']));
	   $key = checkInput($_GET['key']);
	   $requser = $bdd->prepare("SELECT * FROM authentification WHERE mail = ? AND confirmkey = ?");
	   $requser->execute(array($mail, $key));
	   $userexist = $requser->rowCount();
	   if($userexist == 1) {
	      $user = $requser->fetch();
	      if($user['confirme'] == 0) {
	         $updateuser = $bdd->prepare("UPDATE authentification SET confirme = 1 WHERE mail = ? AND confirmkey = ?");
	         $updateuser->execute(array($mail,$key));
	         echo "Votre compte a bien été confirmé !";
	      } else {
	         $message= "Votre compte a déjà été confirmé !";
	      }
	   } else {
	      $error= "L'utilisateur n'existe pas !";
	   }
	}
	Database::disconnect();

?>
	<?php if(isset($message, $error) ) { echo $message; echo $error;}?>

