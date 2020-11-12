<?php 
         if(!empty($_COOKIE['cookies'])){
             $reponse =$_COOKIE['cookies'];
         }
         if(!empty($_POST['ok'])){
             setcookie('cookies',$_POST['ok'], time() + (86400 * 30), "/");
             $reponse = $_POST['ok'];
         }
         include_once '../index/cookies.php'; 
         if(empty($_SESSION['mail'])){
           header("Location: ../index/index.php");

         }
    ?>
<!-- // function header_home() {
//     echo <<< -->


<!DOCTYPE html>
    <html lang="fr">
    <head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icons -->
    <link rel="icon" href="../functions/images/fevicon/fevicon.png" type="image/gif" />
    <!-- style css -->
    <link rel="stylesheet" href="../main/css/style.css" />

    <!-- responsive css -->
    <link rel="stylesheet" href="../main/css/responsive.css" />
    <link rel="stylesheet" href="../main/bootstrap/css/colors_landing_page.css" />
  
        <!-- bootstrap css -->

    <link href="../main/bootstrap/css/css.css" rel="stylesheet">


    <!-- js animation silde profil -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


     <!--font awesome  -->

     <link href="../main/bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="../main/bootstrap/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/shop-item.css" rel="stylesheet">
    <!-- revolution slider css -->
    <link rel="stylesheet" href="../main/css/main.css" />
    <link rel="stylesheet" href="../main/css/responsive.css" />
    
    <link rel="stylesheet" href="../main/css/2bootstrap.css" />


    <!-- modification css -->
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    </head>
    <body id="default_theme" class="it_service">
    <!-- loader -->
    <!-- <div class="bg_load"><a href='index.php'><img class="loader_animation" src="../functions/images/loaders/loader_1.png" alt="#" /></a>  </div> -->
    <!-- end loader -->
    <!-- header -->
    <header id="default_header" class="header_style_1">
      <!-- header top -->
      <div class="header_top">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="full">
                <div class="topbar-left">
                  <ul class="list-inline">
                    <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com"><?php if(isset($_SESSION["mail"])){echo $_SESSION["mail"];}?></a></span> </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 right_section_header_top">
              <div class="float-right">
             <?php if(isset($_SESSION["mail"])):?>
   
                  <!-- <h3 style=' padding:0 5px;  margin:0 auto;  background-color: #ced4da;  color:#fff;  text-align: center;'> Bienvenu - "<?//$_SESSION["username"]?>"</h3>   -->
                  <div class="make_appo dcn"><a class="btn white_btn DC" href='../session/logout.php'>Déconnexion</a></div>
 
            <?php else: ?> 
                  <div class="make_appo"> <a class="btn white_btn" href="../session/connexion.php">Connexion</a> </div>

            <?php endif?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end header top -->
      <!-- header bottom -->
      <div class="header_bottom">
      <div id="myP" onclick="myScroll()">

        <div class="container" >
          <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
              <!-- logo start -->
              <div class="logo"> <a href="../index/index.php"><img src="../functions/images/logos/it_logo.png" alt="logo" /></a> </div>
              <!-- logo end -->
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 burger">
              <div id="button" class=" bar0" onclick="myshow(this)">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
              <!-- menu start -->
            <div id="myLinks" class="">

              <div class="menu_side navmenu">
                <div id="navbar_menu">
                  <ul class="first-ul">
                    <li> <a class="active"href="../index/index.php">Accueil</a> </li>
              
                    <li> 
                        <?php if($_SESSION["titre"] == 21) :?>
                          <a href="../index/profil_intervenant.php">Intervenant</a>
                        <?php elseif($_SESSION["titre"] == 22) :?>
                          <a href="../index/profil_formateur.php">Formateur</a>
                          <?php elseif($_SESSION["titre"] == 20) :?>
                            <a href="../index/profil_stagiaire.php">Stagiaire</a>
                        <?php else :?>
                          <a href="../session/connexion.php">Connexion</a>
                        <?php endif ?>

                    </li>
                    <li> <a href="../index/panier.php">Panier</a>
                    
                    </li>
                    <li> <a href="#">Paramètres</a>
                      <ul>
                        <?php if($_SESSION["titre"]== 21) :?>

                            <li><a href="../session/in_intervenant.php">Paramètres du compte</a></li>
                            <li><a href="../session/edition.php">Confidentialité</a></li>

                        <?php elseif($_SESSION["titre"]== 22) :?>

                          <li><a href="../session/in_formateur.php">Paramètres du compte</a></li>
                          <li><a href="../session/edition.php">Confidentialité</a></li>

                        <?php else :?>

                        <li><a href="../session/update.php">Paramètres généraux</a></li>
                        <li><a href="../session/edition.php">Confidentialité</a></li>

                        <?php endif ?>

                      </ul>
                       

                    </li>
                  </ul>
                </div>
                <div class="search_icon">
                  <ul>
                    <div type="button" id="myBtn" data-toggle="modal" data-target="#myModalsearch" class="btn btn-default ">
                        <span class="glyphicon glyphicon-search" aria-hidden="true" ></span>
                    </div>
                    <!-- Modal -->
                    <!-- Modal -->

                  <div id="myModal" class="modal">
                        <!-- Modal content -->
                      <div class="modal-content">
                        <div class="modal-header">
                          <span class="close">&times;</span>
                        </div>
                          <div class="modal-body full">
                              <h3>Recherche</h3>
                              <form action="../searshbar/searsh.php" method="get" >
                                <div class="form-group center">
                                   <input type="search" name="search" class='col-md-12' placeholder="Recherche..." value="<?=isset($_GET['search']) ? htmlentities($_GET['search'], ENT_QUOTES) : ''?>">
                                </div>
                                <div class="form-group center">
                                  <button type="submit" class="btn btn-default navbar-btn ">Recherche <i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
		                          </form>
                          </div>
                          <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </ul>
              </div>

              </div>
            </div>
              <!-- menu end -->
            </div>
        
          </div>
        </div>
      </div>
    </div>

      <!-- header bottom end -->
    </header>