<?php
session_start();
include_once '../index/cookies.php'; 
include('UserInformation.php');



         include_once '../functions/header/header.php'; 
      
echo UserInfo::get_ip();
echo "<br>";
echo UserInfo::get_os();
echo "<br>";
echo UserInfo::get_browser();
echo "<br>";
echo UserInfo::get_device();
echo "<br>"; 
      ?>

      <?php if(isset( $_SESSION['mail'] )):?>

		<a href="./admin.php " class='col-md-3'>Active Contact</a>
		<a href="./read.php " class='col-md-3'>read Contact</a>

		<a href="./compteur.php " class='col-md-3'>compteur Visite</a>

      	<strong><a href="logout.php"> Se deconnecter</a></strong>

<p>Le mail :<?php if(isset($rep['nom'])) echo $rep['nom']?></p>
<p>La recherche :<?php if(isset($rep['seach'])) echo $rep['seach']?></p>

<?php// else:?>
<?php// 	header("Location: ./connexion_admin.php");?>

<?php endif ?>