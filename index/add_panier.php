<?php 
include_once './bdd_header.php'; 
$json = array('error'=>true);
if (isset($_GET['id'])){
    $produit =$DB->query("SELECT id FROM projet WHERE id=:id", array('id'=> $_GET['id']));
    if(empty($produit)){
        $json['massage']="ce  produit n'existe pas ";
    }else{
        $panier->add($produit[0]->id);
        $json['error'] = false;  
        $json['massage']="le produit à bien été ajouté dans votre panier";
        header("Location: panier.php");

    }
}else{
        header("Location: it_home_dark.php");

    $json['massage']="vous avez pas ajouter de produit dans le panier ";
}
echo json_encode($json);
?>


<?php include_once '../functions/footer/footer.php' ;?>
