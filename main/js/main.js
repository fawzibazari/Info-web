
// pour fixer mon header nav
window.onscroll = function() {myScroll()};

function myScroll() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("myP").className = "topscroll";
  } else {
    document.getElementById("myP").className = "";
  }
}


// 
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//  /////////

function myshow(y) {
  let x = document.getElementById("myLinks");
  y.classList.toggle("change");

  if (x.style.display === "block") {
      x.style.display = "none";
  } else {
      x.style.display = "block";

      x.classList.toggle("collapse");

  }
}

function mybar(x) {
  x.classList.toggle("change");
}

  //////////////////////////////panier////////////////////////
// function supprimer() {
//   window.location.assign('./panier.php', "MsgWindow", "width=800,height=500");
// }
// function popbox() {
//   let message;
// if (confirm(' Voulez vous consulter votre paner ?')) {
    
//   data.message= supprimer();
//   alert (data.message);

// } else {
//   message =  window.location.assign('./index.php', "MsgWindow", "width=800,height=500");

// }
//   document.getElementById("sup").innerHTML = data.message;
// }

///////////////////////////////// connexion si ajout ///////////////////////////////////


function popbox_ajout() {
  let text;

if (alert(' Sauvegarde: connecter vous si vous vouler ajouter enregistree !')) {
  text=   window.location.assign('../session/connexion.php', "MsgWindow", "width=800,height=500");
 // text= header("Location: ../session/connexion.php");

  //text= window.location.assign('../session/connexion.php', "MsgWindow", "width=800","height=500");     
} 
  document.getElementById("envois").innerHTML = text;

}


    ///////////////////////////pour le mot de passe//////////////////////////////////////////////////

    const eye = document.querySelector(".feather-eye");
    const eyeoff = document.querySelector(".feather-eye-off");
    const passwordField = document.querySelector("input[type=password]");
    
    eye.addEventListener("click", () => {
      eye.style.display = "none";
      eyeoff.style.display = "block";
    
      passwordField.type = "text";
    });
    
    eyeoff.addEventListener("click", () => {
      eyeoff.style.display = "none";
      eye.style.display = "block";
    
      passwordField.type = "password";
    });

     ////////////////////////////////////////////////////////////////////////
    //  function effacerS(){
    //   let txt;
      
    //   if (confirm("êtes-vous sûr de vouloir vous supprimer ces valeurs !")) {
    //       // text = '<a  href="./deleteProjet.php?id=<?=checkInput ($productM->id)?>">Suprimer </a>';
    //        txt= window.location.assign('./DAO/web/deletetProducts.php?id=<?=checkInput($productM->id)?>', "MsgWindow", "width=800","height=500"); 
    //      //  text ="<a style='color:red;' href='deleteContact.php?id=<?= $product->id?> > Le voiture a bien été Supprimer </a> ";
      
    //   }else{
    //    txt = "Effacer";
    //   } 
    //       document.getElementById("suprimeS").innerHTML = txt;
    //   }

///////////////////////////////////////////////////////////////////////////////////////////////////
         // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
//////////////////////////////////////////////////////////////////////////////////////////////////


$(document).ready(function () {
  var itemsMainDiv = ('.MultiCarousel');
  var itemsDiv = ('.MultiCarousel-inner');
  var itemWidth = "";

  $('.leftLst, .rightLst').click(function () {
      var condition = $(this).hasClass("leftLst");
      if (condition)
          click(0, this);
      else
          click(1, this)
  });

  ResCarouselSize();




  $(window).resize(function () {
      ResCarouselSize();
  });

  //this function define the size of the items
  function ResCarouselSize() {
      var incno = 0;
      var dataItems = ("data-items");
      var itemClass = ('.item');
      var id = 0;
      var btnParentSb = '';
      var itemsSplit = '';
      var sampwidth = $(itemsMainDiv).width();
      var bodyWidth = $('body').width();
      $(itemsDiv).each(function () {
          id = id + 1;
          var itemNumbers = $(this).find(itemClass).length;
          btnParentSb = $(this).parent().attr(dataItems);
          itemsSplit = btnParentSb.split(',');
          $(this).parent().attr("id", "MultiCarousel" + id);


          if (bodyWidth >= 1200) {
              incno = itemsSplit[3];
              itemWidth = sampwidth / incno;
          }
          else if (bodyWidth >= 992) {
              incno = itemsSplit[2];
              itemWidth = sampwidth / incno;
          }
          else if (bodyWidth >= 768) {
              incno = itemsSplit[1];
              itemWidth = sampwidth / incno;
          }
          else {
              incno = itemsSplit[0];
              itemWidth = sampwidth / incno;
          }
          $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
          $(this).find(itemClass).each(function () {
              $(this).outerWidth(itemWidth);
          });

          $(".leftLst").addClass("over");
          $(".rightLst").removeClass("over");

      });
  }


  //this function used to move the items
  function ResCarousel(e, el, s) {
      var leftBtn = ('.leftLst');
      var rightBtn = ('.rightLst');
      var translateXval = '';
      var divStyle = $(el + ' ' + itemsDiv).css('transform');
      var values = divStyle.match(/-?[\d\.]+/g);
      var xds = Math.abs(values[4]);
      if (e == 0) {
          translateXval = parseInt(xds) - parseInt(itemWidth * s);
          $(el + ' ' + rightBtn).removeClass("over");

          if (translateXval <= itemWidth / 2) {
              translateXval = 0;
              $(el + ' ' + leftBtn).addClass("over");
          }
      }
      else if (e == 1) {
          var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
          translateXval = parseInt(xds) + parseInt(itemWidth * s);
          $(el + ' ' + leftBtn).removeClass("over");

          if (translateXval >= itemsCondition - itemWidth / 2) {
              translateXval = itemsCondition;
              $(el + ' ' + rightBtn).addClass("over");
          }
      }
      $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
  }

  //It is used to get some elements from btn
  function click(ell, ee) {
      var Parent = "#" + $(ee).parent().attr("id");
      var slide = $(Parent).attr("data-slide");
      ResCarousel(ell, Parent, slide);
  }

});
// (function($){
// $(".addPanier").click(function(event){
//     event.preventDefault();
//     $.get($(this).attr('href'),{},function(data){
//         console.log(data);
//         if(data.error){
//             alert (data.message)
//         }else{
//             if(confirm(data.message + '. Voulez vous consulter votre paner ?')){
//                     location.href= 'panier.php';
//             } else{

//             }         
//         }
//     },'json')
//     //return false;
// });
// })(jQuery);
// alert(data.message);

(function() {
  var rotate, timeline;

  rotate = function() {
      return $('.card:first-child').fadeOut(400, 'swing', function() {
          return $('.card:first-child').appendTo('.container').hide();
      }).fadeIn(400, 'swing');
  };

  // timeline = setInterval(rotate, 1200);

  // $('body').hover(function() {
  //   return clearInterval(timeline);
  // });

  $('.next').click(function() {
    return rotate();
  });
}).call(this);
