<?php
session_start();
include '../admin/database.php';
$db = Database::connect();
if(isset( $_SESSION['mail'] )):?>
<?php
// Connect to MySQL database
//$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page

$records_per_page = 5;
if (isset($_GET['search'])) {
	// Custom search, if the user entered text in the search box and pressed enter...
	// The below query will search in every column until it's fount a match, feel free to remove a field if you don't want to search it.
	$stmt = $db->prepare('SELECT * FROM authentification 
						   WHERE id LIKE :search_query
							  OR `nom` LIKE :search_query
							  OR `prenom` LIKE :search_query
							  OR mail LIKE :search_query
							  OR titre LIKE :search_query  
							  OR created LIKE :search_query
							ORDER BY id
							LIMIT :current_page, :record_per_page');
	// The percentages are added each side of the search query so we can find a match in the column value.
	$stmt->bindValue(':search_query', '%' . $_GET['search'] . '%');
	Database::disconnect();

} else {
	// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
	$stmt = $db->prepare('SELECT * FROM authentification ORDER BY id LIMIT :current_page, :record_per_page');
}
// The above queries are ordered by id, you can change this if you want to order by another column, such as "name"
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of authentification, this is so we can determine whether there should be a next and previous button
if (isset($_GET['search'])) {
	$stmt = $db->prepare('SELECT COUNT(*) FROM authentification AND categories

						   WHERE id LIKE :search_query
							  OR nom LIKE :search_query
							  OR `prenom` LIKE :search_query
							  OR created LIKE :search_query
							 OR titre LIKE :search_query');
	
	$stmt->bindValue(':search_query', '%' . $_GET['search'] . '%');
	$stmt->execute();
	$num_contacts = $stmt->fetchColumn();
	Database::disconnect();

} else {
	$num_contacts = $db->query('SELECT COUNT(*) FROM authentification')->fetchColumn();
}
// include_once '../functions/header/header.php';
?>

<?//template_header('Read')?>
<link rel="stylesheet" href="../main/css/profil.css" />

<link rel="stylesheet" href="../main/css/index2.css" />    

<div class="read">
	<div class="top-read container">
	<h2>Read authentification</h2>
	<p>		<a href="./admin-gestion/projet/read.php" class='col-md-3'>Gestions des formations et des projet</a></p>
		<p>		<a href="./admin.php " class='col-md-3'>Active Contact</a></p>
		<p><a href="./compteur.php " class='col-md-3'>compteur Visite</a></p>
		

		<form action="read.php" method="get" class="seach col-md-9">
			<input type="text" name="search" placeholder="Recherche des Contact..." value="<?=isset($_GET['search']) ? htmlentities($_GET['search'], ENT_QUOTES) : ''?>">
		</form>
	</div>
	<table class='container'>
	<strong><a href="logout.php"> Se deconnecter</a></strong>

        <thead class='thead-read'> 
            <tr>
                <td>#</td>
                <td>Name</td>
				<td>text</td>
                <td>Titre</td>
                <td>date</td>
                <td>Created</td>
            </tr>
        </thead>
        <tbody>
		
			<?php foreach ($contacts as $contact): ?>
				
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['nom']?></td>
                <td><?=$contact['prenom']?></td>
				<?php
					if( $contact['titre'] ){ 
						$num= (int) $contact['titre'];
						$statement = $db->query('SELECT * FROM `titre` WHERE titre.id  ');
						$categories = $statement->fetchAll();
						foreach ($categories as $category) {
							if($category['id'] == $num ):?>
							 <td><?=$category['nom'];?></td>
							 
						<?php endif?>
				<?php
						}
					}
				
				?>
				<td><?=$contact['created']?></td>

                <td class="actions">	
                    	<a href="./update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    	<a href="./delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
			</tr>
	
			<?php endforeach; ?>
			
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?><?=isset($_GET['search']) ? '&search=' . htmlentities($_GET['search'], ENT_QUOTES) : ''?>">
			<i class="fas fa-angle-double-left fa-sm"></i>
		</a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?><?=isset($_GET['search']) ? '&search=' . htmlentities($_GET['search'], ENT_QUOTES) : ''?>">
			<i class="fas fa-angle-double-right fa-sm"></i>
		</a>
		<?php endif; ?>
	</div>

</div>
<?php else:?>
<?php 	header("Location: ./connexion_admin.php");?>

<?php endif ?>
  
   
  