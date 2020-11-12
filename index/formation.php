<?php
include './bdd_header.php'; 
include_once '../functions/header/header.php'; ?>
 <?php
 $title="Formations";
 ?>

<div>
<?php
 $formations= $DB->query("SELECT * FROM formation");
?>  
<!-- carousel  -->
<div class="container">
<!--  -->
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Formation</h2>
            <p class="large">Faire une formation et touver l'emploi qui vous correspond.</p>
          </div>
        </div>

<!--  -->
<!--  -->
  <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
     
              <?php foreach ($formations as $formation):?>

              <div class="carousel-item">
                  <div class="center"  width="1100" height="500">

                            <div class="row about_blog">

                                <div class="col-lg-6 col-md-6 col-sm-12 about_cont_blog">
                                  <div class="full text_align_left">
                                    
                                    <h3><?php if(isset($formation->nomFormation)) echo checkInput($formation->nomFormation);?></h3>
                                    <p class="text"><?php if(isset($formation->description)) echo checkInput($formation->description);?></p>
                                    <ul>
                                      <li><i class="fa fa-check-circle"></i><?php if(isset($formation->NHeuresF)) echo checkInput($formation->NHeuresF);?> <small>Nombre d'heures</small></li>
                                      <li><i class="fa fa-check-circle"></i></li>
                                      <li class="text"><i class="fa fa-check-circle"></i><?php if(isset($formation->environnementF)) echo checkInput($formation->environnementF);?></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
                                  
                                  <div class="full text_align_center" > <img width='500px' class="img-responsive" src="../images-bdd/formationPhoto/<?php if(isset($formation->photoF)){echo checkInput($formation->photoF);} else { echo 'post-03.jpg';}?>" alt="#"> </div>
                                </div>

                            </div>
                      </div> 
            </div>
            <?php endforeach?>

            <div class="carousel-item active">
              <div class="center"  width="1100" height="500">

                <div class="row about_blog">
                    <div class="col-lg-6 col-md-6 col-sm-12 about_cont_blog">
                      <div class="full text_align_left">
                        <h3><?php if(isset($formation->nomFormation)) echo checkInput($formation->nomFormation);?></h3>
                          <p class="text"><?php if(isset($formation->description)) echo checkInput($formation->description);?></p>
                        <ul>
                        <li><i class="fa fa-check-circle"></i><?php if(isset($formation->HeuresF)) {echo checkInput($formation->Heures);}?></li>
                          <!-- <li><i class="fa fa-check-circle"></i></li> -->
                          <li class="text"> <i class="fa fa-check-circle"></i><?php if(isset($formation->environnementF)) echo  checkInput($formation->environnementF);?></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
                      
                      <div class="full text_align_center"> <img class="img-responsive" src="../images-bdd/formationPhoto/<?php if(isset($formation->photoF)){echo checkInput($formation->photoF);} else { echo 'post-03.jpg';}?>" alt="#"> </div>
                    </div>
                </div>
              </div>   
            </div>

            <a class="carousel-control-prev " href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
      </div>
    
  </div>  

  <!-- fin carousel -->

  <div class="row" style="margin-top: 35px">
      <div class="col-md-8">
        <div class="full margin_bottom_30">
          <div class="accordion border_circle">
            <div class="bs-example">
              <div class="panel-group" id="accordion">
               
                  <?php foreach ($formations as $formation):?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title">  <a data-toggle="collapse" data-parent="#accordion" href="#<?= checkInput($formation->idFormation);?>" class="collapsed" aria-expanded="false"><i class="fa fa-star"></i> <?= checkInput($formation->nomFormation);?><i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="<?= checkInput($formation->idFormation);?>" class="panel-collapse collapse">
                    <div class="panel-body">
                    <p><?= checkInput($formation->description);?></p>

                     </div>
                  </div>
                </div>
                    <?php endforeach?>

               
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="full" style="margin-top: 35px;">
          <h3>Apprendre un nouveau métier ?</h3>
          <p>vous souhaitiez changer totalement de carrière ou simplement la faire évoluer. C’est également bénéfique pour votre développement personnel, votre confiance vous et votre épanouissement au travail </p>
          <p><a class="btn main_bt" href="../session/inscription.php"> BROCHURE </a></p>
        </div>
      </div>
    </div>
  </div>
</div>
  

<?php include '../functions/footer/footer.php' ;?>

    