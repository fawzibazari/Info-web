<?php 
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

//use App\Entity\Products;
use \App\Manager\ProductsManager;
use \App\Entity\Products;
$productManager = new ProductsManager();

 //$productManager->readAll($_GET['id']);
$product= $productManager->read($_GET['id']);

$deleteOk = $productManager->delete($product);

if($deleteOk){

    $msg = "Le Products a bien été Supprimer";
    //header ('Location: readAllContact.php');

}else{
    $msg = 'le Products n a pas peu etre Supprimer';
}

echo "$msg";
?>
<button  type="submit"><a href="./readAllContact.php">Retour </a></button>