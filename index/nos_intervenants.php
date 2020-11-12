<?php 
include_once './bdd_header.php'; 
include_once '../functions/header/header.php'; $title= 'Intervenants'; ?>
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
              <h1 class="page-title">Intervenant Liste</h1>
              <ol class="breadcrumb">
                <li><a href="./index.php">Accueil</a></li>
                <li class="active">Intervenant Liste</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">

          <div class="full">
            <div class="main_heading text_align_center">
                <h2>LES INTERVENANTS</h2>
                <p class="large">Les professionnels dans leur domaine.</p>
            </div>
          </div>
    <div class="col-md-12">
        <div class="row">
            <?php foreach ($intervenants as $intervenant):?>
            <div class="col-md-4 col-sm-6">
                <div class="full team_blog_colum">
                <div class="it_team_img"> <img class="img-responsive" src= "../images-bdd/intervenantPhoto/<?php if(empty($intervenant->photoI)){ echo 'leo.jpg';} else {echo checkInput($intervenant->photoI);}?>" alt="#"> </div>
                <div class="team_feature_head">
                    <h4><p><?= $intervenant->domaine;?></p></h4>
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

  <!-- end footer -->

<?php include '../functions/footer/footer.php' ;?>
