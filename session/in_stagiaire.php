<?php
try{ 
include_once '../admin/database.php';
if(session_start()){
        $error = '';

    $emailUser = $_SESSION["mail"];  $keyUser = $_SESSION["confirmkey"];
   if( $emailUser == null || $$keyUser == null){
    header("Location: ../index/index.php");

   }
    //var_dump($keyUser);
    // session
    if(isset( $emailUser)){
        $db = Database::connect();
//  verification existe
        $reqmail= $db->prepare("SELECT * FROM `stagiaire` WHERE `username`=? AND `keys-word`=? ");
        $reqmail->execute(array($emailUser,$keyUser));
            //var_dump($reqmail);

        $exist = $reqmail->rowCount();
// deja dans la base
        if($exist > 0){
        $msg = "probleme data exited ";
        $_SESSION["username"] = $emailUser;
         $_SESSION["confirmkey"]; 
            var_dump($username,$keyUser);
                header("Location: ../index/index.php");
        }else{

                $statement = $db->prepare("SELECT * FROM `authentification` WHERE `authentification`.`mail`=? AND authentification.`confirmkey`=?");
                $statement->execute([$emailUser,$keyUser]);
                $mailexist = $statement->rowCount();
                if($mailexist == 0){
                    $error = "probleme data votre mail et key n'existe pas ";
                }else{
            //var_dump($statement);
                foreach ($statement as $pnom ){
                    $preN= $pnom['prenom'];
                    $Nm= $pnom['nom'];
                    $username= $pnom['mail'];
                    $key= $pnom['confirmkey'];
                    $type = $pnom['titre'];
                }
               include_once '../admin/stagiaire_admin.php';
            }

        }
        Database::disconnect();
    }
}
checkInput('data'); 

}catch(PDOException $error) { 
    die("vous exister déja dans la base") ;
    $msg = $error->getMessage();  
}
include_once '../functions/header/header.php';

?> 
    <div class="container admin">
            <div class="row">
                <div class="col-md-4">
                <h3>  Prenom :  </h3>          <b><?= $preN;?> </b>  
                <h3>  Nom :     </h3>           <b><?= $Nm;?></b>
                <h3>  Numéro étudiant :</h3>  <b><?= $key;?></b>
                <h3>  Mail :</h3>             <b> <?= $username;?></b>  
                <?= $error;?>
            </div>
            <div class="col-md-8">
                <form class="form" action=" " role="form" method="post" enctype="multipart/form-data">
                  
                    <div class="form-group">
                        <label for="telephone">Votre numéro de téléphone	:</label>         
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone" value="<?php if(isset($telephone)) echo checkInput($telephone)	;?>">
                        <span class="help-inline text-danger"><?php if(isset($dnError)) echo $dnError;?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">Année de naissance: </label>
                        <input type="text"  class="form-control " id="date" name="date" placeholder="10.12.2001" value="<?php if(isset($age)) echo checkInput($age);?>">
                        <span class="help-inline text-danger"><?php if(isset($anxError)) echo $anxError;?></span>
                    </div>
                    <div class="form-group">
                            <label for="motivation"> Votre motivation:</label>
                            <textarea type="text" class="form-control" id="motivation" name="motivation" placeholder="motivation" value="<?php if(isset($motivation))   echo checkInput($motivation);?>"></textarea>
                            <span class="help-inline text-danger"><?php if(isset($motivationError)) echo $motivationError;?></span>
                        </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image">Sélectionner une image:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline text-danger"><?php if(isset($imgError)) echo $imgError;?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cv">Sélectionner une CV:</label>
                            <input type="file" id="cv" name="cv"> 
                            <span class="help-inline text-danger"><?php if(isset($cvError)) echo $cvError;?></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="category">Formations:
                            <?php $db = Database::connect();?>
                            <nav>
                               <ul class="nav nav-pills">  
                                    <?php $statement = $db->query('SELECT * FROM formation ');
                                        $categories = $statement->fetchAll();?>
                                    <?php foreach ($categories as $category) :?>
                                        <?php $idCo = '';  ?>

                                        <?php  if($category['idFormation'] == $idCo):?>
                                                <li role="presentation" class="active" ><a href="#<?= $category['idFormation'] ?>" data-toggle="tab"><?= $category['nomFormation']; ?></a></li>

                                            <?php else:?>
                                                <li role="presentation" ><a href="#<?= $category['idFormation'] ?>" data-toggle="tab"><?= $category['nomFormation']; ?>  </a></li>

                                            <?php endif?> 
                                     <!--?php?-->
                             
                                        <?php endforeach ?>
                                    </ul>
                            </nav>
                        <div class="tab-content">
          
                        <?php  foreach ($categories as $category) :?>
                          
                            <?php if($category['idFormation'] == '1'):?>
                                 <div class="tab-pane active" id="<?= $category['idFormation'] ;?>">
                            <?php else:?>
                                 <div class="tab-pane" id="<?= $category['idFormation'] ;?>">

                            <?php endif?>
                                <div class="row">
                              <?php
                              $statement = $db->prepare('SELECT * FROM formation WHERE formation.idFormation = ?');
                              $statement->execute(array($category['idFormation']));
                              while ($item = $statement->fetch()):?> 
                    
                                  <div class="col-sm-10 col-md-8">
                                          <div class="thumbnail">
                                              <div class="caption">
                                               <?php   //var_dump($category['idFormation'])?>
                                              <input type="radio" name="idFormation"  value='<?= checkInput($category['idFormation']);?>' >

                                              <p>  sélectionner ici la formation  </p>
                                                  <p> <?= $item['description'] ?> </p>
                                                  <p> <?= $item['environnementF'] ?> </p>
                                              </div>
                                          </div>
                                      </div>
          
                              <?php endwhile?>
                             
                                    </div>
                                  </div>
                          <?php endforeach?>
                                        <?php Database::disconnect();?>
                        </div>
                        
                        <br>                        
                    </div>  
                    <br>
                    
                    <br>
                    <div class="form-actions">
                    <div class=" col-md-6">
                                <p class="center">
                                    <input type="submit" class="btn btn-success" name='ajouter' value='Ajouter'>
                              </p>
                            <p class="center">
                                <a class="btn btn-primary" href="../index/index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                              </p>
                    </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

<?php include_once '../functions/footer/footer.php' ;?>
