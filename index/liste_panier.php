<?php 
include_once './bdd_header.php'; 
include_once '../functions/header/header.php'; 

// require './db.class.php';
// $DB = new DB();
// $req =$DB->db->prepare('SELECT * FROM `products`');
// $req->execute();
// var_dump($req->fetchAll());
$title= 'liste_panier';

 $products= $DB->query("SELECT * FROM projet");

 //var_dump($products);
?>
<div class="container">
            <div class="row">
                
            <?php foreach ($products as $product):?>

                <div class="col-md-4">
                <div class="full blog_colum">
                <div class="blog_feature_img"> <img src="../images-bdd/projetPhoto/<?php if(empty($product->image)){ echo 'post-06.jpg';} else {echo checkInput($product->image);}?>" alt="#"> </div>
                <div class="post_time">
                    <p><i class="fa fa-clock-o"></i><?=  $product->NHeuresP ?> Heures</p>
                </div>
                <div class="blog_feature_head">
                    <h4><?= checkInput($product->nomP)?></h4>
                </div>
                <div class="blog_feature_cont">
                    <p><?= checkInput($product->descriptionP)?></p>
                </div>
                <div class="center">
                    <a href="./add_panier.php?id=<?= $product->id;?>"  class="addPanier">
                        <button draggable="false" title="Zoom avant" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;">
                            <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;">
                        </button>
                    </a>
                    <!-- <a href="./add_panier.php?id=<?// $product->id;?>" onclick="popbox()" class="addPanier"><button draggable="false" title="Zoom avant" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button></a> -->
                    </div>
                </div>
            </div>
            <?php endforeach?>

            </div>
        </div>
    </div>
</div>
<!-- end section -->
  <!-- end footer -->

  <?php include '../functions/footer/footer.php' ;?>
