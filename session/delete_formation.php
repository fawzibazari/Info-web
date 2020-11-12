<?php
session_start();
    require '../admin/database.php';
 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM formation WHERE idFormation = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: ./redirection_page.php"); 
    }
    checkInput('data');
?>

<?php include_once '../functions/header/header_profil.php'?>

        <div class="container admin">
            <div class="row">
                <h1><strong>Supprimer une Formation</strong></h1>
                <br>
                <form class="form" action="#" role="form" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="./redirection_page.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
