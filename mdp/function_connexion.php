<?php

function connexion(){ 
    include_once '../admin/database.php';


    $DB = Database::connect();
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if (isset($_POST['oublie'])){

            $mail = htmlentities(strtolower(trim($mail))); // On r�cup�re le mail afin d envoyer le mail pour la r�cup�ration du mot de passe 

            // Si le mail est vide alors on ne traite pas
            if(empty($mail)){
                $valid = false;
                $er_mail = "Il faut mettre un mail";
            }

            if($valid){   
                $mailv= checkInput($mail);
                $verification_mail = $DB->prepare("SELECT * FROM authentification WHERE mail=?");
                $verification_mail->execute(array($mailv));
               // $verification_mail = $reqmail->rowCount();

                // $verification_mail = $DB->query("SELECT id  FROM authentification WHERE  mail= $mailv");

                // $verification_mail->execute(array($mail));

                $verification_mail = $verification_mail->fetch();
                //var_dump($verification_mail);

                if(isset($verification_mail['mail'])){

                    if($verification_mail['n_mdp'] == 0){
                        // On g�n�re un mot de passe � l'aide de la fonction RAND de PHP
                        $new_pass = rand();

                        // Le mieux serait de g�n�rer un nombre al�atoire entre 7 et 10 caract�res (Lettres et chiffres)
                        $new_pass_crypt = crypt($new_pass, "VOTRE CLéé UNIQUE DE CRYPTAGE DU MOT DE PASSE");

                        $objet = 'Nouveau mot de passe';
                        $to = $verification_mail['mail'];
                        $name=$verification_mail["nom"];
                        //===== Cr�ation du header du mail.
                        $header = "From: NOM_DE_LA_PERSONNE <no-reply@test.com> \n";
                        $header .= "Reply-To: ".$to."\n";
                        $header .= "MIME-version: 1.0\n";
                        $header .= "Content-type: text/html; charset=utf-8\n";
                        $header .= "Content-Transfer-Encoding: 8bit";

                        //===== Contenu de votre message
                        $contenu ='
                        <html>
                          <head>
                            <title>Code de modification Mot de passe</title>
                            <meta charset="utf-8">
                          </head>
                          <body>
                            <div align="center">
                            <p style="text-align: center; font-size: 18px"><b>Bonjour Mr, Mme" '.$name.'</b>,</p><br/>
                              <a href="http://localhost/info-web/mdp/connexion.php?key='.$new_pass_crypt.'">Confirmez votre compte clique ici !</a>
                              <b>'.$new_pass_crypt.' votre numéro de connexion</b>
                            </div>
                          </body>
                        </html>
                        ';

                            // "<div class='container'>".
                            // "<a href="http://localhost/info-web/session/confirmation.php?mail='.urlencode($mail).'&key='.$key.'">Confirmez votre compte clique ici !</a>".
                            //     "<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme" .$verification_mail['nom']."</b>,</p><br/>".
                            //     "<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i>".$new_pass_crypt."</p><br/>".
                            // "</div>".
                        //===== Envoi du mail
                        mail($to, $objet, $contenu, $header);
                        $mailBD= checkInput($verification_mail['mail']);
                        // var_dump($mailBD);
                        $mdpv= checkInput($new_pass_crypt);
                        $pass1 = sha1($mdpv);
                        $salt = "ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V";
                        $pass = ($salt.$pass1);
                        $DB = Database::connect();
                        $set=checkInput(1);
                        $verification_mail= $DB->prepare("UPDATE authentification SET `mot-de-passe` = ?, n_mdp=? WHERE mail = ?");
                        $verification_mail->execute(array($pass,$set,$mailBD));

                            // array($new_pass_crypt, $verification_mail['mail']));
                            Database::disconnect();

                    }   
                }       
                $er_mail= "Merci de bien vouloir vérifier sur l'adresse mail que vous avez indiquer.";
            }
        }
    }
}
?>
