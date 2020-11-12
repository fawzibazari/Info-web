<?php 
session_start();
require 'db.class.php';
if(isset($_POST['suprimer'])){ 
    $DB = new DB(); 

if(isset($_SESSION['mail'], $_GET['id'])){

//var_dump($_GET['id']);


 //$productManager->readAll($_GET['id']);
    $egale =  $_GET['id'];
  $username= $_SESSION['mail'];
  //var_dump($egale);
 
 
$product= $DB->read($egale);

$deleteOk = $DB->delete($product);

if($deleteOk){

    $msg = "Le Products a bien été Supprimer";
    header("Location: ./redirection_page.php"); 

}else{
    $msg = 'le Products n a pas peu etre Supprimer';
}
 }else {
     $msg ="Vous ne  pouvez pas supprimer une chose que vous apartienpas";
 }
}
?>
<?php include_once '../functions/header/header_profil.php'?>

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
                      <a class="btn btn-default" href="./redirection_page.php">Non</a>
                    </div>
                </form>
            </div>
        </div> 
