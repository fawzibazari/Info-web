
<div class="full">

  <!-- section -->

<!-- end section -->
<!-- Modal -->
<div class="modal fade" id="search_bar" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
            <div class="navbar-search">
              <form action="#" method="get" id="search-global-form" class="search-global">
                <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                <button class="search-global__btn"><i class="fa fa-search"></i></button>
                <div class="search-global__note">Begin typing your search above and press return to search.</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model search bar -->
<!-- footer -->
<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">
      <div class="map_section">
        <div id="map">
        </div>
      </div>
      <div class="footer_blog">
        <div class="row">
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Notre Objectif</h2>
            </div>
            <p> Former des experts du digital mais aussi leur donner les capacités de manager un projet digital dans son intégralité. Notre forte expérience de l’écosystème digital et nos liens étroits avec les entreprises du web nous confèrent une légitimité reconnue par tous les acteurs du secteur.</p>
            <ul class="social_icons">
              <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <div class="col-md-6 top_foote">
            <div class="main-heading left_text">
              <h2>Autre</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="../index/panier.php"><i class="fa fa-angle-right"></i>À propos de nous </a></li>
              <li><a href="../mention-légal/Mentions_legales.pdf"> Mentions légales</a></li>

              <!-- <li><a href="it_privacy_policy.php"><i class="fa fa-angle-right"></i> Privacy policy</a></li> -->
              <li><a href="#"><i class="fa fa-angle-right"></i> Nouveautées</a></li>
              <li><a href="../session/contact.php"><i class="fa fa-angle-right"></i> Contact nous</a></li>
            </ul>
          </div>
          <div class="col-md-6 top_foote">
            <div class="main-heading left_text">
              <h2>Services</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="../searshbar/searsh.php"><i class="fa fa-angle-right"></i> Services</a></li>
              <li><a href="../index/nos_formateurs.php"><i class="fa fa-angle-right"></i> Formateur</a></li>
              <li><a href="../index/nos_intervenants.php"><i class="fa fa-angle-right"></i> Intervenant</a></li>
              <li><a href="javascript:window.print()"><i class="fas fa-print"></i> Imprimez la page </a></li>
            </ul>
          </div>
          <div class="col-md-6 top_foote">
            <div class="main-heading left_text">
              <h2>Contact </h2>
            </div>
            <p>123 Avenu de la république<br>
              Paris 75002<br>
              <span style="font-size:18px;"><a href="tel:+9876543210">+987 654 3210</a></span></p>
            <div class="footer_mail-section">
              <form>
                <fieldset>
                <div class="field">
                  <!-- <input placeholder="Email" type="text"> -->
                  <!-- <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button> -->
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="cprt">
      <?php  require_once '../Administrateur/data/data.php'; ajouter_vue() ?>

        <p>Info-Web © Copyrights 2020</p>
      </div>
    </div>
  </div>
 
  <b id="myForm">

     ' <?php  if(isset($reponse)):?>
      <?php else:?>
          <form action=""  method="post" class="cookies">
              <p>"Nous utilisons les cookies afin de fournir les services et fonctionnalités proposés sur notre site et afin d’améliorer l’expérience de nos utilisateurs. Les cookies sont des données qui sont téléchargés ou stockés sur votre ordinateur ou sur tout autre appareil.</p>
              <p>En cliquant sur ”J’accepte”, vous acceptez l’utilisation des cookies. Vous pourrez toujours les désactiver ultérieurement. Si vous supprimez ou désactivez nos cookies, vous pourriez rencontrer des interruptions ou des problèmes d’accès au site."</p>
              <p>"En poursuivant votre navigation, vous acceptez le dépôt de cookies tiers destinés à vous proposer des vidéos, des boutons de partage, des remontées de contenus de plateformes sociales"</p>
              <p>"Nous utilisons des cookies pour nous permettre de mieux comprendre comment le site est utilisé. En continuant à utiliser ce site, vous acceptez cette politique."</p>
          <br />  
              <button type="submit" name="ok" value="ok"  class="btn btn-primary center"> j'accepte les conditions</button>
          <br/>
          </form>
  <?php endif ?>  
</b>
<title><?php if(isset($title)):?> <?=$title;?> <?php else:?> <?= $title = 'INFO-WEB'; ?> <?php endif ?></title>

<script src="../main/js/wow.js"></script>
<script src="../main/js/hizoom.js"></script>
<script src="../main/js/ajax.jquery.min.js"></script>
<script src="../main/js/js.js"></script>
<script src="../main/js/custom.js"></script>
<script src="../main/js/main.js"></script>
</footer>
<!-- end footer -->
<!-- js section -->

<!-- utilisation des variable title pour les pasges titele -->

<!-- carousel -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- end carousel js -->
<!-- google map js -->

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1T-YxJ7Rmlh3ksnc2-c9HxLoV_X2kocw&callback=initMap"></script>

<!-- end google map js -->
</body>
</html>
