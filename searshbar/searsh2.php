<?php
include_once '../admin/database.php';
$db = Database::connect();?>
<?php
// Connect to MySQL database
//$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 3;
//  $recherches =  $_SESSION['search'] = $_GET['search'];

if (isset($_GET['search'])) {
	$_SESSION['search'] = $_GET['search'];

	// Custom search, if the user entered text in the search box and pressed enter...
	// The below query will search in every column until it's fount a match, feel free to remove a field if you don't want to search it.
	$stmt = $db->prepare('SELECT * FROM formation
						   WHERE idFormation LIKE :search_query
                           OR nomFormation LIKE :search_query
							  OR `description` LIKE :search_query
							  OR  environnementF LIKE :search_query
							 OR NHeuresF LIKE :search_query
							ORDER BY idFormation
							LIMIT :current_page, :record_per_page');
	// The percentages are added each side of the search query so we can find a match in the column value.
	$stmt->bindValue(':search_query', '%' . $_GET['search'] . '%');
	Database::disconnect();

} else {
	// Prepare the SQL statement and get records from our products table, LIMIT will determine the page
	$stmt = $db->prepare('SELECT * FROM formation ORDER BY idFormation LIMIT :current_page, :record_per_page');
}
// The above queries are ordered by id, you can change this if you want to order by another column, such as "name"
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of authentification, this is so we can determine whether there should be a next and previous button
if (isset($_GET['search'])) {
	$stmt = $db->prepare('SELECT COUNT(*) FROM formation
						   WHERE idFormation LIKE :search_query
							  OR  nomFormation LIKE :search_query
							  OR  `description` LIKE :search_query
							  OR  environnementF LIKE :search_query
							 OR  NHeuresF LIKE :search_query');
	
	$stmt->bindValue(':search_query', '%' . $_GET['search'] . '%');
	$stmt->execute();
	$num_products = $stmt->fetchColumn();
	Database::disconnect();

} else {
	$num_products = $db->query('SELECT COUNT(*) FROM formation')->fetchColumn();
}
include_once '../functions/header/header.php';
?>



		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

<!--  -->
	<div class="container">
		<div  class="row">  
			<?php foreach ($products as $product):?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<div class="full blog_colum">
						<h3>Formation</h3>
						<div class="blog_section">
							<div class="blog_feature_img"> <img src="../images-bdd/formationPhoto/<?php if(empty($product['photoF'])){ echo 'post-06.jpg';} else {echo checkInput($product['photoF']);}?>" alt="#"> </div>
							<div class="blog_feature_cantant">
								<h4><?php if(isset($product['nomFormation'])) echo checkInput($product['nomFormation']);?></h4>
								<div class="post_info">
									<ul>
										<li><i class="fa fa-user" aria-hidden="true"></i> </li>
										<li><i class="fa fa-comment" aria-hidden="true"></i> 5</li>
										<p><i class="fa fa-clock-o"></i><?php if(isset($product['NHeuresF'] )) echo $product['NHeuresF']; ?> Heures</p>
									</ul>
								</div>
								<p><?= checkInput($product["description"])?></p>
								<div class="bottom_info">
									<div class="pull-right">
									<div class="social_icon">
									
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach?>
		</div>
	</div>



<!--  -->


</div>








  
   
  