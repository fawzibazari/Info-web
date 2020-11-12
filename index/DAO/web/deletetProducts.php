<?php 
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

//use App\Entity\Products;
use \App\Manager\ProductsManager;
use \App\Entity\Products;
$productManager = new ProductsManager();

 // $id $productManager->readAll($_GET['id']);
 if(isset($_POST['suprimer'])){


 $id=  $_GET['id'];

$products= $productManager->readAll($id);

// foreach($products as $product){
// echo '<br/>'; 
// $key->getUsername();
// $key->getDescriptionP();
// $key ->getEnvironnementP();
//  $key->getPrice();
//   $key->getImage();
//  $key->getHeuresP();
// $key->getNomP();

$product= $products->getId();
if($product == $_GET['id']){
    $deleteOk = $productManager->delete($product);

} 
 

if($deleteOk){

    $msg = "Le Products a bien été Supprimer";
    //header ('Location: readAllContact.php');
    header("Location: ../../redirection_page.php"); 


}else{
    $msg = 'le Products n a pas peu etre Supprimer';
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>supprimer</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
<div class="container admin">
       <div class="row">
           <h1><strong>Supprimer un projet </strong></h1>
           <br>
           <form class="form" action="#" role="form" method="POST">
               <input type="hidden" name="id" value="<?php echo $id;?>"/>

               <p class="alert alert-warning"> Etes vous sur de vouloir supprimer ?</p>
               <span><?php if(isset($msg)) echo"$msg";?></span>
               <div class="form-actions">
                 <button type="submit" name="suprimer" class="btn btn-warning">Oui</button>
                 <a class="btn btn-default" href="../../redirection_page.php">Non</a>
               </div>
           </form>
       </div>
   </div> 
   </body>
</html> 