<?php
  // $Error= $key = $telephone  = $date = $image = $cv= $motivation ="";
  //function stagiaire( $key ,$telephone  , $date , $image , $cv, $nomFormation , $motivation , $type , $username  ){ 
    try{
       
        $Error = $telephone  = $date = $image = $cv= $idFormation= $motivation = "";

        if(isset($_POST['ajouter'])) 
        { 
       
         
            $telephone          = checkInput($_POST['telephone']);
            $date               = checkInput($_POST['date']);
            $motivation         = checkInput($_POST['motivation']);
            $idFormation        = checkInput($_POST['idFormation']);
            $image              = checkInput($_FILES["image"]["name"]);
            $cv                 = checkInput($_FILES["cv"]["name"]);
            $imagePath          = '../images-bdd/stagiairePhoto/'. basename($image);
            $cvPath             = '../cv/cv_stagiaire/'. basename($cv);
            $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
            $cvExtension        = pathinfo($cvPath,PATHINFO_EXTENSION);
            $isSuccess          = true;
            $isUploadSuccess    = false;

            if(empty($idFormation)) 
            {

                $motivationError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            } 

            if(empty($telephone)) 
            {
                $dnError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            }  
            if(empty($date)) 
            {
                $anxError = 'Ce champ ne peut pas être vide';
                $isSuccess = false;
            } 
            if(empty($motivation)) 
            {
                $motivationError = 'Ce champ ne peut pas être vide';
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
                //var_dump($image); var_dump($cv);
                $isUploadSuccess = true;
                if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $cvExtension !='pdf' && $imageExtension !='pdf'  ) 
                {
                    $imgError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                    $cvError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif,pdf";

                    $isUploadSuccess = false;
                }
                if(file_exists($cvPath)) 
                {
                    $imgError = "Le fichier existe deja";
                    $cvError = "Le fichier existe deja";
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
                    if(!move_uploaded_file($_FILES["cv"]["tmp_name"], $cvPath)) 
                    {
                        $cvError = "Il y a eu une erreur lors de l'upload";
                        $isUploadSuccess = false;
                    } 
                } 
            }
            
            if($isSuccess && $isUploadSuccess) 
            {
              // $telephone,$type,$key , $idFormation

                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO `stagiaire` ( `keys-word`, `telephone`, `age`, `images`, `cv`, `motivation`, `idCo`, `type`, `username`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $statement->execute(array($key,$telephone,$date,$image,$cv,$motivation,$idFormation,$type,$username));
                Database::disconnect();
                $_SESSION["username"]=$emailUser;  $_SESSION["titre"]=$type; $_SESSION["idCo"] =$idFormation ;
               header("Location: ./profil_stagiaire.php");
            }
        }
        checkInput('data');
    }catch(PDOException $error) {  
        $msg = $error->getMessage();  
   }
//}