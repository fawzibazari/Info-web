<?php 
include './bdd_header.php'; 



//var_dump();
        $emailUser = $_SESSION["mail"]; $typeUser = $_SESSION["titre"];
        if(isset($_SESSION["titre"],$_SESSION["mail"])){
                # lire la session et rouver la personne 
                
                $Statement =$DB->query("SELECT * FROM formateur WHERE username=:username",array('username'=>checkInput($emailUser)));
                foreach ($Statement as $formateur){
                $username= $formateur->username;
                $cv= $formateur->cvF;
                //var_dump($formateur->type);
                if($formateur->type !== $_SESSION["titre"]) {
                # conparaison entre les deux titre 

                    header("Location: ./redirection_page.php");
                
                }  
                # lire le table d'incription tour touver le nom et prenom corespondant 

                $authentifications= $DB->query("SELECT * FROM `authentification` where titre IN($typeUser) and mail IN('$username')");       
             # afficher afficher le nom parapot au useur -->

                }  

        } 


        // definire le nom de la page
$title= 'Profil';  
 
                      
?>  

   <?php include_once '../functions/header/header_profil.php'; $title= 'profil'; ?>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<link rel="stylesheet" href="../main/css/profil.css" />
<link rel="stylesheet" href="../main/css/index2.css" />
<div class="container">
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            <img src="../images-bdd/formateurPhoto/<?php if(empty($formateur->photoF)){ echo 'leo.jpg';} else {echo checkInput($formateur->photoF);}?>" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

    <?php foreach ($authentifications as $authentification): ?>
        <!-- # afficher le nom et prénom  -->


            <h4 class="mb-0"><?php if(isset($authentification->nom)) echo $authentification->nom ?>  <?php if(isset($authentification->prenom)) echo checkInput($authentification->prenom) ?></h4>
        <?php endforeach?>

            <p class="text-muted"><?php if(isset($username)) echo $username?></p>

            

            <div class="text-left mt-3">
                <h4 class="font-13 text-uppercase">A propos de moi :</h4>
                <p class="text-muted font-13 mb-3">
                <?= $formateur->domaineF?>
                </p>
                <p class="text-muted mb-2 font-13"><strong>Nom :</strong> <span class="ml-2"><?php if(isset($authentification->nom))echo $authentification->nom ?>  <?php  if(isset($authentification->prenom)) echo checkInput($authentification->prenom) ?></span></p>

                <p class="text-muted mb-2 font-13"><strong>Numero personnel :</strong><span class="ml-2"><?php if(isset($authentification->confirmkey)) echo$authentification->confirmkey?></span></p>

                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "> <?php if(isset($authentification->mail))echo $authentification->mail?></span></p>

            </div>

            <ul class="social-list list-inline mt-3 mb-0">
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="fab fa-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fab fa-google"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fab fa-github"></i></a>
                </li>
            </ul>
        </div> <!-- end card-box -->

        <div class="card-box">
            <h4 class="header-title">Curriculum vitae </h4>
            <p class="mb-3">Voir ou télécharger votre cv</p>
         
            <div class="">
                <div class="">
                    <button class="btn btn-primari"><a href="../cv/formateurCV/<?php if(isset($formateur->cvF)) {echo checkInput($cv);}else { echo checkInput('exemples.jpg');} ;?>" class="button1">Télécharger CV</a></button>
                </div>
            </div>

        </div> <!-- end card-box-->
       

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">           
            <div class="col-md-12">
                    <div class="full">
                        <div class="tab_bar_section">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#description" aria-expanded="false">Projets</a> </li>
                                <li class="nav-item"> <a class="nav-link show active" data-toggle="tab" href="#Formation" aria-expanded="false">Formations</a> </li>

                            </ul>
                            <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="description" class="tab-pane in">
                                        <div class="product_desc">
                                            <p>
                                                <div class="tab-pane show active" id="about-me">
                                                    
                                                <?php   $products =$DB->query("SELECT * FROM projet WHERE username=:username ORDER BY `projet`.`id` Desc", array('username'=> checkInput($username)));?>
                                                <?php foreach ($products as $productM):?>
                                                    <div class="full">

                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>  Vos projets</h5>
                                                                <!-- # afficher afficher le parapot au l'utilisateur touver  -->
                                                        
  
                                                                <?php 
                                                                    if(isset($_SESSION['mail'])){
                                                                    $username= $_SESSION['mail'] =$emailUser;
                                                                    //var_dump($username);

                                                                    }                                                        
                                                                ?>

                                                                <div class="col-lg-3 col-md-3 col-sm-4">
                        
                                                                    <!-- // trouver si image est bien la  var_dump($productM->image); -->
                                                                    <div class="profile"> <img src="../images-bdd/projetPhoto/<?php  if(empty($productM->image)){ echo 'post-06.jpg';} else {echo $productM->image;}?>"  alt="#">  </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                                    <ul class="list-unstyled timeline-sm">
                                                                        <li class="timeline-sm-item">
                                                                            <span class="timeline-sm-date"> <?php  if(isset($productM->created)) echo checkInput($productM->created)?></span>
                                                                    

                                                                            <h5 class="mt-0 mb-1"><?php if(isset($productM->nomP)) echo checkInput($productM->nomP)?></h5>
                                                                            <p><?= $productM->environnementP ?></p>
                                                                            <p class="text-muted mt-2"><?php if(isset($productM->descriptionP)) echo  checkInput($productM->descriptionP) ?></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                           

                                                                    <button class="btn btn-success btn-xs waves-effect mb-1 waves-light"><a  href="./form_update_projet.php?id=<?= checkInput($productM->id)?>">Modifier </a></button>
                                                                    <!-- <button  class="btn btn-danger btn-xs waves-effect mb-2 waves-light" onclick="effacer()" ><a  href="./deleteProjet.php?id=<?//checkInput($productM->id)?>">Suprimer </a></button> -->
                                                                    <button  class="btn btn-danger btn-xs waves-effect mb-2 waves-light"  ><a href="./deleteProjet.php?id=<?= checkInput($productM->id);?>">Effacer</a> </button>
                                                                   
                                                                </div>
                                                </div>
                                                <?php endforeach?>


                                                <div class="full-screan">
                                                    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i> Projet utiliser par</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                        <?php  
                                                              if(isset($productM->nomP)):
                                                                ?>
                                                                    <?php $nomP =$productM->nomP ;?>

                                                              
                                                                <?php   $prods =$DB->query("SELECT * FROM products WHERE `products`.nomP=:nomP", array('nomP'=> checkInput($nomP))) ?>
                                                                                                                     <!-- # afficher afficher le parapot au nom  dans le products -->

                                                            <?php foreach ($prods as $prod):?>

                                                            <thead class="thead-light">

                                                                <tr>

                                                                    <th>#</th>
                                                                    <th>Mail</th>
                                                                    <th>Date de Demarage</th>
                                                                    <th>Projet Nom</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td> <?= $prod->username?> </td>
                                                                    <td><?= $prod->created?></td>
                                                                    <td><span class="badge badge-info"><?= $prod->nomP?></span></td>
                                                                </tr>
                                                               
                                                            </tbody>
                                                        <?php endforeach?>
                                                        <?php else :?>
                                                     <?php endif ?>

                                                        </table>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!--  -->


                                                            
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php $message?>
                                                    <div class="full-screan review_bt_section">
                                                        <div class="float-right"> <a class="btn sqaure_bt collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Projet</a> </div>
                                                    </div>
                                                    <br>
                                                    <div class="full-screan">
                                                    <div id="collapseExample" class="full-screan commant_box collapse" style="height: 0px;" aria-expanded="false">

                                                <?php include_once './insertion_projet.php'; ?>
                                                <form accept-charset="UTF-8" action=''  method="post">
                                                    <div class="full_bt center">
                                                        <div class="wrapper fadeInDown">
                                                            <table id="formContent">
                                                                <tr>
                                                                    <td align="right">
                                                                        <label for="nomP">Nom :</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" placeholder="Nom du Projet" id="nomP" name="nomP" value="<?php if(isset($nomP)) echo checkInput($nomP);?>" />
                                                                        <p><span class="help-inline text-danger"><?php if(isset($nomPError)) echo $nomPError;?></span></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right">
                                                                        <label for="Last">descriptionP :</label>
                                                                    </td>
                                                                    <td>
                                                                        <textarea type="text" placeholder="Votre  description" id="Last" name="descriptionP"  > <?php if(isset($descriptionP)) echo checkInput($descriptionP);?></textarea>
                                                                        <p><span class="help-inline text-danger"><?php if(isset($descriptionPError)) echo $descriptionPError;?></span></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right">
                                                                        <label for="environnementP">environnementP :</label>
                                                                    </td>
                                                                    <td>
                                                                        <textarea type="text" placeholder="Votre environnement" id="environnementP" name="environnementP" ><?php if(isset($environnementP)) echo checkInput($environnementP);?> </textarea>
                                                                        <p><span class="help-inline text-danger"><?php if(isset($environnementPError)) echo $environnementPError;?></span></p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right">
                                                                        <label for="price">Prix :</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" placeholder="Votre price" id="price" name="price" value="" />
                                                                        <p><span class="help-inline text-danger"><?php if(isset($priceError)) echo $priceError;?></span></p>
                                                                    </td>
                                                                </tr>              
                                                                <tr>
                                                                    <td align="right">
                                                                        <label for="NHeuresP">NHeuresP :</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" placeholder=" nombre d'Heures " id="NHeuresP" name="NHeuresP" />
                                                                        <p><span class="help-inline text-danger"><?php if(isset($HeuresPError)) echo $HeuresPError;?></span></p>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right">
                                                                            <label for="image">Ajouter une image:</label>
                                                                            <div class="form-group col-md-6">
                                                                    </td>
                                                                    <td>
                                                                        <input type="url" id="image" name="image" value='<?php if(isset($image)) echo $image;?>'> 
                                                                        <p> <span class="help-inline text-danger"><?php if(isset($imgError)) echo $imgError;?></span></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <label for="">Sauvegarder</label>
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php 
                                                                        if(isset($_SESSION['mail'])){
                                                                        $username= $_SESSION['mail'] ;
                                                                        } 
                                                                                                                          
                                                                    ?>
                                                                    <p class="btn btn-success"><?php   if(!empty($msg)) { echo $msg;}  ?></p>
                                                                    
                                                                        <br />
                                                                        <input type="submit" name="ajoute" value="J'ajoute" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                         <div id="sup"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                                <!--  -->
                                            </p>
                                        </div>
                                    </div>


