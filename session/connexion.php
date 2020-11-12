<?php  
session_start(); 

include_once '../admin/database.php';
try{
     $msg = ''; 
     if(isset($_POST['login'])) {   
          $mail = 		     checkInput($_POST['mail']);
          $passweb =      	checkInput($_POST['password']);
          $pass1 = sha1($passweb);
          $salt = "ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V";
          $pass = ($salt.$pass1);
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../main/css/index2.css" />
    
    <?php
$title= 'connexion';

 include_once '../functions/header/header.php';	
?>



<div class="container" > 
     <div class=" fadeInDown">
          <div >
               <div align="center"> 
                              <h1 class="text-logo">Connexion</h1>
               <div class="form-group">
                            <label for="category">Choisir :
                            <?php $db = Database::connect();?>
                            <nav class='center'>
                               <ul class="nav nav-pills">  
                                    <?php $statement = $db->query('SELECT * FROM titre ');
                                        $categories = $statement->fetchAll();?>
                                    <?php foreach ($categories as $category) :?>
                                        <?php  if($category['id'] == 1):?>
                                                <li role="presentation" class="nav-link" ><a href="#<?= $category['id'] ?>" data-toggle="tab"><?= $category['nom']; ?></a></li>
                                            <?php else:?>
                                                <li role="presentation" ><a class='nav-link show active' href="#<?= $category['id'] ?>" data-toggle="tab"><?= $category['nom']; ?>  </a></li>
                                            <?php endif?> 
                                     <!--?php?-->
                             
                                        <?php endforeach ?>
                                    </ul>
                            </nav>
                        <div class="tab-content" id="formContent">
                              <?php  foreach ($categories as $category) :?>
                                   
                                   <?php if($category['id'] == '1'):?>
                                        <div class="tab-pane active" id="<?= $category['id'] ;?>">
                                   <?php else:?>
                                        <div class="tab-pane" id="<?= $category['id'] ;?>">

                                   <?php endif?>
                                   <div class="row">
                                        <span class="help-inline danger"><?php if(isset($idCoError)) echo $idCoError;?></span>
                                             <?php
                                             $statement = $db->prepare('SELECT * FROM titre WHERE titre.id = ?');
                                             $statement->execute(array($category['id']));
                                             while ($item = $statement->fetch()):?> 
                                                            <?php Database::disconnect();?>

                                             <div class="col-sm-12 col-md-12">
                                                       <div class="thumbnail">
                                                            <div class="caption">
                              <form method="POST"  action=''>  
                                   
                                   <!-- recher voir les si une valeur a ete envoyer -->
                                        <div class="col-mg-12"  >
                                             <br/>     
                                             <label>Mail </label>                                           
                                             <br/>     

                                             <input type="email" name="mail" placeholder="Votre mail" value="<?php if (isset($mail)) {echo checkInput($mail);}?>" class="form-control" />  
                                             <br />  
                                             <label>Password</label>  
                                             <input type="password"  placeholder="Votre mot de passe"  name="password"  class="form-control" />  
                                             <br/>
                                        
                                        </div>
                                   <?php if(empty($category['id'])):?>


                                   <?php elseif( $category['id']== '19'): ?>
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
                                   <?php elseif( $category['id'] == '20' ): ?>
                                        <br> 
                                             <label>Votre numero d'étudant </label>
                                             <input type='text' name='numbe' value="<?php if(isset($number)){ echo $number;} ?>" placeholder="Votre Numero 8 chiffre " />
                                        <br>
                                             <?php if(empty($_POST['numbe']) ):?>
                                             <br>
                                                  <?= "Veuillez entrer votre numero d'étudiant  8 chiffre réçu par mail"?>
                                                  <br>
                                             <?php else:?>
                                                  <?php $number =       checkInput($_POST['numbe']);?>
                                                  <?php if(strlen($number) > 8 ):?>

                                                       <p class='bg-danger danger'>Votre numero droit avoir au moins 8 chiffre  </p>              
                                                  <?php endif;?>

                                                  <?php endif;?>
                                                  <?php endif;?>
                                                  <br/>

                                        <input type="radio" hidden checked  name="titre"  value='<?= checkInput($category['id'])?>'><?= $category['nom'];?>
                                        <?php   // var_dump($category['id']); ////////////////////////////recher le nom et id?>
                         
                                        <br/>
                                         <br/>

                                        <input type="submit" name="login" class="btn btn-info" value="Connexion" />  
                                   <br>
                                   <!-- <a href="./inscription.php">Inscrivez vous</a> -->
                                   <br/> 

                                   <!-- <label class="text-success"><?php// if(isset($message)){echo $message;} ?></label>  

                                   <label class="text-danger"><?php// if(isset($msg)){echo $msg;} ?></label>   -->

                              </form> 
                         </div>
                    </div>
               </div>

               <?php endwhile?>
               </div>
          </div>
          <?php endforeach?> 
               <label class="text-success"><?php if(isset($message)){echo $message;} ?></label>  

               <label class="text-danger"><?php if(isset($msg)){echo $msg;} ?></label>  

               </div>
          </div>
          <button type="submit" class='btn btn-primarie'><a href="./inscription.php">Inscrivez vous</a></button>

     </div>
     </div>
</div>
</div>


<?php include '../functions/footer/footer.php' ;?>


