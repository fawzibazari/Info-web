<?php 
include_once './bdd_header.php'; 
include_once '../functions/header/header.php'; ?>
 <?//header_home('header'); ?>
<?php
 $intervenants= $DB->query("SELECT * FROM intervenant");
 //var_dump($intervenants);
?> 

 <div class="full">
          <div class="main_heading text_align_center">
            <h2>LES INTERVENANTS</h2>
            <p class="large">We package the products with best services to make you a happy customer.</p>
          </div>
        </div>
  <div class="col-md-9">
      <div class="row">
        <?php foreach ($intervenants as $intervenant):?>
          <div class="col-md-4 col-sm-6">
            <div class="full team_blog_colum">
              <div class="it_team_img"> <img class="img-responsive" src= "../images-bdd/intervenantPhoto/<?php if(empty($formateur->photoF)){ echo 'leo555njb.jpg';} else {echo checkInput($formateur->photoF);}?>" alt="#"> </div>
              <div class="team_feature_head">
                <h4><p><?= checkInput($intervenant->domaine);?></p></h4>
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


<!-- section --> 
<?php
 $formateurs= $DB->query("SELECT * FROM formateur");
 //var_dump($formateurs);
?> 
 <div class="full">
          <div class="main_heading text_align_center">
            <h2>NOS FORMATEURS</h2>
            <p class="large">We package the products with best services to make you a happy customer.</p>
          </div>
        </div>

      <div class="col-md-9">
        <div class="row"> 
        <?php foreach ($formateurs as $formateur):?>
          <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
            <div class="product_list">
              <div class="product_img"> <img class="img-responsive" src="../images-bdd/formateurPhoto/<?php if(empty($formateur->photoF)){ echo 'leo555njb.jpg';} else {echo $formateur->photoF;}?>" alt=""> </div>
              <div class="product_detail_btm">
                <div class="center">
                  <h4><a href="it_shop_detail.php"><?= $formateur->domaineF;?></a></h4>
                </div>
                <div class="starratin">
                  <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                </div>
                <div class="product_price">
                  <p><span class="new_price">Heures</span> <span class="new_price"><?= $formateur->dateF;?></span></p>
                  <p class="myBtn"><a href="#" class="btn btn-order "  role="button"> Plus Info</a></p>

                      <!-- The Modal -->
                      <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                          <span class="close">&times;</span>
                         
                          <a class="open-button"  onclick="openForm()">Open Form</a>
                          <a class="open-cancel"  onclick="closeForm()">Close</a>
                          <p class="row form" id="myForm">
                            <div class="row about_blog">
                              <div class="col-lg-6 col-md-6 col-sm-12 about_cont_blog">
                                <div class="full text_align_left">
                                  <h3>What we do</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                                    standard dummy text ever since the 1500s, when an unknown printer took a galley..</p>
                                  <ul>
                                    <li><i class="fa fa-check-circle"></i>Persius appetere pro mea harum ridens</li>
                                    <li><i class="fa fa-check-circle"></i>Instructior vis at causae legimus luptatum mel</li>
                                    <li><i class="fa fa-check-circle"></i>Maluisset id persius appetere pro mea harum</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
                                <div class="full text_align_center"> <img class="img-responsive" src="images/it_service/post-06.jpg" alt="#"> </div>
                              </div>
                            </div>
                          </p>
                 

                        
                        </div>

                      </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach?>
        </div>
      </div>


 <?php
 $formations= $DB->query("SELECT * FROM formation");
?>              
          <div class="full">
          <div class="main_heading text_align_center">
            <h2>Formations</h2>
            <p class="large">We package the products with best services to make you a happy customer.</p>
          </div>
        </div>
