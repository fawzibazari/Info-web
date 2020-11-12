<?php
include_once './DAO/App/Entity/products.php';

use \App\Entity\Products;
$product = new Products();

//  $product= $DB->query("INSERT INTO `projet` (`id`,  `descriptionP`,  `environnementP`, `price`, `image`, `NHeuresP`, `nomP`) VALUES (NULL,  ?, ?, ?, ?, ?, ?)");

try{
  ////egele corespon a id dans form update projet
        //var_dump($imageExtension);
        $username = $_SESSION["mail"];
       // $egale = $_GET['id'];
       // var_dump($egale); 
            
    if(isset($_POST)) 
    {
        $descriptionP=null; $environnementP=null; $priceP=null; $image=null; $NHeuresP=null; $nomP=null; $bdd_img=null; $data_img =null;

      //  $emailUser;         $_SESSION["mail"];

      if(isset($_POST['nomP'])) 
      {
        $nomP       = checkInput($_POST['nomP']);
        $isSuccess          = true;

      }else{
        $nomPError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;

      }
      if(isset($_POST['environnementP'])) 
      {
        $environnementP       = checkInput($_POST['environnementP']);
        $isSuccess          = true;

      }else{
        $environnementPError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
      }
        if(isset($_POST['descriptionP'])) 
        {
            $descriptionP       = checkInput($_POST['descriptionP']);
            $isSuccess          = true;

      
        }else{
            $descriptionPError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
    
        if(isset($_POST['price'])) 
        {
            $priceP              = checkInput($_POST['price']);
            $isSuccess          = true;

        }else{
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(isset($_POST['NHeuresP'])) 
        {
            $NHeuresP            = checkInput($_POST['NHeuresP']);
            $isSuccess          = true;

        }else{
            $HeuresPError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(isset($_POST["image"])) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        { 
            $isSuccess          = true;


            $image              = checkInput($_POST["image"]);
            //var_dump($   );
            if(empty($image )){
                $imageError ="error de donnée";
            }else{ 
                $data_img = file_get_contents($image);

              
            }
        
            $bytes = random_bytes(5);
            //creation de 5 valeur 
            $rand_img= bin2hex($bytes);
            //function de création de nom au hasare 

            $imagePath          = '../images-bdd/projetPhoto/'.basename($rand_img);

           
            $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
            $isImageUpdated = true;
            $isUploadSuccess = true;

            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($data_img > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 150 Kilo-octet";
                $isUploadSuccess = false;
            }   
                //le chemain plus l'image 
                 $save_img= "$imagePath.png";
               ///pour sauvergarder dans la base 
                $bdd_img="$rand_img.png";
                if( file_put_contents($save_img, $data_img)) 
                {
                    $product->setImage($bdd_img);
                    $sevaIsOk = $DB->save($product);
                } else {
                    # code...
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                }
            
              
        }else{
            $imgError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
     
 
        if(isset($egale)){
            $sevaIsOk=null;
           // var_dump($image);
            //$product =$DB->query("SELECT * FROM projet WHERE id=:id", array('id'=> $_GET['id']));
            $product = $DB->read($egale);
           // var_dump($product);
            $product->setDescriptionP($descriptionP);
            $product->setEnvironnementP($environnementP);
            $product->setPrice($priceP);
            $product->setImage($bdd_img);
            $product->setHeuresP($NHeuresP);
            $product->setNomP($nomP);
            $product->setUsername($username);

            $sevaIsOk = $DB->save($product);
            if($sevaIsOk  === null){
                $msg=null;


            }else{
                $msg = "va être modifier!$sevaIsOk";

            }
            
        }elseif($isSuccess){ 

            $products= $DB->readProjet($nomP);
            $length = strlen($descriptionP);

            
            
            var_dump($length);

            if($length !== 0 ){
            //ne pas repetée la meme ligne 
            $product->setNomP($nomP);
            $product->setEnvironnementP($environnementP);
            $product->setPrice($priceP);
            $product->setHeuresP($NHeuresP);
            $product->setImage($bdd_img);
            $product->setUsername($username);
            $product->setDescriptionP($descriptionP);

            $sevaIsOk = $DB->save($product);
 

            }else if($descriptionP == '0' ){
                 $msg = "deja dans la base";
     
               
            }
            
        }
     
      
    }
    
}catch(PDOException $error) { 
    //die("<h1>impossible de se connecter a la base de donnée</h1>");

    $msg = $error->getMessage();  
}


  
//$user=          $_SESSION['username'];
?>
