<?php

function ajouter_vue(){
    $fichier= (__DIR__).DIRECTORY_SEPARATOR."compteurs";
    $journalier=$fichier."-".date("Y-m-d").'-'.'.json';
    incrementer_compteur($fichier);
    incrementer_compteur($journalier);  
}
function incrementer_compteur (string $fichier ):void{
    $compteur = 1;
    if(file_exists($fichier)){

        $compteur = (int) file_get_contents($fichier);
        $compteur++ ;
    }
     file_put_contents($fichier, $compteur);
}

function compteur_jours(string $fichier):void{
    $compteur=1;

    if(file_exists($fichier)){ 
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
       file_put_contents ($fichier,$compteur);   
}

function nombre_vues():string{
    $fichier= (__DIR__).DIRECTORY_SEPARATOR."compteurs";
    return file_get_contents($fichier);
   
}
/////////////////////////////////////////////////////////////
function nombre_vues_mois(int $annee, int $mois ):int{
    $mois= str_pad($mois, 2, "0", STR_PAD_LEFT );
    $fichier= (__DIR__).DIRECTORY_SEPARATOR."compteurs-". $annee . '-'.$mois. '-'.'*';
    
    
   
    $fichiers=glob($fichier);
    $total=0 ;
   
    foreach($fichiers as $fichier ){
       $total +=(int) file_get_contents($fichier);
    }
    return $total;
}
function nombre_vues_detail(int $annee, int $mois ): array{
    $_mois= str_pad($mois, 2, "0", STR_PAD_LEFT );
    $date =date("d");
    $fichier= (__DIR__).DIRECTORY_SEPARATOR."compteurs-". $annee . '-'.$_mois.'-'.'*';
    $fichiers=glob($fichier);

    $Visites = [];
    foreach($fichiers as $fichier ){
        $parties = explode('-',basename($fichier).PHP_EOL);
        // var_dump( $parties);
        // exit();
        $Visites[]= [
            //'nom'=> $parties[1],

            'annee'=> $parties[1],
            'mois'=> $parties[2],
            'jour'=> $parties[3],
            'visites' => file_get_contents($fichier),

        ];

        
    }
    return $Visites;
}


?>