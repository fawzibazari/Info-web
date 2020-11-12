<?php
session_start();
    include_once '../admin/database.php';

    // include_once '../functions/function.php';
    if(isset($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
        $username = checkInput($_SESSION['mail']);

    }
 
    
    if(isset($_POST)) 
    {
        $isSuccess          = true;

       
        if(isset($_POST['nomFormation'])) 
        {
            $name               = checkInput($_POST['nomFormation']);

        }else{
            
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(isset($_POST['description'])) 
        {
            $description        = checkInput($_POST['description']);

        }else{
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
      
         
        if(isset($_POST['environnementF'])) 
        {
            $environnementF           = checkInput($_POST['environnementF']); 

        }else{
            $environnementFError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(isset($_POST['NHeuresF'])) 
        {
            $NHeuresF              = checkInput($_POST['NHeuresF']);

        } else{
            $NHeuresFError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(isset($_FILES["image"]["name"])) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        { 
            $image              = checkInput($_FILES["image"]["name"]);
            //var_dump($image);

            $imagePath          = '../images-bdd/formationPhoto/'. basename($image);
            $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
            $isImageUpdated = true;
            $isUploadSuccess = true;
            $db = Database::connect();

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
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 150 Kilo-octet";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            }
            if(isset($isImageUpdated)){
                $username = $_SESSION["mail"];
                $statement = $db->prepare("UPDATE formation  set  photoF = ? WHERE `formation`.`username` =? AND idFormation = ?");
                $statement->execute(array($image,$username,$id));
                $isUploadSuccess = true;
                Database::disconnect();

            }
        }else{
            $imageError = "ne peut pas rester vide";
        }

        $db = Database::connect();

            if($isSuccess)
            {
                //var_dump($username);
                $username = $_SESSION["mail"];
                $statement = $db->prepare("UPDATE formation set nomFormation = ?, `description` =?, environnementF= ?, NHeuresF = ?WHERE `formation`.`username` =? AND `formation`.`idFormation` =?");
                $statement->execute(array($name,$description,$environnementF,$NHeuresF,$username,$id));
            }
         
            Database::disconnect();
           // header("Location: ./redirection_page.php");
        
     
    }
   

      
       // var_dump($id);
    
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM formation where `formation`.`idFormation`= ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
       // var_dump($item);
        $name           = $item['nomFormation'];
        $description    = $item['description'];
        $environnement  = $item['environnementF'];
        $NHeuresF       = $item['NHeuresF'];
        $monimage       = $item['photoF'];
        Database::disconnect();
    


?>


<?php include_once '../functions/header/header_profil.php'?>

        <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier une formation</strong></h1>
                    <br>
                    <form class="form" action="" role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nom:
                            <input type="text" class="form-control" id="name" name="nomFormation" placeholder="nomFormation" value="<?php echo $name;?>">
                            <span class="help-inline"><?php if(isset($nameError)) echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" ><?php echo $description;?></textarea>
                            <span class="help-inline"><?php if(isset($descriptionError)) echo $descriptionError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="environnementF">les outille utilisers :
                            <textarea type="text" class="form-control" id="environnementF" name="environnementF" placeholder="environnement de formation langage " ><?php if(isset($environnement)) echo $environnement;?></textarea>
                            <span class="help-inline"><?php if(isset($environnementFError)) echo $environnementFError;?></span>
                        </div>
                        <div class="form-group">
                        <label for="NHeuresF">Nombre d'heures:
                            <input type="number"  class="form-control" id="NHeuresF" name="NHeuresF" placeholder="Nombre d'heuresF" value="<?php echo $NHeuresF;?>">
                            <span class="help-inline"><?php if(isset($NHeuresFError))  echo $NHeuresFError;?></span>
                        </div>


                        <div class="form-group">
                            <label for="category">Catégorie:
                            <select class="form-control" id="category" name="category">
                            <?php
                                     $titre = $_SESSION['titre'];

                               $db = Database::connect();
                               var_dump($titre);
                               foreach ($db->query("SELECT * FROM titre WHERE titre.id = $titre") as $row) 
                               {
                                    if($row['id'] == $category)
                                        echo '<option selected="selected" value="'. $row['id'] .'">'. $row['nom'] . '</option>';
                                    else
                                        echo '<option value="'. $row['id'] .'">'. $row['nom'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php if(isset($categoryError))  echo $categoryError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <p><?php echo $monimage;?></p>
                            <label for="image">Sélectionner une nouvelle image:</label>
                            <input type="file" id="image" name="image" > 
                            <span class="help-inline"><?php if(isset($imageError)) echo $imageError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="./redirection_page.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img class='modif-img' src="<?php echo '../images-bdd/formationPhoto/'.$image;?>" alt="...">
                          <div class="caption">
                            <h4><?php echo $name;?></h4>
                            <p><?php echo $description;?></p>
                            <p><?php echo $environnement;?></p>
                            <div class="heures"><?php echo $NHeuresF. " Nombre d'heures";?></div>


                            <!-- <a href="#" class="btn btn-order" role="button"> Plus Info</a> -->
                          </div>
                    </div>
                </div>
            </div>
        </div>   
   