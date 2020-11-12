<?php  
session_start(); 

include_once '../admin/database.php';
try{
     $msg = ''; 
     if(isset($_POST['login'])) {   
          $mail = 		checkInput($_POST['mail']);
          $passweb =      	checkInput($_POST['password']);
          $pass = sha1($passweb);

          if(!empty($_POST['mail'])  AND !empty($_POST['password'])) {
               if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $db = Database::connect(); 

                    if(!empty($_POST['titre'])){ 
                         $titre =      	checkInput($_POST['titre']);

                         if( $titre == '19' ){ 
                              $erreur= 'selection votre statut';
                              if (!empty($_POST['numbe'])){
                                   $number =       checkInput($_POST['numbe']);

                                  // include_once '../admin/connexion_function_stagiaire.php';	
                                   //echo $number;
                              }else{
                                   $msg= "Votre code stage";
                              }
                         }elseif($titre == '20' ){
                              if (!empty($_POST['numbe'])){
                                   $number =       checkInput($_POST['numbe']);

                                   include_once '../admin/connexion_function_stagiaire.php';	
                                   //echo $number;
                                   //echo $msg;	


                              }else{
                                   $msg= "Votre code stage";
                              }     
                         }elseif( $titre !== '20' ){
                              include_once '../admin/connexion_functions.php';	
                             //echo $msg;	
                         } 
                    }else{
                         $msg= "Selectionner votre titre  ";
                    } 
               }else{
                    $msg= "Votre mail n'est pas valide ";
               }  
       
          }else{
               $msg = "Tous les champs doivent être complétés !";
          }

     }
          
}catch(PDOException $error) {  
     $msg = $error->getMessage();  
}
 ?>  

                    <?php include_once '../functions/header/header.php'; ?> 
                    <link rel="stylesheet" href="../main/css/index2.css" />

<div class="container" > 

     <div class="wrapper fadeInDown">
          <div id="formContent">
               <div align="center">   
                    <h3>CONNEXION</h3><br />  

                         <form method="POST"  action=''>  
                    
                              <?php
                              
                                   $db = Database::connect();    
                                   $statement = $db->query('SELECT * FROM `titre` WHERE `titre`.`id`  ');
                                   $categories = $statement->fetchAll();
                                   //var_dump($categories); 
                                   Database::disconnect();  

                                   ////////////////////////pour la conexion tes type
                                   ?>                  		 
                                   <!-- recher voir les si une valeur a ete envoyer -->
                                        <div class="col-mg-8"  >
                                             <br/>     
                                             <label>Mail </label>                                           
                                               <br/>     
  
                                             <input type="email" name="mail" placeholder="Votre mail" value="<?php if (isset($mail)) {echo $mail;}?>" class="form-control" />  
                                             <br />  
                                             <label>Password</label>  
                                             <input type="password"  placeholder="Votre mot de passe"  name="password" value="" class="form-control" />  
                                             <br/>
                                        
                                        </div>
                              <?php if(empty($_POST['titre'])):?>

                                        <?= '<br/>selection votre statut';?>

                              <?php elseif( $_POST['titre'] == '19'): ?>
                                        <br> 
                                        <label>Votre numero d'amin </label>
                                        <input type='text' name='numbe' value="<?php if(isset($number)){ echo $number;} ?>" placeholder="Votre Numero 8 chiffre " />
                                        <?= '<br/>selection votre statut';?>
                                        <? include_once '../admin/inscription_function.php';?>
                                        <?php if(empty($_POST['numbe']) ):?>
                                             <?= "Veuillez entrer votre numero d'administateur à  8 chiffre"?>
                                        <?php else:?>
                                             <?php $number =       checkInput($_POST['numbe']);?>
                                             <?php if(strlen($number) > 8 ):?>
                                                  <p class='bg-danger danger'>Votre numero droit avoir au moins 8 chiffre  </p>  
                                                  <?php endif;?>
                              
                                             <?php endif; ?>

                                   <!-- coptur des si valeur éga a stagiaire -->
                              <?php elseif( $_POST['titre'] == '20' ): ?>
                                   <br> 
                                        <label>Votre numero d'étudant </label>
                                        <input type='text' name='numbe' value="<?php if(isset($number)){ echo $number;} ?>" placeholder="Votre Numero 8 chiffre " />
                                   <br>
                                        <?php if(empty($_POST['numbe']) ):?>
                                             <?= "Veuillez entrer votre numero d'étudiant  8 chiffre"?>
                                        <?php else:?>
                                             <?php $number =       checkInput($_POST['numbe']);?>
                                             <?php if(strlen($number) > 8 ):?>

                                                  <p class='bg-danger danger'>Votre numero droit avoir au moins 8 chiffre  </p>              
                                             <?php endif;?>

                                             <?php endif;?>
                                   
                         

                              <?php endif;?>
                              <br/>

                              <?php foreach ($categories as $category) :?>
                                   <input type="radio" name="titre"  value='<?= $category['id']?>'><?= $category['nom'];?>
                                   <?php////////////////////////////recher le nom et id?>
                              <?php endforeach;?>


                              <br/>
                              <br/>

                                   <input type="submit" name="login" class="btn btn-info" value="Connexion" />  
                                   <br>
                                   <a href="./inscription.php">Inscrivez vous</a>
                              <br/> 

                              <label class="text-success"><?php if(isset($message)){echo $message;} ?></label>  

                              <label class="text-danger"><?php if(isset($msg)){echo $msg;} ?></label>  

                         </form> 

          </div>
     </div>
     </div>
</div>

              

                 
<?php include '../functions/footer/footer.php' ;?>
