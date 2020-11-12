<?php
    include_once './function_connexion.php';
   
    connexion();
    include_once '../functions/header/header.php';
    $title='mot de passe oublié';
?>
<link rel="stylesheet" href="../main/css/index2.css" />

<div class="container">
		<div class="center">
			<div class="wrapper fadeInDown">
          		<div id="formContent">
				  <div class="center">

                    <h3>Mot de passe oublié</h3>
                    <br>
                    <form method="post">

                        <?php if (isset($er_mail)):?>
                            <div><?= $er_mail ?></div>
                        <?php  endif ?>
                            <input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>
                        

                        <button class="btn btn-primary"  type="submit" name="oublie">Envoyer</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?php    include_once '../functions/footer/footer.php';?>