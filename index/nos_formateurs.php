<?php 
include_once './bdd_header.php'; 
include_once '../functions/header/header.php'; $title= 'formateur'; ?>
 <?//header_home('header'); ?>
<?php
 $intervenants= $DB->query("SELECT * FROM intervenant");
 //var_dump($intervenants);
?> 

<div id="inner_banner" class="section inner_banner_section ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Formateur Liste</h1>
              <ol class="breadcrumb">
                <li><a href="./index.php">Accueil</a></li>
                <li class="active">Formateur Liste</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
 $formateurs= $DB->query("SELECT * FROM formateur");
 //var_dump($formateurs);
?> 

<div class="container">
    <div class="full">
              <div class="main_heading text_align_center">
                <h2>NOS FORMATEURS</h2>
                <p class="large">Les meilleurs formateur </p>
              </div>
            </div>

          <div class="col-md-9">
            <div class="row"> 
            <?php foreach ($formateurs as $formateur):?>
              <?php  
                               $egale= $formateur->type; 
                               $user = $formateur->username;
                               

               $authentifications= $DB->query("SELECT * FROM `authentification` where titre IN($egale) and mail IN('$user')");       
                      
              ?>
                  
              <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                <div class="product_list">
                  <div class="product_img"> <img class="img-responsive" src="../images-bdd/formateurPhoto/<?php if(empty($formateur->photoF)){ echo 'leo555njb.jpg';} else {echo checkInput($formateur->photoF);}?>" alt=""> </div>
                  <div class="product_detail_btm">
                    <div class="center">
                    <?php foreach ($authentifications as $authentification):?>
                      <h4><a href="#"><?= checkInput($authentification->nom);?>  <?= checkInput($authentification->prenom);?></a></h4>


                    </div>
                    <div class="starratin">
                      <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                    </div>
                    <div class="product_price">
                      <p><span class="new_price">Domaine</span> <span class="new_price"></span></p>
                      <?php endforeach?>

              
                    <p> <b><?php if(isset($formateur->domaineF)){ echo $formateur->domaineF;}?></b></p>

                    
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach?>
            </div>
          </div>
        </div>
        <!-- end section -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- end footer -->

<?php include '../functions/footer/footer.php' ;?>
