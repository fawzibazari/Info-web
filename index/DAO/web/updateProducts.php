<?php
session_start();
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

use \App\Manager\ProductsManager;
use \App\Entity\Products;
$productManager = new Products();

$productManager = new ProductsManager();

$username=$_SESSION["mail"];
$id=$_SESSION["id"];

$product= $productManager->read($id);
$sevaIsOk = $productManager->create($product);
/*
$product= $productManager->readAll($id);
foreach($product as $key){



echo '<br/>'; 
$key->getUsername();
$key->getDescriptionP();
$key ->getEnvironnementP();
 $key->getPrice();
  $key->getImage();
 $key->getHeuresP();
$key->getNomP();
var_dump($key->getUsername());

} */  
if($sevaIsOk){
    $msg = "Le produit à bien été ajouter";
   $msg= $_SESSION["messages"] = $msg;
  //  header('Location: ../../panier.php');
 // header('location :../../redirection_page.php');

}else{

    $msg = 'le products n a pas peu etre modiffier';
} 

?>


<!DOCTYPE html>
<html>
    <head>
        <title>valide</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo">  </h1>
         <div class="container admin">
            <div class="row">
                <h1><strong><?php if(isset($msg)) echo $msg?></strong></h1>
                <br>
                <form class="form" action="#" role="form" method="post">
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning"><a href="../../panier.php">Retour </a></button>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>


