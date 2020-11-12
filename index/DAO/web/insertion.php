<?php session_start()?>
<?php 

include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

use \App\Manager\ProductsManager;
use \App\Entity\Products;
$product = new Products();


$product = $productManager->readAll($_GET['id']);
function checkInput( $product = array()) 
{
  $product = trim($product);
  $product = stripslashes($product);
  $product = htmlspecialchars($product);
  
  return $product;
}
//var_dump($product);echo" $product .<br/>";

        if($_POST['descriptionP']  ==null || $_POST['environnementP']  ==null || $_POST['price']  ==null ||  $_POST['nomP'] ==null){
            $message = 'les champs ne doivent pas rester vide';
        }else{ 
            
            $product->setDescriptionP($_POST['descriptionP'])
            ->setEnvironnementP($_POST['environnementP'])
            ->setPrice($_POST['price'])
            ->setImage($_POST['image'])
            ->setNomP($_POST['nomP'])
            ->setNHeuresP($_POST['NHeuresP']);
                
                $productManager = new ProductsManager();
               checkInput($product);

                $sevaIsOk = $productManager->save($product);

                var_dump($product);
                //die($sevaIsOk);
                //exit();
            
                if($sevaIsOk){
                    $message = 'une Products a  été ajoutée';
                //   header ('Location: readAllContact.php');
            
                }else{
                    $message = 'aucune Products n\'a pas été ajoutée';
            
            
                }
        

        }
      
    
    
        // ->setTypeP($_POST['typeP']) 



    echo "$message";