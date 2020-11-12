<?php
include './bdd_header.php'; 
 $ids= array_keys($_SESSION['panier']); 
  $products= $DB->query('SELECT * FROM projet WHERE id IN('.implode(',',$ids).')'); 
foreach ($products as $product){
    $id= $_SESSION['id']=$product->id;   
 

    if(isset($ids)){
      $produit=[
      'image'=> "$product->image",
      'nom'=> "$product->nomP",
      'HeuresP'=> "$product->NHeuresP",
      'price'=>"$product->price",
      'id'=>"$id"
      ]; 
      setcookie('produit',serialize($produit),time() + (86400 * 30), "/");

      if(!empty($_COOKIE['produit'])){
        $reponse = unserialize($_COOKIE['produit']);
//var_dump($reponse['nom']);
    
    }

 if(isset($_SESSION['mail'])){
   
  $mail= $_SESSION['mail'];
  $produit=[
    'mail'=> "$mail",
    'nom'=> "$product->nomP",
    'id'=>"$id"

  ];
  if(is_real(setcookie('confirme',serialize($produit),time() + (86400 * 30), "/")))
  $rep = unserialize($_COOKIE['confirme']);

//  var_dump($produit);

      }else{

      }
  }

}

  ?>


          <?php 
          
          include_once '../functions/header/header.php';
          $title= 'Panier';

          $class= "active"
          
          ?>

 <?php if(empty($ids)):?>
            <div id="inner_banner" class="section inner_banner_section   ">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="full">
                      <div class="title-holder">
                        <div class="title-holder-cell text-left">
                          <h1 class="page-title">Projet Liste</h1>
                          <ol class="breadcrumb">
                            <li><a href="./index.php">Accueil</a></li>
                            <li class="active">Projet Liste</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <ol class="breadcrumb">
                <li class="center"><a href="./index.php"><h2 class="page-title">Votre panier est vide.</h2></a></li>
              </ol>
      <div class="container">    
        <div class="col-md-12">
            <div class="full">
              <div class="tab_bar_section">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#description">Description</a> </li>
                  <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#reviews">Commentaires</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="description" class="tab-pane">
                    <div class="product_desc">
                      <p>
                      <br> <b>INFO-WEB</b>
                        est la grande école digitale située en plein cœur de Paris. Spécialiste des formations web et marketing. 
                        Elle a su allier l’expertise de professionnels du digital à des professeurs de renoms, tout droit sortis de grandes écoles de commerce spécialisées dans les web.  
                        Nous formons les futurs professionnels du digital. Les formations digitales diplômantes qui en résultent ont toutes pour but de vous donner accès aux métiers du digital qui vous passionnent en restant en parfaite adéquation avec le marché du travail dans les nombreux secteurs du web. Découvrez nos formations aux métiers du web et faites décoller votre carrière en validant un diplôme de niveau bac+3 à bac+5.  
                        </p>

                        <p>
                         Notre mission est double : Former des experts du digital mais aussi leur donner les capacités de manager un projet digital dans son intégralité.

                        Notre forte expérience de l’écosystème digital et nos liens étroits avec les entreprises du web nous confèrent une légitimité reconnue par tous les acteurs du secteur. Précurseur de solutions innovantes et moteur de vos ambitions, 
                        notre école web à Paris saura vous accompagner dans vos choix de formation digital et votre parcours professionnel.<br>
                         </p>
                    </div>
                  </div>
                  <div id="reviews" class="tab-pane fade active show">
                    <div class="product_review">
                      <h3>Les commentaires</h3>
                      <div class="commant-text row">
                        <div class="col-lg-2 col-md-2 col-sm-4">
                          <div class="profile"> <img class="img-responsive" src="../functions/images/it_service/client1.png" alt="#"> </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                          <h5>David</h5>
                          <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                          <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                          <p class="msg">ThisThis book is a treatise on the theory of ethics, very popular during the Renaissance. 
                            The first line of Lorem Ipsum, “Lorem ipsum dolor sit amet.. </p>
                        </div>
                      </div>
                      <div class="commant-text row">
                        <div class="col-lg-2 col-md-2 col-sm-4">
                          <div class="profile"> <img class="img-responsive" src="../functions/images/it_service/client2.png" alt="#"> </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                          <h5>Jack</h5>
                          <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                          <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                          <p class="msg">Nunc augue purus, posuere in accumsan sodales ac, euismod at est. Nunc faccumsan ermentum consectetur metus placerat mattis. Praesent mollis justo felis, accumsan faucibus mi maximus et. Nam hendrerit mauris id scelerisque placerat. Nam vitae imperdiet turpis</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="full review_bt_section">
                            <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Leave a Review</a> </div>
                          </div>
                          <div class="full">
                            <div id="collapseExample" class="full collapse commant_box">
                              <form accept-charset="UTF-8" action="index.php" method="post">
                                <input id="ratings-hidden" name="rating" type="hidden">
                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." required=""></textarea>
                                <div class="full_bt center">
                                  <button class="btn sqaure_bt" type="submit">Save</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

 <?php elseif(isset($ids)) :?>

  <div id="inner_banner" class="section inner_banner_section  ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Projet Liste</h1>
              <ol class="breadcrumb">
                <li><a href="./index.php">Accueil</a></li>
                <li class="active">Projet Liste</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="" >
  <div class="container">
    <div class="row">
    <?php foreach ($products as $product):?>
      <!-- <span class="new-price"><?php// if(isset($product->price)) echo number_format( checkInput($product->price),2,',',' ')?> €</span>  -->
      <div class="col-md-9">
        <div class="row">
        
        <div class="col-xl-6 col-lg-12 col-md-12" style="margin-top: 35px;">

            <div class="product_detail_feature_img hizoom hi2">
              <div class="hizoom hi2"> <img src="../images-bdd/projetPhoto/<?php if(empty($product->image)){ echo 'post-06.jpg';} else {echo checkInput($product->image);}?>" alt="#"> </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
            <div class="product-heading">
                <h2><?= $product->nomP;?></h2>
            </div>
            <?php 
              $result = $panier->count() * $product->price;
            ?>
            <div class="product-detail-side"> <span><?=  number_format( $result * 1.196,2,',',' ');?></span><span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
            <div class="detail-contant">

              <form class="cart" method="POST" action="">
                <div class="quantity">
                  <input step="1" min="1" max="1" name="quantity" value="<?= checkInput($panier->count());?>" title="Qty" class="input-text qty text" size="4" type="number">   

                </div>

                <div class="quantity" style="margin-top: 35px;">

                      <button type="submit"  class=" bt_main btn btn-success"  >  <?php  if(!empty($_SESSION['mail'])){ echo "<a href=./DAO/web/updateProducts.php?id=".checkInput($product->id).";> Enregistrer</a>";}else{echo"<a  href='../session/connexion.php' onclick='popbox_ajout()' id='envois' > Enregistrer </a> ";} ?> </button>
                      <button type="button" class="btn btn-danger "> <a  href="panier.php?delpanier=<?= checkInput($product->id);?> "><i class="fa fa-trash"></i>Suprime</a> </button>
                </div>

                 </form>
           </div>
 
            <div class="share-post" style="margin-bottom: 35px;"> 
            
              <ul class="social_icons">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>

    </div>
  </div>
</div>

<?php endif ?>

<?php include_once '../functions/footer/footer.php' ;?>
   
  
