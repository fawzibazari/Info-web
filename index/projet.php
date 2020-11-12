<?php 
include './bdd_header.php'; 
include_once '../functions/header/header.php';
// definire le nom de la page
$title= 'Projet';
?>

<div class="container">
    <div class="row">
        <div class="full body-slider">
          <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
           
            <!-- The slideshow -->
            
            <div class="carousel-inner body-slider">
              <div class="carousel-item div-slide">
                <div class="testimonial-container">
                  <div class="testimonial-content"> Vous avez des compétences et une première expérience en bureautique, systèmes et réseau ? Vous êtes un bon relationnel et le sens du service client ? Alors, ce poste est fait pour vous ! </div>
                  <div class="testimonial-photo"> <img src="../functions/images/logos/bnp-paribas-logo.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                  <div class="testimonial-meta">
                    <h4>Amelie Tabias</h4>
                    <span class="testimonial-position">CFO, Tech NY</span> </div>
                </div>
              </div>
              <div class="carousel-item active">
                <div class="testimonial-container">
                  <div class="testimonial-content"> Vous recherchez un contrat d’apprentissage de 2 ans à partir de septembre 2020 ? Vous avez des notions en développement logiciel (VBA) ? Vous maitrisez Microsoft Project (ou un autre outils de planification) ? Vous avez une bonne communication écrite et orale ? Vous êtes autonome ? Alors rejoignez-nous ! </div>
                  <div class="testimonial-photo"> <img src="../functions/images/logos/téléchargement.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                  <div class="testimonial-meta">
                    <h4>Maria Anderson</h4>
                    <span class="testimonial-position">CFO, Tech NY</span> </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="testimonial-container">
                  <div class="testimonial-content">  Vous avez une première expérience en développement logiciel (stage/alternance/projet école) ? Vous avez des connaissances en développement (ANGULAR, HTML/CSS, Python) ? Vous êtes capable de comprendre de la documentation technique en anglais ? Vous êtes reconnu(e) pour votre esprit d’équipe et votre excellent relationnel ? Alors rejoignez-nous ! </div>
                  <div class="testimonial-photo"> <img src="../functions/images/logos/orangebank-banque.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                  <div class="testimonial-meta">
                    <h4>Melida doe</h4>
                    <span class="testimonial-position">CFO, Tech NY</span> </div>
                </div>
              </div>
            </div>
              <!-- Indicators -->
            <ul class=" indicat">
              <li data-target="#testimonial_slider" data-slide-to="0" class=""></li>
              <li data-target="#testimonial_slider" data-slide-to="1" class="active"></li>
              <li data-target="#testimonial_slider" data-slide-to="2" class=""></li>
            </ul>

          </div>
        </div>
      
    </div>
</div>

<?php
 $products= $DB->query("SELECT * FROM projet");
?>              
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Projet</h2>
            <p class="large">Participer à un projet et acquérir des connaissances et des compétences.</p>
          </div>
        </div>
<div class="full">
  <div class="container">
    <div class="row">
    <?php foreach ($products as $product):?>

          <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
            <div class="full color-item">

              <div class="blog_section">
                <div class="blog_feature_img"> <img src="../images-bdd/projetPhoto/<?php if(empty($product->image)){ echo 'post-06.jpg';} else {echo checkInput($product->image);}?>" alt="#"> </div>

                <div class="blog_feature_cantant theme_color_bg white_fonts">
                  <h4 class="blog_head"> <p><?= $product->nomP?></p></h4>
                  <p><small class="glyphicon glyphicon-time"></small> <?=  $product->NHeuresP ?> Nombre d'heure</p>
                  <div class="post_info">
                    <ul>
                    <?php $authentifications= $DB->query("SELECT * FROM `authentification` where  mail IN('$product->username')"); ?>
                      <?php foreach ($authentifications as $authentification): ?>
                        <li><i class="fa fa-user" aria-hidden="true"></i> <?= $authentification->nom ?>  <?= $authentification->prenom ?></li>
                      <?php endforeach?>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i> <?= $product->created?></li>
                    </ul>
                  </div>
                  
                  <p class="text"><?= $product->descriptionP?></p>
                    <div class="bottom_info">
                      <!-- <div class="pull-left"><a class="read_more" href="it_blog_detail.php">READ MORE <i class="fa fa-angle-right"></i></a></div> -->
                      <!-- popup plus d'info -->
                      <?php// var_dump($product->id); pour afficher la bonne modal?>
                      <p class="myBtn"><a href="#" class="btn btn-order"  title='Buttom zoom' role="button" data-toggle="modal" data-target="#<?= $product->id?>"> Plus Info</a></p>

                          <!-- Modal -->
                          <div class="modal fade projet" id="<?= $product->id?>" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal- n ">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                      <div class="full color-item">

                                        <div class="blog_section">
                                          <div class="blog_feature_img"> <img src="../images-bdd/projetPhoto/<?php if(empty($product->image)){ echo 'post-06.jpg';} else {echo checkInput($product->image);}?>" alt="#"> </div>

                                          <div class="blog_feature_cantant theme_color_bg white_fonts">
                                            <h4 class="blog_head"> <p><?= $product->nomP?></p></h4>
                                            <p><small class="glyphicon glyphicon-time"></small> <?=  $product->NHeuresP ?> Nombre d'heure</p>
                                            <div class="post_info">
                                              <ul>
                                              <?php $authentifications= $DB->query("SELECT * FROM `authentification` where  mail IN('$product->username')"); ?>
                                              <?php foreach ($authentifications as $authentification): ?>
                                                <li><i class="fa fa-user" aria-hidden="true"></i> <?= $authentification->nom ?>  <?= $authentification->prenom ?></li>
                                              <?php endforeach?>
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?= $product->created?></li>
                                              </ul>
                                            </div>
                                                <p ><?= $product->descriptionP?></p>
                                                  <div class="bottom_info">

                                                  <p ><?= $product->environnementP?></p>

                                                </div>
                                            </div>
                                  </div>
                                  <div class="row">
                                    
                                      <div class="modal-footer   center ">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    </div>
                                  </div> 
                              </div>
                              
                            </div>
                          </div>
                      </div>
                  </div>
                    <!-- fin de popup  -->
                  <div class="center color_plus">
                    <a href="./add_panier.php?id=<?= $product->id;?>"  class="addPanier">
                        <button draggable="false" title="Ajoute au panier" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;">
                            <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height:  color: #fff; 18px; width: 18px;">
                        </button>
                    </a>
                    <!-- <a href="./add_panier.php?id=<?// $product->id;?>" onclick="popbox()" class="addPanier"><button draggable="false" title="Zoom avant" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button></a> -->
                    </div>

                    <div class="pull-right">
                      <div class="social_icon">
                        <ul>
                          <li class="fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                          <li class="twi"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                          <li class="gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                          <li class="pint"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                      </div>
                    </div> 
                    
                  </div>
                </div>
              </div>
        </div>
      </div>
      <?php endforeach?>

    </div>
    </div>
  </div>
</div>


                
      

<!-- end section -->

<?php include_once '../functions/footer/footer.php' ;?>
