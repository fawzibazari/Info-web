<?php 
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

 ///////////////////////////////////////
 use \App\Manager\ProductsManager;
//use \App\Entity\Voiture;

$productManager = new ProductsManager();
//$voitureManager->read($_GET['id']);
//var_dump($_GET['id']);
   $productM =  $productManager->read($_GET['id']);
  //var_dump($productM);

?>





    <form method="POST" action="updateContact.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="nom">Nom :</label>
                  </td>
                  <td>
                     <input type="titreP" placeholder="Votre nom" id="titreP" name="nom" value="<?= $productM->getNomP()?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="price"> Price :</label>
                     <input type="hidden" name='id' value="<?= $productM->getId()?>">

                  </td>
                  
                  <td>
                     <input type="text" placeholder="Votre prix" id="price" name="price" value="<?= $productM->getPrice()?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="description">Bescription :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre  description" id="Last" name="descriptionP" value="<?=  $productM->getDescriptionP() ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="environnement">Environnement :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre environnement" id="environnement" name="environnementP" value="<?= $productM->getEnvironnementP() ?>" />
                  </td>
               </tr>
              
      
               <tr>
                  <td align="right">
                     <label for="nbHeures"> Nombre d'Heures :</label>
                  </td>
                  <td>
                     <input type="number" placeholder="Confirmez votre Nombre d'Heures" id="nbHeures" name="NHeuresP" value="<?= $productM->getNHeuresP() ?>" />
                  </td>
               </tr>
               <tr>
                    <td align="right">
                     <button href="updateContact.php?id=<?= $productM->getId()?>" type="submit">Modif</button> 
                     <button  type="submit"><a href="./readAllContact.php">Retour </a></button>
                    </td>
               </tr> 
            </table>
            <p><?php if (isset($message)){echo $message;}?></p>

         </form>

