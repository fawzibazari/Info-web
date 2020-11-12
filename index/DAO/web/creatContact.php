<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

use \App\Manager\ProductsManager;
use \App\Entity\Products;

$productManager = new ProductsManager();
$product = new Products();

$product=$productManager->read($_POST['id']);
var_dump($product->fetchObject($_GET['typeP']));

$product->setTypeP($_POST['typeP'])
        ->setDescriptionP($_POST['descriptionP'])
        ->setEnvironnementP($_POST['environnementP']);
       




    $sevaIsOk = $productManager->save($product);
    var_dump($sevaIsOk);
     die($sevaIsOk);
     exit();

    if($sevaIsOk){
        $message = 'Le Products a  été ajoutée';
        header ('Location: form_update_products.php');
    }else{
        $message = 'Le Products n\'a pas été ajoutée';

    }

    echo "$message";