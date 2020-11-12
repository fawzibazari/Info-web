<?    require_once 'data/auth.php';
    $error=null;
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        if($_POST['email'] == 'louis@y' && $_POST['password'] == "509"){
            session_start();
            $_SERVER['connecte'] = $_POST['password'];
           // header("location: compteur.php");
            exit();
            !empty(session_status());
        }else{
           
            $error = 'votre mail ou mot de pas est incorète';

        }

    }
    if(connected()){
        $_SERVER['connecte'] = 0;

       // header('Location: loading.php');
        exit();

    }

       
    require_once './header.php';

    ?>


    <div class="container">
        <div class="card rounded-lg text-dark">
            <div class="card-header py-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Connetez-vous</font></font></div>
                <div class="card-body">
                <? if ($error):?>
                    <div class="alert alert-danger">
                        <?= $error?>
                    </div>
                <? endif?>
                    <form  method="POST" >
                        
                        <div class="form-group"><label class="small text-gray-600" for="leadCapEmail"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adresse électronique</font></font></label><input class="form-control rounded-pill" id="leadCapEmail" type="email" name="email"></div>
                        <div class="form-group"><label class="small text-gray-600" for="leadCapCompany"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mot de passe</font></font></label><input class="form-control rounded-pill" id="leadCapCompany" type="password" name="password"></div>
                        <button class="btn btn-primary btn-marketing btn-block rounded-pill mt-4" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Connexion</font></font></button>
                    </form>
                </div>
                
            </div>
    </div>


    <?
        require_once 'footer.php';
    ?>