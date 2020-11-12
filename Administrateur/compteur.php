<?php session_start();
if(isset( $_SESSION['mail'] )):?>

<?php


require_once './data/data.php';
require_once './data/auth.php';

$myconnexion= user_connect();

$annee=  (int)date("Y");
$Mois =  (int)date("m");



$annee_select = empty($_GET ['annee'])? $annee : (int)  $_GET['annee'];
$mois_select =  empty($_GET ['mois'])? $Mois :  $_GET['mois'];
if(isset($annee_select , $mois_select)){
    $total =nombre_vues_mois($annee_select , $mois_select);
    $detail= nombre_vues_detail($annee_select, $mois_select);
}else{
    $total = ajouter_vue();
}
 $i=null;
// var_dump( $detail);
// exit();
$select = $annee-$i >= $annee_select;

$mois=[
    '01'=>"Janvier",
    '02'=>"Fevrier",
    '03'=>"Mars",
    '04'=>"Avril",
    '05'=>"Mai",
    '06'=>"Juin",
    '07'=>"Juillet",
    '08'=>"Aout",
    '09'=>"Septembre",
    '10'=>"Octobre",
    '11'=>"Novembre",
    '12'=>"Decembre"

];
$title= 'Compter';
$title= 'Compter';
$_SESSION["titre"] = 19;
require_once '../functions/header/header.php';

?>
          
<div class="container">
    <div class="row">

        <div class="col col-md-4">
            <div class="list-group">
                
               <?php for($i = 0; $i < $select ; $i++):?>
                    <a class="list-group-item <?= $annee - $i === $annee_select ? "active ": '';?> " href="compteur.php?annee <?= $annee - $i ?>" > 
                        <?= $annee-$i?> 
                        <?php $select = $annee-$i >= $annee_select; ?>
                        
                    </a>
                        <?php if($select):?>
                            <div class="list-group">

                                <?php foreach($mois as $key => $nom ):?>
                                    <a class="list-group-item<?= $key == $mois_select ? " active ": '';?>" href="compteur.php?<?=$annee?>-<?= $key ?>">
                                        <strong><?=$annee."-". $nom ;?></strong>
                                    </a>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>

                <?php endfor;?>
            </div>
        </div>

       
        <div class="col col-md-8">
            <div class="card"> 
                <strong style="font-size:3em">visites total : <?=$total?>  </strong>
                <ul class="navbar-nav">
                    <?php if($myconnexion !== session_status()) :?> 
                        
                        <strong><a href="logout.php"> Se deconnecter</a></strong>
                    <?php else:?>
                            salut

                    <?php endif ?>

                </ul>
                <?php  if(isset($detail)):?>
                    <h3>Detail des visite pour le mois</h3>
                    <table class="table table-striped">
                        <thead>
                            <th>
                                Annee
                            </th>   
                            <th>
                                Mois
                            </th>
                        
                            <th>
                                Jour
                            </th>
                            <th>
                                Nombre de visite
                            </th>
                        </thead>
                        <?php foreach($detail as $ligne):?>

                        <tbody>
                        <?php /*var_dump($detail);
                                    exit();*/
                        ?>
                            <td>
                                <?= $ligne['annee'] ?>

                            </td>
  
                            <td>
                                <?= $ligne['mois']?>

                            </td>
                            <td>
                                <?= $ligne['jour']?>

                            </td>
                            <td>
                                <?= $ligne['visites']?>
                            </td>
                        </tbody>
                        <?php endforeach?>

                    </table>

                <?php endif?>
            </div>

        </div>
    </div>
</div>
 <?php else: ?>
 <?php header("location: logout.php ");?>
 <?php endif ?>


