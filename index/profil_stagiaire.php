<?php
include './bdd_header.php'; 
$emailUser = $_SESSION["mail"]; $typeUser = $_SESSION["titre"];
if(isset($_SESSION["titre"],$_SESSION["mail"])){
        # code...
        $Statement =$DB->query("SELECT * FROM stagiaire WHERE username=:username",array('username'=>$emailUser));
        foreach ($Statement as $stagiaire){
        $username= $stagiaire->username;
       // header("Location: ./redirection_page.php");

        if($stagiaire->type !== $_SESSION["titre"]) {

            header("Location: ./redirection_page.php");
        
        }  
        $authentifications= $DB->query("SELECT * FROM `authentification` where titre IN($typeUser) and mail IN('$username')");       
        # afficher afficher le parapot a lutilisateur  -->

        }  

}else {
    header("Location: ../index/index.php");

}

?>

   
<?php include_once '../functions/header/header_profil.php';$title= 'profil';
 ?>
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
 
 <link rel="stylesheet" href="../main/css/profil.css" />
 <link rel="stylesheet" href="../main/css/index2.css" />    

 <div class="container">
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            <img src="../images-bdd/images/<?php if(empty($stagiaire->images)){ echo'leo.jpg';} else {echo checkInput($stagiaire->images);}?>" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

<?php foreach ($authentifications as $authentification): ?>

            <h4 class="mb-0"><?= $authentification->nom ?>  <?= $authentification->prenom ?></h4>
        <?php endforeach?>

        <p class="text-muted"><?php if(isset($username)) echo $username?></p>

            

            <div class="text-left mt-3">
                <h4 class="font-13 text-uppercase">About Me :</h4>
                <p class="text-muted font-13 mb-3">
                <?php  if(isset($stagiaire->telephone)) echo $stagiaire->telephone?>
                </p>
                <p class="text-muted mb-2 font-13"><strong>Nom :</strong> <span class="ml-2"><?php if(isset($authentification->nom)) echo $authentification->nom ?>  <?php  if(isset($authentification->prenom)) echo $authentification->prenom ?></span></p>

                <p class="text-muted mb-2 font-13"><strong>Numero personnel :</strong><span class="ml-2"><?php if(isset($authentification->confirmkey)) echo $authentification->confirmkey?></span></p>

                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "> <?php if(isset($authentification->mail)) echo $authentification->mail?></span></p>

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
            <h4 class="header-title">Formation</h4>
            <p class="mb-3"><?php if(isset($stagiaire->idFormation)) echo $stagiaire->idFormation?></p>
        <?php  $Formations= $DB->query("SELECT * FROM `formation` where  nomFormation IN('$stagiaire->idFormation')"); ?>
        <?php foreach ($Formations as $Formation): ?>

            <p class="mb-3"><?php if(isset($Formation->description)) echo $Formation->description?></p>
            <p class="mb-3"><?php if(isset($Formation->environnementF)) echo $Formation->environnementF?></p>


     <?php endforeach?>

        </div> <!-- end card-box-->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">           
            <div class="col-md-12">
                                <div class="full">
                                <div class="tab_bar_section">
                                    <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#description" aria-expanded="false">Description</a> </li>
                                    <li class="nav-item active"> <a class="nav-link show active" data-toggle="tab" href="#reviews" aria-expanded="true">Projets </a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                    <div id="description" class="tab-pane in">
                                        <div class="product_desc">
                                        <p>
                                                <div class="tab-pane show active" id="about-me">

                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>  Vos projets</h5>

                                                    <ul class="list-unstyled timeline-sm">
                                                    <?php   $products =$DB->query("SELECT * FROM projet WHERE username=:username", array('username'=> $username));?>
                                                        <li class="timeline-sm-item">
                                                        <?php foreach ($products as $productM):?>
                                                            <span class="timeline-sm-date"> <?= $productM->created?></span>

                                                            <h5 class="mt-0 mb-1"><?= $productM->nomP?></h5>
                                                            <p><?= $productM->environnementP ?></p>
                                                            <p class="text-muted mt-2"><?=  $productM->descriptionP ?></p>

                                                            <?php 
                                                                if(isset($_SESSION['mail'])){
                                                                  $username= $_SESSION['mail'] =$emailUser;
                                                                }                                                        
                                                            ?>
                                                    <button class="btn btn-success btn-xs waves-effect mb-2 waves-light"><a  href="./form_update_projet.php?id=<?= checkInput($productM->id)?>">Modifier </a></button>
                                                    <button  class="btn btn-danger btn-xs waves-effect mb-2 waves-light" ><a href="./deleteProjet.php?id=<?= checkInput($productM->id)?>">effcer </a></button>


                                                                <?php endforeach?>

                                                        </li>
                                                  
                                                    </ul>

                                                    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i> Projets  Utilisateur</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">

                                                        <?php  
                                                        
                                                              if(isset($username)):
                                                                ?>

                                                              
                                                                <?php   $prods =$DB->query("SELECT * FROM products WHERE `products`.username=:username", array('username'=> checkInput($username))) ?>
                                                            <?php foreach ($prods as $prod):?>

                                                            <div class="thead-light">


                                                                    <h5>Projet Nom</h5>

                                                                    <p><span class="badge badge-info"><?= $prod->nomP?></span><p>

                                                                    <h5>Environnement</h5>

                                                                     <p> <?= $prod->environnementP?></p> 
                                                                     <h5>Description</h5>

                                                                    <p><?= $prod->descriptionP?></p>


                                                                    <h5>Date de Demarage</h5>
                                                                    <p><?= $prod->created?> </p>

                                                        
                                                            </div>
                                                            <button  class="btn btn-danger btn-xs waves-effect mb-2 waves-light"  ><a href="./DAO/web/deletetProducts.php?id=<?=checkInput($prod->id)?>">Effacer</a></button>


                                                        <?php endforeach?>
                                                        <?php else :?>
                                                     <?php endif ?>

                                                        </table>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div id="reviews" class="tab-pane fade show active in">
                                        <div class="product_review">
                                        <h3>Projets </h3>
                                        <?php
                                         $products= $DB->query("SELECT * FROM projet");

                                        ?>  
                                        <?php foreach ($products as $product):?>

                                        <div class="commant-text row">

                                            <div class="col-lg-2 col-md-2 col-sm-4">
                                                <div class="profile"> <img src="../images-bdd/projetPhoto/<?php if(empty($product->image)){ echo 'post-06.jpg';} else {echo checkInput($product->image); /*var_dump($product->image);*/}?>" alt="#">  </div>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-4">
                                                <h5><?= $product->nomP?></h5>
                                                <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#"><?php checkInput($product->NHeuresP)?></a></span></p>
                                                <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                                <p>Description projet</p>
                                                <p class="msg"><?= $product->descriptionP?> </p>
                                                <br/>
                                                <p>Environnement projet</p>
                                                <p><?= $product->environnementP?></p>                                    
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4">
                                                    <a href="./add_panier.php?id=<?= $product->id;?>"  class="addPanier">
                                                        <button draggable="false" title="Ajoute au panier" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;">
                                                            <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height:  color: #fff; 18px; width: 18px;">
                                                        </button>
                                                    </a>
                                            </div>
                                        </div>
                                        <?php endforeach?>

                                        
                                    </div>
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
