<?php
session_start();
include_once '../index/cookies.php'; 

include_once '../admin/database.php';

?>
<?php
// Connect to MySQL database
//$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$db = Database::connect();

$records_per_page = 6;
if (isset($_GET['search'])) {
	$_SESSION['search'] = $_GET['search'];
	// Custom search, if the user entered text in the search box and pressed enter...
	// The below query will search in every column until it's fount a match, feel free to remove a field if you don't want to search it.
	$stmt = $db->prepare('SELECT * FROM projet 
						   WHERE id LIKE :search_query
							  OR `nomP` LIKE :search_query
							  OR `descriptionP` LIKE :search_query
							  OR environnementP LIKE :search_query
							  OR NHeuresP LIKE :search_query  
							  OR price LIKE :search_query
							ORDER BY id
							LIMIT :current_page, :record_per_page');
	// The percentages are added each side of the search query so we can find a match in the column value.
	$stmt->bindValue(':search_query', '%' . $_GET['search'] . '%');

} else {
	// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
	$stmt = $db->prepare('SELECT * FROM projet ORDER BY id LIMIT :current_page, :record_per_page');
}
Database::disconnect();
// The above queries are ordered by id, you can change this if you want to order by another column, such as "name"
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of authentification, this is so we can determine whether there should be a next and previous button
$db = Database::connect();

if (isset($_GET['search'])) {

	$stmt = $db->prepare('SELECT COUNT(*) FROM projet AND categories

						   WHERE id LIKE :search_query
							  OR nomP LIKE :search_query
							  OR `descriptionP` LIKE :search_query
							  OR environnementP LIKE :search_query
							 OR NHeuresP LIKE :search_query');
	
	$stmt->bindValue(':search_query', '%' . $_GET['search'] . '%');
	$stmt->execute();
	$num_products = $stmt->fetchColumn();

} else {
	$num_products = $db->query('SELECT COUNT(*) FROM projet')->fetchColumn();
}
Database::disconnect();

include_once '../functions/header/header.php';
$title = "Recheche";

?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">


		<?php//  $search = $_GET['search']; var_dump($search);?>
	

<?//template_header('Read')?>
<!-- <link rel="stylesheet" href="../main/css/profil.css" />

<link rel="stylesheet" href="../main/css/index2.css" />     -->

<div class="read">
	<div class="top-read container">
	
	</div>
	<table class='container'>
<form action="" method="get">

	<input type="search" name="search" id="" value='<?=isset($_GET['search']) ? htmlentities($_GET['search'], ENT_QUOTES) : ''?>'><button class="btn btn-primary" type="submit">Recherche</button>
</form>

<div class="container">
            <div class="row">

				<?php foreach ($products as $product):?>

					<div class="col-md-4">
						<h3>Projet</h3>

					<div class="full blog_colum">
						<div class="blog_feature_img"> <img src="../images-bdd/projetPhoto/<?php if(empty($product['image'])){ echo 'post-06.jpg';} else {echo checkInput($product['image']);}?>" alt="#"> </div>
							<div class="post_time">
								<p><i class="fa fa-clock-o"></i><?php if(isset($product['NHeuresP'])) echo $product['NHeuresP'] ;?> Heures</p>
							</div>
							<div class="blog_feature_head">
								<h4><?= checkInput($product['nomP'])?></h4>
							</div>
							<div class="blog_feature_cont">
								<p><?= checkInput($product["descriptionP"])?></p>
							</div>
							<div class="center">
								<a href="../index/add_panier.php?id=<?= $product['id'];?>"  class="addPanier">
									<button draggable="false" title="Zoom avant" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;">
										<img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;">
									</button>
								</a>
								<!-- <a href="./add_panier.php?id=<?// $product->id;?>" onclick="popbox()" class="addPanier"><button draggable="false" title="Zoom avant" aria-label="Zoom avant" type="button" class="gm-control-active " style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button></a> -->
							</div>
						</div>
					</div>
					
				<?php endforeach?>
            </div>
        </div>
    </div>
</div>
			
        </tbody>
    </table>
			
	<?php if($products==true): ?>
				<?php 	include_once "./searsh2.php" ;?>
	
			   <?php 
			   if(isset($_GET['search']	))
			   $recherche =  $_SESSION['search'] = $_GET['search']	;		   
			   ?>
			   
				<?php elseif($products == null): ?>	
					<?php 	include_once "./searsh2.php" ;?>

					<?php //	header("Location: ./searsh2.php?search=$recherche");?>

            <?php endif?>

	<div class="pagination" style="backgrounf-color:black;">
		<?php if ($page > 1): ?>
		<a style="color: #00376b;      border: 0 solid #000;" href="./searsh.php?page=<?=$page-1?><?=isset($_GET['search']) ? '&search=' . htmlentities($_GET['search'], ENT_QUOTES) : ''?>">
			<i class="fas fa-angle-double-left fa-sm"></i>
		</a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_products): ?>
		<a style="color: #00376b;      border: 0 solid #000;" href="./searsh.php?page=<?=$page+1?><?=isset($_GET['search']) ? '&search=' . htmlentities($_GET['search'], ENT_QUOTES) : ''?>">
			<i class="fas fa-angle-double-right fa-sm"></i>
		</a>
		<?php endif; ?>
	</div>

</div>

		

<?php include_once "../functions/footer/footer.php";?>	

   
  