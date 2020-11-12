<?php
  


if(isset($_SESSION['mail']) AND isset($_SESSION['id']) ){
  $search=null;
  $msg =null;

   $mail= $_SESSION['mail'];
   $id= $_SESSION['id'];
   if(isset( $_GET['search'] )){
    $search= $_GET['search'];
    
    $_SESSION['search'] = $search;
   }

   $username= $_SESSION['username'] = $mail= $_SESSION['mail'];

 $user=[
     'prenom'=> "$mail",
     'nom'=> "$id",
     'search'=> "$search",

     'username'=> $username
 ];

setcookie('utilisateur',serialize($user),time() + (86400 * 30), "/");
if(isset($_COOKIE['utilisateur'])){

  $utilisateur = $_COOKIE['utilisateur'];
  $rep=unserialize($utilisateur);
}
}

?>
