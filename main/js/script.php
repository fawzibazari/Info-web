<script>
 //////////////////////////////////////////////////////////////////////////////

//include_once("./main.js");

    function supprime() {
    window.location.assign('deleteContact.php?id=<?= $product->id?>', "MsgWindow", "width=800","height=500");
 }
 
 function effacer(){
 let txt;
 
 if (confirm("êtes-vous sûr de vouloir vous supprimer ces valeurs !")) {
      supprime();
    
     text ="<a style='color:red;' href='deleteContact.php?id=<?= $product->id?> > Le voiture a bien été Supprimer </a> ";
 
 } else {
 
     text = " <a href='./index.php' > Retour</a>";
 
 }
     document.getElementById("sup").innerHTML = text;
 }
     //////////////////////////////////////////////////////////////////////

</script>