<?php
	//  exit();
  function inscription($nom, $prenom, $mail, $pass, $key, $titre, $db){
   
        $db = Database::connect(); 

    $insertmbr = $db->prepare("INSERT INTO `authentification` ( `nom`, `prenom`, `mail`, `mot-de-passe`, `confirmkey`, `titre` ) VALUES ( ?, ?, ?, ?, ?, ?)");
    //insertion des données dans la base
    $insertmbr->execute([$nom, $prenom, $mail, $pass, $key,  $titre]);

    $header="MIME-Version: 1.0\r\n";
    $header.='From:"[VOUS]"<exodelouis43@mail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message=' 
    <html>
      <head>
        <title>exodelouis43@gmail.com</title>
        <meta charset="utf-8">
      </head>
      <body>
        <div align="center">
          <a href="http://localhost/info-web/session/confirmation.php?mail='.urlencode($mail).'&key='.$key.'">Confirmez votre compte clique ici !</a>
          <b>'.$key.' votre numéro de connexion</b>
        </div>
      </body>
    </html>
    ';
    Database::disconnect();

    mail($mail, "Confirmation de compte", $message, $header);
    }

    function insertStagiaire( $key,$titre,$mail){
      $bdd = Database::connect(); 
							$requser = $bdd->prepare("INSERT INTO `stagiaire` (`keys-word`, `type`,  `username`) VALUES ( ?, ?, ?)");
              $requser->execute([$key,$titre,$mail]);
             // var_dump($mail);
						//	$exist = $requser->rowCount();		
							Database::disconnect();
    }
    function insertIntervenant($key,$titre,$mail){
              $bdd = Database::connect(); 
              $requser = $bdd->prepare("INSERT INTO `intervenant` ( `keys-word`, `type`, `username`) VALUES ( ?, ?, ?)");
              $requser->execute([$key,$titre,$mail]);
            //  $exist = $requser->rowCount();
    }
    function insertFormateur($key,$titre,$mail){
      $bdd = Database::connect(); 
      $requser = $bdd->prepare("INSERT INTO `formateur` ( `keys-word`, `type`,  `username`) VALUES ( ?, ?, ?)");
      $requser->execute([$key,$titre,$mail]);
    //  $exist = $requser->rowCount();
      Database::disconnect();
}


////////////////////////////////////////////////////////////////////////////////////////////////////////


  ?> 
     