<div class="section padding_layout_1 blog_grid">
  <div class="container">
    <div class="row">
    <?php foreach ($formations as $formation):?>

          <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
            <div class="full">

              <div class="blog_section">
                <div class="blog_feature_cantant theme_color_bg white_fonts">
                  <h4 class="blog_head"> <p><?= $formation->nomFormation?></p></h4>
                  <p><?= $formation->environnementF?></p>
                  <div class="post_info">
                    <ul>
                      <li><i class="fa fa-user" aria-hidden="true"></i> Marketing</li>
                      <li><i class="fa fa-comment" aria-hidden="true"></i> 5</li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i> 12 Aug 2017</li>
                    </ul>
                  </div>
                  <p class="description"><?= $formation->description?></p>
                    <div class="bottom_info">
                    <div class="pull-left"><a class="read_more" href="it_blog_detail.php">READ MORE <i class="fa fa-angle-right"></i></a></div>
                    <div class="pull-right">
                      <div class="shr">Share: </div>
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
              
      

     
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Project</h2>
            <p class="large">We package the products with best services to make you a happy customer.</p>
            <p style="width: 10%; text-align: center; margin:5px auto;" id="sup" ></p>
            <li><a href="#">><?php echo $panier->count();?></a></li>

<?php //number_format( $panier->total() * 1.196,2,',',' ');?>
          </div>
        </div>
      </div>
    </div>
   
<?php
// require './db.class.php';
// $DB = new DB();
// $req =$DB->db->prepare('SELECT * FROM `products`');
// $req->execute();
// var_dump($req->fetchAll());
 $products= $DB->query("SELECT * FROM projet");

 //var_dump($products);
?>
      <div class="row">
        
      <?php foreach ($products as $product):?>

        <div class="col-md-4">
        <div class="full blog_colum">
          <div class="blog_feature_img"> <img src="../images-bdd/projet/<?=  $product->image ?>" alt="#"> </div>
          <div class="post_time">
            <p><i class="fa fa-clock-o"></i><?=  $product->NHeuresP ?> Heures</p>
          </div>
          <div class="blog_feature_head">
            <h4><?= $product->nomP?></h4>
          </div>
          <div class="blog_feature_cont">
            <p><?= $product->descriptionP?></p>
          </div>
          <div class="center">
            <a href="./add_panier.php?id=<?= $product->id;?>" onclick="popbox()" class="addPanier"><button draggable="false" title="Zoom avant" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button></a>
            </div>
        </div>
      </div>
      <?php endforeach?>

    </div>
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 light_silver gross_layout right_gross_layout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_right">
            <h2>Our Feedback</h2>

            <p class="large">Easy and effective way to get your device repaired.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row counter">
      <div class="col-md-4"> </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-smile-o"></i></div>
            <div class="text_align_right">
              <p class="counter-heading text_align_right">Happy Customers</p>
            </div>
            <h5 class="counter-count">2150</h5>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-laptop"></i></div>
            <div class="text_align_right">
              <p class="counter-heading text_align_right">Laptop Repaired</p>
            </div>
            <h5 class="counter-count">1280</h5>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-desktop"></i></div>
            <div class="text_align_right">
              <p class="counter-heading">Computer Repaired</p>
            </div>
            <h5 class="counter-count">848</h5>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-windows"></i></div>
            <div class="text_align_right">
              <p class="counter-heading">OS Installed</p>
            </div>
            <h5 class="counter-count">450</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_left">
            <h2>Latest from Our Blog</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="full blog_colum">
          <div class="blog_feature_img"> <img src="images/it_service/post-03.jpg" alt="#" /> </div>
          <div class="post_time">
            <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
          </div>
          <div class="blog_feature_head">
            <h4>Why Your Computer Hates You</h4>
          </div>
          <div class="blog_feature_cont">
            <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="full blog_colum">
          <div class="blog_feature_img"> <img src="images/it_service/post-04.jpg" alt="#" /> </div>
          <div class="post_time">
            <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
          </div>
          <div class="blog_feature_head">
            <h4>Easy Tips To Computer Repair</h4>
          </div>
          <div class="blog_feature_cont">
            <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="full blog_colum">
          <div class="blog_feature_img"> <img src="images/it_service/post-06.jpg" alt="#" /> </div>
          <div class="post_time">
            <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
          </div>
          <div class="blog_feature_head">
            <h4>Computer Maintenance 2018</h4>
          </div>
          <div class="blog_feature_cont">
            <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- end footer -->

<?php include '../functions/footer/footer.php' ;?>

