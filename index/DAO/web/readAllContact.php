<?php 
include_once '../App/Entity/products.php';
include_once '../App/Manager/productsManager.php';

use App\Manager\ProductsManager;
use \App\Entity\Products;

$conttactManager = new ProductsManager();
$products = $conttactManager->readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(empty($products)):?>
    <p>Il y a aucun Products à afficher</p>
    <?php else :?>
        <?php if($products === false):?>
        <p>une erreur est survenu</p>
        <?php else :?>
        <table>
                <?php foreach ($products as $key) :?>
                <tr align="center">
                    <td align="center">
                        <label for="Last"><i><?= $key->getTypeP()?></i></label>       
                    </td>
                    <td align="center">
                        <label for="Last"><i><?= $key->getDescriptionP()?></i></label>
                    </td>
                    <td align="center">
                        <label for="Last"><i><?= $key->getEnvironnementP()?></i></label>
                    </td>
                    <td align="center">
                        <label for="Last"><i><?= $key->getNomP()?></i></label>
                    </td>
                    <td align="center">
                    <b><a href="form_update_contact.php?id=<?= $key->getId()?>">Modifier </a></b>
                    </td>
                    <td align="center">
                    <b onclick="popbox()"><a href="#">Suprimer </a></b>
                    </td>
                </tr>              
                <?php endforeach ?>
        </table>
       <?php endif ?>
    <?php endif ?>
    <p id='sup'> <a href='./index.php' > Retour</a></p>
<?php if(isset( $msg)){echo $msg;}?>
 <!-- <script src="./script.js"></script>  -->
</body>
</html>
<script>

function supprimer() {
    window.location.assign('deleteContact.php?id=<?= $key->getId()?>', "MsgWindow", "width=800,height=500");
}
function popbox() {
var txt;
if (confirm("êtes-vous sûr de vouloir vous supprimer ces valeurs !")) {
    text =  supprimer();
    text ="<a style='color:red;' href='deleteContact.php?id=<?= $key->getId()?>' >  Le Products a bien été Supprimer </a> ";

} else {
    text = " <a href='./index.php' > Retour</a>";

}
    document.getElementById("sup").innerHTML = text;
}
</script>