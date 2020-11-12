<?php 
include './bdd_header.php'; 
include_once '../functions/header/header.php'; ?>
<?php
 $stagiaires= $DB->query("SELECT * FROM stagiaire");
 
$title="Stagiaires";
?>
  


<div id="inner_banner" class="section inner_banner_section ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Stagiaire Liste</h1>
              <ol class="breadcrumb">
                <li><a href="./index.php">Accueil</a></li>
                <li class="active">Stagiaire Liste</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- section image stagiaire -->
<div class="section padding_layout_1 light_silver">
  <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                    <div class="main_heading text_align_left">
                        <h2>Stagiaire </h2>
                        <p class="large">INFO-WEB : NOS STAGIAIRE WEB.</p>
                    </div>
                    </div>
                </div>
            </div>

    <div class="row">
   

    <?php foreach ($stagiaires as $stagiaire):?>
        <div class="col-md-3">
            <div class="full team_blog_colum">
            <div class="it_team_img"> <img class="img-responsive" src="../images-bdd/images/<?php if(empty($stagiaire->images)){ echo'leo.jpg';} else {echo $stagiaire->images;}?>" alt="#"> </div>
            <div class="team_feature_head">
            <?php  
                               $egale= $stagiaire->type; 
                               $user = $stagiaire->username;
                               

               $authentifications= $DB->query("SELECT * FROM `authentification` where titre IN($egale) and mail IN('$user')");       
                      
              ?>
            <?php foreach ($authentifications as $authentification): ?>
             
                <h4><?= $authentification->nom ?>  <?= $authentification->prenom ?></h4>
            <?php endforeach?>

            </div>
            <div class="team_feature_social">
                <div class="social_icon">
                <ul class="list-inline">
                    <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                    <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                    <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                    <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                    <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                </ul>
                </div>
            </div>
            </div>
      </div>
    <?php endforeach?>
    </div>

    </div>
</div>

<!-- end section -->

<?php include_once '../functions/footer/footer.php' ;?>