<!--  -->
                                        <div id="Formation" class="tab-pane fade show active in">
                                            <div class="product_review">

                                                <div class="card-box">
                                                    <h4 class="header-title">Formation</h4>
                                                    <p class="mb-3"><?php if(isset($formateur->idFormation)) echo $formateur->idFormation?></p>
                                                    <?php  $Formations= $DB->query("SELECT * FROM `formation` where  username IN('$formateur->username')"); ?>
                                                    <?php foreach ($Formations as $Formation): ?>
                                                        <img class='modif-img' src="<?php echo '../images-bdd/formationPhoto/'.$Formation->photoF;?>" alt="photo formation">
                                                    <p class="mb-3"><?php if(isset($Formation->description)) echo $Formation->description?></p>
                                                    <p class="mb-3"><?php if(isset($Formation->environnementF)) echo $Formation->environnementF?></p>

                                                    <div class="center">
                                                        <div class="row btn-mdf">
                                                            <div class="col-md-6 ">
                                                                <button  class="btn btn-danger btn-xs waves-effect mb-2 waves-light"   ><a  href="../session/delete_formation.php?id=<?= checkInput($Formation->idFormation)?>">Supprimer </a></button>
                                                            </div>
                                                            <div class="col-md-6" >
                                                                <button class="btn btn-success btn-xs waves-effect mb-2 waves-light"><a  href="../session/update_Formation.php?id=<?= checkInput($Formation->idFormation)?>">Modifier </a></button>
                                                            </div>
                                                        </div>
                                                    </div>           

                                                        <?php endforeach?>

                                                </div> <!-- end card-box-->

                                             </div>
                                        </div>

<!--  -->

                        

      
                                </div>

                                    
                            </div>
                        </div>
                                
                    </div>
                </div>

            <div class="tab-content">
              
                <!-- end timeline content-->

                <div class="tab-pane" id="settings">
                    <form>
                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="userbio">Bio</label>
                                    <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Email Address</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                    <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Company Info</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyname">Company Name</label>
                                    <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cwebsite">Website</label>
                                    <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Social</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social-fb">Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social-tw">Twitter</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social-insta">Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social-lin">Linkedin</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social-sky">Skype</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social-gh">Github</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-github"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                        </div>
                    </form>
                </div>
                <!-- end settings content-->

          <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
</div>


<?php include_once '../functions/footer/footer.php' ;?>
