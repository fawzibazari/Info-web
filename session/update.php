<?php 
if(session_start()){
    include_once '../admin/database.php';        
            $emailUser = $_SESSION["mail"];
         //  var_dump($emailUser);
 
            if($emailUser ==null){
               header("Location: connexion.php");
        
            }
                if(isset( $emailUser)){
                 $db = Database::connect();
                 $reqmail= $db->prepare("SELECT username FROM `stagiaire` WHERE `username`=?");

                 $reqmail->execute(array($emailUser));
                 $mailexist = $reqmail->rowCount();
                    if($mailexist == 0){
                        $msg = "probleme data ";
                    }else{
                        $statement = $db->query("SELECT * FROM `authentification` WHERE `authentification`.`mail`= '$emailUser'");
                       // var_dump($statement);
                       $reqmail->execute(array($emailUser));

                        foreach ($statement as $pnom ){
                           $preN= $pnom['prenom'];
                           $Nm= $pnom['nom'];
                            $confirmkey =$pnom['confirmkey'];
                        }
                        if(empty($_POST['idFormation'])) 
                        { 
                            $idCoError = 'Ce champ ne peut pas être vide';
                        }

                        $msg = "$emailUser.</p><a href='./logout.php'>Deconnexion</a> <br /><br />"; 
        
                        include_once '../admin/update_stagiaire.php';
                        
                    }
        
                    Database::disconnect();
               
            }
        }
        include_once '../functions/header/header_profil.php';
        ?>
        



        <div class="container admin">
            <div class="row">
            
                <div class="col-sm-6">
                    <h1><strong>Modifier un profil</strong></h1>
                    <br>
                    <span class="help-inline"><?php if(isset($msg)) echo $msg;?></span>

                    <form class="form" action="" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="telephone">Telephone:
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone" value="<?php if(isset($telephone)) echo checkInput($telephone);?>">
                            <span class="help-inline"><?php if(isset($telephoneError)) echo $telephoneError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="motivation">Description motivation:
                            <textarea type="text" class="form-control" id="motivation" name="motivation" placeholder="motivation"> <?php if(isset($motivation)) echo checkInput($motivation);?> </textarea>
                            <span class="help-inline"><?php if(isset($motivationError)) echo $motivationError;?></span>
                        </div>
                        <div class="form-group">
                        <label for="age">Age:
                            <input type="number" step="0.01" class="form-control" id="age" name="age" placeholder="age" value="<?php if(isset($age)) echo checkInput($age);?>">
                            <span class="help-inline"><?php if(isset($ageError)) echo $ageError;?></span>
                        </div>
                        <!--  -->


                        <div class="form-group">
                            <label for="category">Formations:
                            <?php $db = Database::connect();?>
                            <nav>
                               <ul class="nav nav-pills">  
                                    <?php $statement = $db->query('SELECT * FROM formation ');
                                        $categories = $statement->fetchAll();?>
                                    <?php foreach ($categories as $category) :?>
                                        <?php  if($category['idFormation'] == $idFormation):?>
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
                            <span class="help-inline danger"><?php if(isset($idCoError)) echo $idCoError;?></span>
                              <?php
                              $statement = $db->prepare('SELECT * FROM formation WHERE formation.idFormation = ?');
                              $statement->execute(array($category['idFormation']));
                              while ($item = $statement->fetch()):?> 
                                  <div class="col-sm-10 col-md-8">
                                          <div class="thumbnail">
                                              <div class="caption">
                                             <b> <input type="radio" name="idFormation"  value="<?= checkInput($category['nomFormation']) ;?>"><?= checkInput($category['nomFormation']); ?></option></b>

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
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <p><?php echo $image;?></p>
                            <label for="image">Sélectionner une nouvelle image:</label>
                            <input type="file" id="image" name="image" value="<?php if(isset($image)) echo checkInput($image);?>">
                            <span class="help-inline"><?php if(isset($imgError)) echo $imgError;?></span>
                        </div>
                        <br>

                        <br>
                        <div class="form-actions">
                        <button type="submit" name='ajouter'  class="btn btn-success"> <span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="../index/redirection_page.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div> 
                </div>
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                    <img src="../images-bdd/images/<?php if(empty($image)){ echo"leo.jpg";}else{  echo checkInput($image);}?>" alt="...">
                        <div class="center">
                            <div class=""><p>age</p> <br><?php if(isset($age)) echo $age; ?></div><br>
                            <div class=""><p>Téléphone</p><br> <?php if(isset($telephone)) echo $telephone; ?></div>
                            <span class="help-inline"><?php if(isset($imgError)) echo $imgError;?></span>

                        </div>
                          <div class="caption">
                            <h4><?php if(isset($username)) echo $username;?></h4>
                            <p><?php if(isset($motivation)) echo $motivation;?></p>
                          </div>
                        </div>
                    </div>
                    <!--  -->
                      
                <div>
              
                      
                    
                </div>
            </div>
        </div> 
        <?php include '../functions/footer/footer.php' ;?>
