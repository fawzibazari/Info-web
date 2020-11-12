<?php if(session_start()):?>
<?php    

    include_once '../admin/database.php';

    
        $emailUser = $_SESSION["mail"]; $typeUser = $_SESSION["titre"];
    if($emailUser ==null){
            header("Location: connexion.php");

    }
        if(isset( $emailUser)){
         $db = Database::connect();
         $reqmail= $db->prepare("SELECT * FROM `formateur` WHERE `username`=? AND `type`=? ");
         $reqmail->execute(array($emailUser, $typeUser));
         $mailexist = $reqmail->rowCount();
            if($mailexist == 0){
                $msg = "probleme data ";
            }else{
                $statement = $db->query("SELECT * FROM `authentification` WHERE `authentification`.`mail`= '$emailUser'");
               // var_dump($statement);
                foreach ($statement as $pnom ){
                   $preN= $pnom['prenom'];
                   $Nm= $pnom['nom'];


                }
                $msg = "<p>$emailUser</p><a href='./logout.php'>Deconnexion</a> <br /><br />"; 

                include_once '../admin/formateur_admin.php';
                
          
            }

            Database::disconnect();
       
    }
    ?>

<?php include_once '../functions/header/header_profil.php';
    $title= 'Profil-';
?>



    <?//template_header('Home')?>
      <div class="container admin">
        <div class="row">

            <div class="col-md-4">
            <?= $preN;?>     
            <?= $Nm;?> 
            <?= $msg?> 
            <div class="col-md-3">
            <img src="../images-bdd/formateurPhoto/<?php if(isset($image)) echo $image;?>" alt="">  

            </div> 
            </div>
            <div class="col-md-8">
                <form class="form" action="" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="domaine">Domaine Spetialisation:</label>         
                        <input type="text" class="form-control" id="domaine" name="domaine" placeholder="domaine" value="<?php if(isset($domaine)) echo $domaine;?>">
                        <span class="help-inline text-danger"><?php if(isset($dnError)) echo $dnError;?></span>
                    </div>
                 
                    <div class="form-group">
                        <label for="date">Année d'experence: </label>
                        <input type="number"  class="form-control " id="date" name="date" placeholder="date" value="<?php if(isset($age)) echo $age;?>">
                        <span class="help-inline text-danger"><?php if(isset($anxError)) echo $anxError;?></span>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image">Sélectionner une image:</label>
                            <input type="file" id="image" name="image" value='<?php if(isset($image)) echo checkInput($image);?>' > 
                            <span class="help-inline text-danger"><?php if(isset($imgError)) echo $imgError;?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cv">Sélectionner une CV:</label>
                            <input type="file" id="cv" name="cv"> 
                            <span class="help-inline text-danger"><?php if(isset($cvError)) echo $cvError;?></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name='ajouter'><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form >
                <br>

                <form class="form" action="" role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="category">Catégorie:</label>

                        <?php
                           $db = Database::connect();
                           foreach ($db->query("SELECT * FROM `titre` WHERE `titre`.`id`= $typeUser ") as $row) :?>
                            <?php
                                    $categorie= $row['nom']; 
                                    $nomFormation=''; $description=''; $environnementF=''; $NHeures=''; $photoF= '';
                                        insertFormation($nomFormation,$description,$environnementF,$NHeures,$photoF);
                                    
                                ?>
                                <span class="help-inline"><?php if(isset($categorie )) {echo $categorie ;}?></span> <samp class='help-inline text-danger'>merci de bien vouloir compléter ce formulaire!</samp>
                                <hr/>                   
                                <div class="form-group">
                                    <label for="nomFormation">Nom de la formation:</label>
                                    <input type="text" class="form-control" id="nomFormation" name="nomFormation" placeholder="dévelopeur web" value="<?php if(isset($nomFormation))  echo checkInput($nomFormation);?>">
                                    <span class="help-inline text-danger"><?php if(isset($nfError)) echo $nfError;?></span>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description de la formation:</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="description" value="<?php if(isset($description))   echo checkInput($description);?>"></textarea>
                                    <span class="help-inline text-danger"><?php if(isset($dcError)) echo $dcError;?></span>
                                </div>

                                <div class="form-group">
                                    <label for="environnementF">Langage de programation:</label>
                                    <input type="text" class="form-control" id="environnementF" name="environnementF" placeholder="Langage JS PHP JAVA" value="<?php if(isset($environnementF)) echo checkInput($environnementF);?>">
                                    <span class="help-inline"><?php if(isset($evError)) echo $evError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="NHeures">Nombre d'heures de formation:</label>
                                    <input type="number"  class="form-control" id="NHeures" name="NHeures" placeholder="980 heures" value="<?php if(isset($NHeures)) checkInput($NHeures);?>">
                                    <span class="help-inline text-danger"><?php if(isset($nhError)) echo $nhError;?></span>
                                </div>
                        <div class="form-group col-md-6">
                            <label for="photoF">Sélectionner une image:</label>
                            <input type="file" id="photoF" name="photoF" value="<?php if(isset($image)) echo $image;?>"> 
                            <span class="help-inline text-danger"><?php if(isset($photoFError)) echo $photoFError;?></span>
                        </div>
                            
                          <?php Database::disconnect();?>
                          <?php endforeach?>
                    </div>
           
                   
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name='ajouteF'><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
                <br>

            </div>
        </div>
    </div>
<?php include '../functions/footer/footer.php' ;?>
   <?php endif?>