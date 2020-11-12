<?php 

 namespace App\Entity;
 
class Products{

    private $id; 

    private $username;

    private $descriptionP;

    private $environnementP;

    private $price;

    private $image;

    private $nomP;

    private $NHeuresP;

    public function getId(){
        return $this->id;
    }
 

    public function getUsername(){
        return $this->username;

    }
    public function setUsername($username){
        $this->username = $username;
        return $this;
    } 

    public function getDescriptionP(){
        return $this->descriptionP;

    }
    public function setDescriptionP($descriptionP){
        $this->descriptionP = $descriptionP;
        return $this;
    } 

    public function getPrice(){
        return $this->price;

    }
    public function setPrice($price){
        $this->price = $price;
        return $this;
    } 
    public function getImage(){
        return $this->image;

    }
    public function setImage($image){
        $this->image = $image;
        return $this;
    } 

    public function getEnvironnementP(){
        return $this->environnementP;

    }
    public function setEnvironnementP($environnementP){
        $this->environnementP = $environnementP;
        return $this;
    }

    public function getNomP(){
        return $this->nomP;

    }
    public function setNomP($nomP){
        $this->nomP = $nomP;
        return $this;
    } 

    
    public function getHeuresP(){
        return $this->NHeuresP;

    }
    public function setHeuresP($NHeuresP){
        $this->NHeuresP = $NHeuresP;
        return $this;
    } 
    
}

