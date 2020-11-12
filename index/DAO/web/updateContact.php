<?php
session_start();
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

use \App\Manager\ProductsManager;
use \App\Entity\Products;

$productManager = new ProductsManager();

    $username= $_SESSION['mail'];
    $id= $_SESSION['id'];
  

    $reponse = unserialize($_COOKIE['produit']);
    //$red = $productManager->read($username);
   $readAll = $productManager->readAll($id);
echo'<br/>';
echo'<br/>';
echo'<br/>';
//$array = array($readAll);

$apprenants = array($readAll);
for($i = 0, $size = count($apprenants); $i < $size; ++$i) {
    echo $apprenants['username'];
  
    echo $apprenants[$i].'<br>';
}


// foreach($array as $read => $autre){

//     $nom= $product->setNomP($nom);

//     var_dump($nom);

// }

 $product = new Products();
// $image= $reponse['image'];
// $nHeuresPom= $reponse['HeuresP'];
// $price= $reponse['price'];
// $id= $reponse['id'];

// $product->setNomP($nom);
// $product->setImage($image);
// $product->setHeuresP($nHeuresPom);
// $product->setPrice($price);


// //var_dump($egale);

//  $sevaIsOk = $productManager->save($product);
//  if($sevaIsOk){
//     $msg = "La voiture a bien été modiffier";
//   //  header ('Location: readAllContact.php');

// }else{
//     $msg = 'la voiture n a pas peu etre modiffier';
// } 

// echo "$msg";
?>

<button  type="submit"><a href="../../panier.php">Retour </a></button>