<?php
// session_start();

require_once 'config.php';
if(!function_exists('nav_item')){        
    function nav_item(string $lien, string $title, string $class ): string {
       $class =null;
      
        if ( $_SERVER["SCRIPT_NAME"] === "/". $lien){
           
            $class="active list-group-item nav_item";
            
        } 
        else{
           
            $class = "list-group-item nav_item";
          
        } 
        return <<<HTML
            <li $class>
                <a   href='$lien'>  $title </a>
            </li>
        HTML;
        };
          
    function nav_menu(string $class ="active", string  $title = ""):string{
        return nav_item('index.php', "Accueil", $title .$class).
                nav_item('menu.php', "Menu", $title .$class).
            nav_item('contact.php', "Contact", $title .$class);
    }
};



//////////////////////////////////////////////////////////
// function pagefound($lien){
//     if( $_SERVER["SCRIPT_NAME"] !==  "/".$lien &&  $_SERVER["SCRIPT_NAME"] == "/services.php" ){ 
//         header("localhost: 404.php");
       
//        return "$_SERVER";


//     }
// }
    // function v_dump($variables){
    //     echo "pre";
    //         var_dump($variables);
    //     echo"pre";
    // }

    
function checkboox( $name, $value, $data,  $checkedB ):string{ 
    $checkedB ="";
        if (isset($data[$name]) && in_array($value, $data[$name])){
            $checkedB="checked";
        }
    return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value">
    HTML;
}

        function radio( $nam, $value, $data, $checkedB ): string{ 
            $checkedB =null;
            if (isset($data[$nam]) and $value === $data[$nam]){
                $checkedB= "checked";
        }
        return <<<HTML
            <input type="radio" name="{$nam}" value="$value">
        HTML;
        }


        function creneaux_html(array $creneaux ){
            if(count($creneaux) === 0){
                return 'Indisponible';
            }
            $phrases =[];
            foreach ($creneaux as $creneau){
                $phrases[]= " {$creneau[0]}h à {$creneau[1]}";
            }
                return 'Disponible de '.implode(' et de ', $phrases);
        }
        $times[]= $creneaux;


        function in_time ( int $heure, array $creneaux ){

            foreach ($creneaux as $creneau){
                $debut = $creneau[0];
                $fin = $creneau[1];
                if($heure >= $debut && $heure <= $fin )
                return true;
            }
        }


        
?>
<!-- 
<p>/*
                                    // var_dump($heure);
                                    // v_dump($creneaux);
                                    // v_dump(date('e'));
                                     */</p> -->



<?php
function nav_item(string $lien, string $title){
    $class = "nav-item ";
    $classActive  = "active";
    if ($_SERVER['SCRIPT_NAME']=== $lien){
        $class = ["$classActive $class"];
    };
    return "<li class=".$class." >
    <a class=".$class." href=".$lien."> $title 
    </a></li>";
  };
?>
