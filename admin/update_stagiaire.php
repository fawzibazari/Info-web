<?php 

    $Error= $motivation = $cv = $idFormation = $telephone = $age = $image = "";
    try{
        if(isset($_POST['ajouter'])) 
        {
            $telephone          = checkInput($_POST['telephone']);
            $age                = checkInput($_POST['age']);
            $motivation         = checkInput($_POST['motivation']);
            $image              = checkInput($_FILES["image"]["name"]);
            $imagePath          = '../images-bdd/images/'.basename($image);
            $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
            $isSuccess          = true;
            $isUploadSuccess    = false;
        
            if(!isset($motivation)) 
            {
                $motivationError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            } 
          
            if(isset($image,$cv))
            {
                $isUploadSuccess = true;
                if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $cvExtension !='pdf'  ) 
                {
                    $imgError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif,pdf";

                    $isUploadSuccess = false;
                }
                if(file_exists($imagePath)) 
                {
                    $imgError = "Le fichier existe deja";
                    $isUploadSuccess = false;
                }
              
                if($_FILES["image"]["size"] > 1500000) 
                {
                    $imgError = "Le fichier ne doit pas depasser les 1500KB";
                    $isUploadSuccess = false;
                }
              
                if($isUploadSuccess) 
                {
                    if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                    {
                        $imgError = "Il y a eu une erreur lors de l'upload";
                        $isUploadSuccess = false;
                    } 
                  
                } 
            }
            
            if($isSuccess) 
            {
if(isset($_POST['idFormation'])){
    $idFormation        = checkInput($_POST['idFormation']);

}
                $db = Database::connect();
                
                $statement = $db->prepare("UPDATE `stagiaire` SET `telephone` = ?, `age` = ?, `images` = ?, `cv` = ?, `motivation` = ?, `idFormation` = ? WHERE `stagiaire`.`username` = ? ");
                $statement->execute(array($telephone,$age,$image,$cv,$motivation,$idFormation,$_SESSION["mail"]));
                Database::disconnect();
               // header("Location: ../index/index.php");
               $msg="votre compte a bien ete modifier";
            }elseif($isImageUpdated && !$isUploadSuccess)
            {
                $db = Database::connect();
                $statement = $db->prepare("SELECT * FROM stagiaire where username = ?");
                $statement->execute(array($emailUser));
                $item = $statement->fetch();
                $image          = $item['images'];
                Database::disconnect();
               
            }
        }else 
        {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM stagiaire where username = ?");
            $statement->execute(array($emailUser));
            $item = $statement->fetch();
            $telephone           = $item['telephone'];
            $username           = $item['username'];
            $motivation    = $item['motivation'];
            $age          = $item['age'];
            $idFormation       = $item['idFormation'];
            $images          = $item['images'];
            Database::disconnect();
        }
        checkInput('data');
    }catch(PDOException $error) {  
        $msg = $error->getMessage();  
   }
  			
   function insertFormation($nomFormation,$description,$environnementF,$NHeures){
    if(isset($_POST['ajouter'])) 
    {
    $nomFormation            = checkInput($_POST['nomFormation']);
    $idFormation                    = checkInput($_POST['idFormation']);
    $description             = checkInput($_POST['description']);
    $environnementF          = checkInput($_POST['environnementF']);
    $NHeures                 = checkInput($_POST["NHeures"]);
    $NHeure = '';
    $bdd = Database::connect(); 
    $requser = $bdd->prepare("INSERT INTO `formation` ( `nomFormation`, `description`, `environnementF`, `NHeuresF` ) VALUES ( ?, ?, ?, ?)");
    $requser->execute([$nomFormation,$description,$environnementF,$NHeure]);
  //  $exist = $requser->rowCount();
    Database::disconnect();
}
    
}