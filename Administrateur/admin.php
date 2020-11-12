<?php
session_start();
include '../admin/database.php';
$bdd = Database::connect();
if(isset( $_SESSION['mail'] )):?>
<?php
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
   if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
      $confirme = (int) $_GET['confirme'];
      $req = $bdd->prepare('UPDATE authentification SET confirme = 0 WHERE id = ?');
      $req->execute(array($confirme));
   }
   if(isset($_GET['active']) AND !empty($_GET['active'])) {
      $active = (int) $_GET['active'];
      $req = $bdd->prepare('UPDATE authentification SET confirme = 1 WHERE id = ?');
      $req->execute(array($active));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM authentification WHERE id = ?');
      $req->execute(array($supprime));
   }
} 
$membres = $bdd->query('SELECT * FROM authentification ORDER BY id DESC LIMIT 0,5');
// $commentaires = $bdd->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 0,5');
//include_once '../functions/header/header.php';

?>
<link rel="stylesheet" href="../main/css/profil.css" />

<link rel="stylesheet" href="../main/css/index2.css" />    

<table class='container'>
   <div class="center admin">
      <p>   <a href="./compteur.php " class='col-md-3'>compteur Visite</a></p>
      <p><a href="./read.php " class='col-md-3'>read Contact</a></p>
		
   <strong><a href="logout.php"> Se deconnecter</a></strong>

        <thead class='thead-read'> 
            <tr>
                <td>#id</td>
                <td>Nom</td>
				   <td>Prenom</td>
                <td>Action</td>
               
            </tr>
        </thead>
        <tbody>
        <?php while($m = $membres->fetch()) : ?>

         <tr>

           <td><?= $m['id'] ?> </td>
           <td><?= $m['nom'] ?></td>
           <td><?= $m['prenom'] ?></td>
           <td>
           <?php if($m['confirme'] == 1):  ?> 
               <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">desactiver</a>
               <?php elseif($m['confirme'] == 0):  ?> 
                  <a href="admin.php?type=membre&active=<?= $m['id'] ?>">Active</a>
                  <a href="admin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a>

            <?php else:?>
               <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">desactiver</a>
               <a href="admin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a>

            <?php endif ?>
           </td>
           
         </th>
         <?php endwhile ?>

         </tbody>
    
   </div>
</table>
<?php else:?>
<?php 	header("Location: ./connexion_admin.php");?>

<?php endif ?>
  