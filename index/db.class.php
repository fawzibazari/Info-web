<?php
include_once './DAO/App/Entity/products.php';

                use \App\Entity\Products;

class DB{
    private  $host = "localhost";
    private  $username= "root";
    private  $password = "";
    private  $database = "info-web";
    private  $db   = null;
    private $pdoStatement;

           public function __construct($host = null, $username=null, $password=null, $database=null){
                    if($host !== null){
                        $this->$host= $host;
                        $this->password= $password;
                        $this->username= $username;
                        $this->database= $database;
                    }   
                    try{

                    $this->db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database , $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'/*,PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING*/));

                    }catch(PDOException $e){
                        die("<h1>impossible de se connecter a la base de donnée</h1>");
                } 
           
        }
           public function query($sql, $data = array()){
               $req =$this->db->prepare($sql);
               $req->execute($data);
               return $req->fetchAll(PDO::FETCH_OBJ);
           }


           public function read($egale){

            $this->pdoStatement =  $this->db->prepare("SELECT * FROM `projet` WHERE  `id` = :id");  
    
           $this->pdoStatement->bindValue(':id', $egale, \PDO::PARAM_INT);
         //   $this->pdoStatement->bindValue(':username', $username, \PDO::PARAM_STR);

            $executeIsok = $this->pdoStatement->execute();
            if(isset($executeIsok)){


               $Products = $this->pdoStatement->fetchObject('\App\Entity\Products');
              // var_dump($Products);
                if($Products === false){
                    $message='pas de resultat';
                   return $message; 
                }else{
                return $Products;
                }
            }else{
                return false;
            }
        
        }
        public function readProjet($nomP){
            $username = $_SESSION['mail'];
            $this->pdoStatement =  $this->db->prepare("SELECT * FROM `projet` WHERE  `nomP` = :nomP AND username = :username");  
    
           $this->pdoStatement->bindValue(':nomP', $nomP, \PDO::PARAM_INT);
            $this->pdoStatement->bindValue(':username', $username, \PDO::PARAM_STR);

            $executeIsok = $this->pdoStatement->execute();


                $Products = $this->pdoStatement->rowCount($executeIsok);

              // var_dump($Products);
                if($Products > 0){

                    $Products = $this->pdoStatement->fetchObject('\App\Entity\Products');
                    $message='pas de resultat';
                   return $Products; 
                }else{
                    $Products =null;

                }


            
        }

      

    
           private function create($product){

            $this->pdoStatement = $this->db->prepare("INSERT INTO `projet` (`id`, `username` ,`descriptionP`,  `environnementP`, `price`, `image`, `NHeuresP`, `nomP`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?) limit 1");
    
            //$typeP = $product->getTypeP();
            $username=  $product->getUsername();
    
            $descriptionP=  $product->getDescriptionP();
            $environnementP =  $product->getEnvironnementP();
            $price =  $product->getPrice();
            $image =  $product->getImage();
            $HeuresP = $product->getHeuresP();
            $nomP =  $product->getNomP();
           //var_dump($NHeuresP);
    
           
       //  $nomP =  $this->pdoStatement->bindValue(':username', $product->getNomP(), \PDO::PARAM_STR);
    
    
           $executeIsok = $this->pdoStatement->execute([$username,$descriptionP, $environnementP, $price, $image, $HeuresP, $nomP]);
          if(isset($executeIsok)){
            $valide ='creation';
          }
          // var_dump($executeIsok);

    
           
        }


        private function update($product){

            $this->pdoStatement = $this->db->prepare("UPDATE `projet` SET  `descriptionP`=?,  `environnementP`=?, `price`=?, `image`=?, `NHeuresP`=?, `nomP`=? WHERE `projet`.`id` = ? limit 1 ");
    
    
                  //  var_dump($id);  
    
                 // $typeP = $product->getTypeP();
               //  $username=  $product->getUsername();
    
                  $descriptionP=  $product->getDescriptionP();
                  $environnementP =  $product->getEnvironnementP();
                  $price =  $product->getPrice();
                  $image =  $product->getImage();
                  $HeuresP = $product->getHeuresP();
                  $nomP =  $product->getNomP();
                  $egale = $product->getId();

                    $executeIsok = $this->pdoStatement->execute([$descriptionP, $environnementP, $price, $image, $HeuresP, $nomP, $egale]);
          
            //var_dump($executeIsok);

     
             if($executeIsok  === false){
                header('location ./redirection_page.php');

                     $msg ="j'ai aucune valeur" ;
                    // var_dump($product);
                    return $msg; 
             }else{
                 $id = $this->db->lastInsertId();
                // $product = $this->read($id);
                header('Location ../session/redirection_page.php');

                 return $executeIsok;
             }
    
        }

        public function delete( $product){
            $this->pdoStatement = $this->db->prepare("DELETE FROM  projet WHERE id=:id LIMIT 1 ");
           // var_dump($product->getId());
           $this->pdoStatement->bindValue(':id', $product->getId(),\PDO::PARAM_INT);
            return $this->pdoStatement->execute();
            header('location ./redirection_page.php');

        }


        public function save($product){

            if(is_null($product->getId())){
                $msg = 'nouveau Projet';
                return $this->create($product);
            }else{
                $msg = ' existe';
    
                return $this->update($product);
            }
        }

       
    
        
}