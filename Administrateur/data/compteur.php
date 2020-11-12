<?php 
require_once 'auth.php';
require_once 'data.php';

$annee=  (int)date("Y");
$annee_select  =empty($_GET ['annee'])? $annee : (int) $_GET['annee'];
$mois_select= empty($_GET ['mois'])? date('m') : (int) $_GET['mois'];
if($annee_select  && (int) $mois_select){
    $total =nombre_vues_mois($annee_select ,  $mois_select);
    $detail= nombre_vues_detail($annee_select, $mois_select);
}else{
    $total = ajouter_vue();
}
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
//require_once '../header.php';

?>
<div class="container">
    <div class="row">

        <div class="col col-md-4">
            <div class="list-group">
                <?  for($i = 0; $i <= 5 ; $i++):?>
                <?php $i ?>
                    <a class="list-group-item <?= $annee - $i === $annee_select ?  "list-group-item ": '';?> " href="compteur.php?annee <?=   $annee-$i?>" > 
                        <?= $annee - $i ?> 
                    </a>

                <div class="list-group">
                    <? if($annee):?>
                            <div class="list-group">
                                <?foreach($mois as $key => $nom ):?>
                                    <a class="list-group-item <?=$key === $mois_select ? "list-group-item ": '';?>" href="compteur.php?annee=<?= $annee_select ?> &mois <?= $key?>">
                                        <?= $nom?>
                                    </a>
                                <?endforeach;?>
                            </div>
                        <?endif;?>
                </div>

                <?endfor?>
            </div>
        </div>
        <div class="col col-md-8">
            <div class="card"> 
                <strong style="font-size:3em"><?=$total?></strong>
                visite 
                <?  if(isset($detail)):?>
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
                        <tbody>
                            <?foreach($detail as $ligne):?>
                            <td>
                                <?= $ligne['annee']?>

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
                            <?endforeach?>
                        </tbody>
                    </table>
                    <?endif?>
            </div>

        </div>
    </div>
</div>



<?php //require_once '../footer.php';?>

