<?php 
session_start();

require 'bdd_header.php';
$DB = new DB();

$emailUser = $_SESSION["mail"];
 $typeUser = $_SESSION["titre"];
///////////////////////////////////////////////////
if(isset($_SESSION['mail'], $_GET['id'])){
   $egale =  $_GET['id'];
 $username= $_SESSION['mail'];

}  
//var_dump($egale);


  $products =$DB->query("SELECT * FROM projet WHERE id=:id", array('id'=> checkInput($egale)));
  include_once './insertion_projet.php'; 
  $title= 'mise_ajour projet';
?>
<link rel="stylesheet" href="../main/css/index2.css" />

<?php include_once '../functions/header/header_profil.php'; ?>

<?php foreach ($products as $productM):?>
    <form method="POST" action="">
    <div class="full_bt ">
         <div class="wrapper fadeInDown">
            <div class='container' style="background:#777 !important;">
               <br>
                     <label for="nom">Nom :</label>
                 <br>

                     <input type="text" placeholder="Votre nom" id="titreP" name="nomP" value="<?= checkInput($productM->nomP)?>" />
                 <br>
                     <label for="price"> Price :</label>

                  <br>
                  
                  <td>
                     <input type="number" placeholder="Votre prix" id="price" name="price" value="<?= checkInput($productM->price)?>" />
                  <br>
                     <label for="descriptionP">Bescription :</label>
                  <br>
                     <textarea type="text" placeholder="Votre  description" id="descriptionP" name="descriptionP"  > <?=  checkInput($productM->descriptionP) ?></textarea>
                  <br>
                     <label for="environnement">Environnement :</label>
                  <br>
                     <textarea type="text" placeholder="Votre environnement" id="environnement" name="environnementP"  ><?= checkInput($productM->environnementP) ?></textarea>
                 <br>
                     <label for="NbHeures"> Nombre d'Heures :</label>
                  </br>
                     <input type="number" placeholder="Confirmez votre Nombre d'Heures" id="NHeures" name="NHeuresP" value="<?= checkInput($productM->NHeuresP) ?>" />
                     
                
               <label for="image">Sélectionner une image:</label>
                 <br>
                     <div class="form-group "><?php echo $image?>
                           <input type="url" id="image" name="image" value="<?php if(isset($image)) echo checkInput($image);?>"> 
                           <span class="help-inline text-danger"><?php if(isset($imageError)) echo checkInput($imageError);?></span>
                     </div>
                  

                     <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil">Modif</button> 
                     <button  type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><a href="./redirection_page.php">Retour </a></button>  

            </div>
            <p class="btn btn-success"><?php if (!empty($msg)){echo $msg;}?></p>

         </form>
        </div> 
        </div> 

         <?php endforeach?>


