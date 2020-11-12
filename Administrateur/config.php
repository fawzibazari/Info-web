<?php
include_once "function.php";


define('JOURS',['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche']);

    define("CRENEAUX",[ 
    "0"=>[ 
        [9, 12],
        [14, 19]
    ],
    "1"=>[ 
        [9, 12],
        [14, 19]
    ],
    "2"=>[ 
        [9, 12],
        [14, 17]
    ],
    "3"=>[ 
        [9, 12],
        [14, 19]
    ],
    "4"=>[ 
        [9, 12],
        [14, 19]
    ],"5"=>[],"6"=>[]

  
    ]);
    date_default_timezone_set("Europe/Paris");
    $heure = (int) date('G');
    $creneaux = CRENEAUX[(int)date ('N')-1];  
?>