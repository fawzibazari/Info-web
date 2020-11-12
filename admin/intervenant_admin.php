<?php 


    $Error= $domaine  = $date = $image = "";
    try{
        if(isset($_POST['ajouter'])) 
        {
            $domaine            = checkInput($_POST['domaine']);
            $date               = checkInput($_POST['date']);
            $image              = checkInput($_FILES["image"]["name"]);
            $cv                 = checkInput($_FILES["cv"]["name"]);
            $imagePath          = '../images-bdd/intervenantPhoto/'. basename($image);
            $cvPath             = '../cv/intervenantCV/'. basename($cv);
            $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
            $cvExtension        = pathinfo($cvPath,PATHINFO_EXTENSION);

            $isSuccess          = true;
            $isUploadSuccess    = false;
            $emailUser;         $_SESSION["mail"];

            if(empty($domaine)) 
            {
                $dnError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }
        
            if(empty($date)) 
            {
                $anxError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            } 
            if(empty($image)) 
            {
                $imgError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }
            if(empty($cv)) 
            {
                $cvError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }
            else
            {
                $isUploadSuccess = true;
                if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $cvExtension !='pdf'  ) 
                {
                    $imgError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif,pdf";
                    $cvError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif,pdf";

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
                if($_FILES["cv"]["size"] > 1500000) 
                {
                    $cvError = "Le fichier ne doit pas depasser les 1500KB";
                    $isUploadSuccess = false;
                }
                if($isUploadSuccess) 
                {
                    if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                    {
                        $imgError = "Il y a eu une erreur lors de l'upload";
                        $isUploadSuccess = false;
                    } 
                    if(!move_uploaded_file($_FILES["cv"]["tmp_name"],  $cvPath)) 
                    {
                        $cvError = "Il y a eu une erreur lors de l'upload";
                        $isUploadSuccess = false;
                    } 
                } 
            }
            
            if($isSuccess && $isUploadSuccess) 
            {
                $db = Database::connect();
                // UPDATE `intervenant` SET `domaine` = 'obcaecatijjjjj' WHERE `intervenant`.`idIntervenant` = 21;

               
                $statement = $db->prepare("UPDATE intervenant SET `domaine` =?,`dateI`=?, `photoI`=?, `cvI`=?, `type`=? WHERE username=?");
                $statement->execute(array($domaine,$date,$image,$cv,$typeUser,$emailUser));
                Database::disconnect();
                header("Location: ../index/redirection_page.php");
            }
        }
        checkInput('data');
    }catch(PDOException $error) {  
        $msg = $error->getMessage();  
   }
  			
   function insertIntervenant($nomFormation,$descriptionP,$environnementF,$NHeures,$photoF){
    if(isset($_POST['ajouteF'])) {
    $nomFormation            = checkInput($_POST['nomFormation']);
    $description             = checkInput($_POST['description']);
    $environnementF          = checkInput($_POST['environnementF']);
    $NHeures                 = checkInput($_POST["NHeures"]);

    $photoF                  = checkInput($_FILES["photoF"]["name"]);
    $photoFPath              = '../images-bdd/formationPhoto/'. basename($photoF);
    $photoFExtension         = pathinfo($photoFPath,PATHINFO_EXTENSION);
    $isSuccess          = true;
    $isUploadSuccess    = false;   
     if(isset($photoF,$NHeures,$environnementF,$nomFormation)) 
    {
        $photoFError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;

     

        if($photoFExtension != "jpg" && $photoFExtension != "png" && $photoFExtension != "jpeg" && $photoFExtension != "gif" ) 
        {
            $photoFError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";

            $isUploadSuccess = false;
        }
        if(file_exists($photoFPath)) 
        {
            $photoFError = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if($_FILES["photoF"]["size"] > 1500000) 
        {
            $photoFError = "Le fichier ne doit pas depasser les 1500KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess) 
        {
            if(!move_uploaded_file($_FILES["photoF"]["tmp_name"], $imagePath)) 
            {
                $photoFError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            } 
       
         }
       
       // $isUploadSuccess = true;
        $bdd = Database::connect(); 
        $requser = $bdd->prepare("INSERT INTO `formation` ( `nomFormation`, `description`, `environnementF`, `NHeuresF`, `photoF`) VALUES ( ?, ?, ?, ?, ?)");
        $requser->execute([$nomFormation,$description,$environnementF,$NHeures,$photoF]);
            $exist = $requser->rowCount();
            if($exist){
                echo "déjà ajouter";
            }else{ 
            //  header("Location: ../../index/index.php");
            }

        Database::disconnect();
        }
    }
}
    
