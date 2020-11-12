<?php 
require 'db.class.php';
$DB = new DB();
require 'panier.class.php';  
$panier = new panier($DB);
//var_dump($panier);
function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

