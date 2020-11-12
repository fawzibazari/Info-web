<?php 
include_once './bdd_header.php'; 
$title= 'Accueil';

?>
<?php include_once '../functions/header/header.php'; ?>

    <link rel="stylesheet" href="../main/css/index.css" />
<p class='etudiant'>
  <div class="row">
      <div class=" col-xl-12 col-md-12 ">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <div class="item active carousel">
              <img src="../functions/max-image/our-team-3.jpg" alt="Los Angeles" style="width:100%;">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item carousel">
              <img src="../functions/max-image/happy-client.jpg" alt="Chicago" style="width:100%;">
              <div class="carousel-caption">
                
              </div>
            </div>
          
            <div class="item carousel">
              <img src="../functions/max-image/our-team-5.jpg" alt="New York" style="width:100%;">
              <div class="carousel-caption">
              </div>
            </div>
        
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
 
  </div>
</p>
<!-- fin header carousell -->



   <div class="container ">
        <div class=" row ">
          <div class="col-md-4">
            <div class="full">
              <div class="service_blog_inner">
                <div class="icon text_align_left center"><img src="../functions/images/it_service/si6.png" alt="#"></div>
                <h4 class="service-heading">Meilleurs formations</h4>
                <p>Découvrez notre sélection de formations pour apprendre à maîtriser le développement web..</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="full">
              <div class="service_blog_inner">
                <div class="icon text_align_left center"><img src="../functions/images/it_service/si2.png" alt="#"></div>
                <h4 class="service-heading">Meilleure sécurité</h4>
                <p>Protège les données de chaque  collaborateur et travailler à distance en toute sécurité.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="full">
              <div class="service_blog_inner">
                <div class="icon text_align_left center"><img src="../functions/images/it_service/si3.png" alt="#"></div>
                <h4 class="service-heading">Partager vos connaissances </h4>
                <p>Vous souhaitez approfondir vos compétences dans le développement l'informatique.  Exercerez vous sur l’un nos projets</p>
           </div>
            </div>
          </div>
        </div>
    </div>

    <section id="experience" >
        <div class="container">
          <p class='linear-gradient'>
              <div class="heading">
                  <h2>Devenir</h2>
              </div>
              
              <div class="white-divider"></div>
                  <ul class="timeline row">
                    <li class='col-md-6'>
                        <div class="timeline-badge center"><span class="glyphicon glyphicon-briefcase"></span></div>
                        <div class="timeline-panel-container">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Ingénieur d'études et développement Front-End Confirmé </h3>
                                    <h4><i class="bubble-icon fa fa-eur"></i> 38.000,00 € - 50.000,00 € / an  </h4>
                                    <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 9 mois </p>
                                </div>
                                <div class="timeline-body">
                                    <p> Réseau -powershell, Virtualisation Windows et l'Unix</p>
                                    <p>Design UX et UI, Adobe XD, figma,Jamboard-google et Gloomaps.com </p>
                                    <p>Angularjs, PHP, JAVASCRIPT</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class='col-md-6'>
                        <div class="timeline-badge center"><span class="glyphicon glyphicon-briefcase"></span></div>
                        <div class="timeline-panel-container-inverted">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Concepteur Développeur  </h3>
                                    <h4><i class="bubble-icon fa fa-eur"></i> 2000 et 2500 € brut mensuel.</h4>
                                    <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 2018-2019</p>
                                </div>
                                <div class="timeline-body">
                                    <p> Garantir la qualité et la conformité du code (Javascript, PHP).  </p>
                                    <p> Réaliser les recettes et tests et corriger les bugs éventuels.  </p>
                                    <p> Développer des outils internes, proposer des améliorations.</p>

                                </div>
                            </div>
                        </div>
                    </li>
                  </ul>


              <ul class="timeline row">
                  <li class='col-md-6'>
                      <div class="timeline-badge center"><span class="glyphicon glyphicon-briefcase"></span></div>
                      <div class="timeline-panel-container">
                          <div class="timeline-panel">
                              <div class="timeline-heading">
                                  <h3>Développeur Full Stack  </h3>
                                  <h4><i class="bubble-icon fa fa-eur"></i> 550,00€ à 750,00€ par mois </h4>
                                  <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 6 mois </p>
                              </div>
                              <div class="timeline-body">
                                  <p> Outils: JS PHP  </p>
                                  <p>back-end en PHP utilisant le framework Symfony.</p>
                                  <p>Améliorer l'application</p>
                              </div>
                          </div>
                      </div>
                  </li>
                  <li class='col-md-6'>
                      <div class="timeline-badge center"><span class="glyphicon glyphicon-briefcase"></span></div>
                      <div class="timeline-panel-container-inverted">
                          <div class="timeline-panel">
                              <div class="timeline-heading">
                                  <h3>Développeur Full Stack REACT </h3>
                                  <h4><i class="bubble-icon fa fa-eur"></i> 550,00€ à 750,00€ par mois </h4>
                                  <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 12 mois</p>
                              </div>
                              <div class="timeline-body">
                                  <p>expérience professionnelle en développement web / JS / React Java </p>
                                  <p>Construire, déployer et maintenir les applications Analyser les incidents techniques en production.</p>
                              </div>
                          </div>
                      </div>
                  </li>
                </ul>
            </p>
            </div>

    </section>

<!--  -->

<!--  -->
<div class="panels-inner">
              <div class="container">    
                <div class="block  panel-pane pane-block pane-views-post-block-2">
                  <div class="block-title">
                    <h2 class="pane-title">
                       <span> Articles</span> 
                    </h2>
                  </div>   
                       <div class="pane-content">
                          <div class="view view-evenements view-id-evenements view-display-id-block_1">
                              <div class="view-header">
                            <div class="block-description">
                              </div>    
                                </div>
                                  <div class="view-content">
                                    <div class="views-view-grid cols-3">
                                      <div class="views-row row  clearfix">
                                        <div class="grid col-lg-4 col-md-4 col-sm-4 col-xs-12 ">		
                                          <div class="grid-inner col-inner clearfix">               
                                            <div class="views-field views-field-nothing">        
                                              <div class="field-content"><a class="post-home" href="#" hreflang="" target="" title="" rel="">
                                              <div class="entry-thumbnail text-center"><img typeof="foaf:Image" src="https://www.digitalschool.paris/sites/default/files/styles/medium/public/economie%20positive.jpg?itok=iY2B22YG" width="700" height="525" alt=""> </div>
                                              <div class="meta">
                                                    <div class="entry-title"><h3><a href="">Comment la  INFO-WEB participe à l’avènement de l’économie positive ? </a></h3></div>
                                              </div>
                                              <div>
                                            </div>
                                          </a>
                                      </div>   
                                    </div>               
                                  </div>
                                </div>
                            <div class="grid col-lg-4 col-md-4 col-sm-4 col-xs-12 ">		
                              <div class="grid-inner col-inner clearfix">                                            
                                <div class="views-field views-field-nothing">        
                                  <div class="field-content"><a class="post-home" href="#" hreflang="" target="" title="" rel="">
                                  <div class="entry-thumbnail text-center"><img typeof="foaf:Image" src="https://www.digitalschool.paris/sites/default/files/styles/medium/public/m%C3%A9tiers%20du%20Web.jpg?itok=GOS1olee" width="700" height="525" alt=""> </div>
                                  <div class="meta">
                                        <div class="entry-title"><h3><a href="#">Les opportunités d’emplois pour les métiers du Web à la rentrée 2021</a></h3></div>
                                  </div>
                                  <div>
                                </div>
                              </a>
                            </div>              
                          </div>           
                       </div>
                      </div>                   	
                        <div class="grid col-lg-4 col-md-4 col-sm-4 col-xs-12 ">		
                          <div class="grid-inner col-inner clearfix">                             
                                <div class="views-field views-field-nothing">        <div class="field-content"><a class="post-home" href="#" hreflang="" target="" title="" rel="">
                                  <div class="entry-thumbnail text-center"><img typeof="foaf:Image" src="https://www.digitalschool.paris/sites/default/files/styles/medium/public/Big%20data.jpg?itok=diIo92Hq" width="700" height="525" alt=""> </div>
                                  <div class="meta">
                                        <div class="entry-title"><h3><a href="#">Big data et données, un socle essentiel pour l’écosystème du Digital </a></h3></div>
                                    </div>
                                  <div>
                               </div>
                            </a>
                          </div>  
                        </div>            
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
                <div class="view-footer">
                <a class="more-art" href="../session/inscription.php">Plus d'articles</a>    </div>
            </div>      
          </div>
        </div>
      </div>  
   </div>


<!--  -->
    <div class="group">
    <div class="container ">

        <article class="block-img">
            <div class="block01">
                <span class="centerimg">
            <p class="imagesbl">Industrie</p>
                <img src="../functions/max-image/industrie.jpg">
            </span>
                <span class="centerimg">
            <p class="imagesbl">Assurances</p>
                <img src="../functions/max-image/assurances.jpg">
            </span>
                <span class="centerimg">
            <p class="imagesbl">Santé</p>
                <img src="../functions/max-image/sante-connectee.jpg">
            </span>
            </div>

        </article>

        <article class="block-img">
            <div class="block01">
                <span class="centerimg service">
            <p class="imagesbl">Service</p>
                <img src="../functions/max-image/Application.png">
            </span>
                <span class="centerimg">
            <p class="imagesbl">Télécoms</p>
                <img src="../functions/max-image/Telecoms.jpg">
            </span>
                <span class="centerimg">
            <p class="imagesbl">Finance</p>
                <img src="../functions/max-image/Finance.jpg">
            </span>
            </div>

        </article>
        </div>

    </div>






  
    


<?php include '../functions/footer/footer.php' ;?>
