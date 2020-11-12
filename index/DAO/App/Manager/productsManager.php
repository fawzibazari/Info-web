<?php 
//include_once '../Entity/products.php';

 
    //use \App\Entity\ProductsManager;
    namespace App\Manager;
   // use PDO;

    use \App\Entity\Products;

class ProductsManager{
    private $pdo;
    private $pdoStatement;
    public function __construct(){
        //$this->pdo = new PDO('mysql: host= localhost; dbname= phpcrud','root','  ');

        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'info-web';
        try {
            return $this->pdo = new \PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
             var_dump($this->pdo);

        } catch (\PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
    /**/

    /////////////////////////////////////////////////////////////////////////
    public function read($id){

        $this->pdoStatement =  $this->pdo->prepare("SELECT * FROM `projet` WHERE `id` = :id");  

        $this->pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $executeIsok = $this->pdoStatement->execute();
       // $row = $this->pdoStatement->fetchAll();

       // var_dump($executeIsok);
      // exit();
        // if (!empty($row)) {
        //     return $row[0];
      
        // }
        if(isset($executeIsok)){
            $Products = $this->pdoStatement->fetchObject('App\Entity\Products');
           // var_dump($voiture );

            if($Products === false){
                $msg='pas de resultat';
               return $msg; 
            }else{
            return $Products;
            }
        }else{
            return false;
        }
    
    }



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////
    public function readAll($id){
        $this->pdoStatement =  $this->pdo->prepare("SELECT * FROM `products` WHERE id=:id ");  
       //$products =[];
       $this->pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
       $executeIsok = $this->pdoStatement->execute();
       $products =null;

        while($product = $this->pdoStatement->fetchObject('App\Entity\Products')){
            $products = $product;
           // var_dump($product );

        }
        if ($products == false){
            echo 'pas de donner';
        }else{
            //var_dump($products);

            return $products;

        }
    }

    /////////////////////////////////////////////////////////////

    public function create(Products $product){
       // var_dump($product);

        //INSERT INTO `products` (`id`, `username`, `descriptionP`, `environnementP`, `price`, `image`, `NHeuresP`, `titreP`, `nomP`) VALUES (NULL, '', '', '', '', '', '', '', '', '', 'current_timestamp()');');
        $this->pdoStatement = $this->pdo->prepare("INSERT INTO `products` ( `username`, `descriptionP`,  `environnementP`, `price`, `image`, `NHeuresP`, `nomP`) VALUES ( ?, ?, ?, ?, ?, ?, ? ) limit 1" );

        //$typeP = $product->getTypeP();
        $username=  $_SESSION["mail"];

        $descriptionP=  $product->getDescriptionP();
        $environnementP =  $product->getEnvironnementP();
        $price =  $product->getPrice();
        $image =  $product->getImage();
        $NHeuresP = $product->getHeuresP();
        $nomP =  $product->getNomP();       

       
   //  $nomP =  $this->pdoStatement->bindValue(':username', $product->getNomP(), \PDO::PARAM_STR);


       $executeIsok = $this->pdoStatement->execute(array($username, $descriptionP, $environnementP, $price, $image, $NHeuresP, $nomP));
      
     //  var_dump($executeIsok);


        if($executeIsok){
            $product = $this->pdoStatement->fetchObject('App\Entity\Products');
            if($product === false){
                $msg ="j'ai aucune valeur";//.var_dump($product);
               return $msg; 
            }
        }else{
            $id = $this->pdo->lastInsertId();
            $product = $this->read($id);

            return false;
        }
    }

/////////////////////////////////////////////////////////////////////////////
    
  

    private function update(Products $product){

        $this->pdoStatement = $this->pdo->prepare("UPDATE `products` SET  `descriptionP`=?,  `environnementP`=?, `price`=?, `image`=?, `NHeuresP`=?, `nomP`=? WHERE `Products`.`username` = ? ");

        // $typeP =  $this->pdoStatement->bindValue(':typeP', $product->getTypeP(), \PDO::PARAM_STR);
        // $descriptionP= $this->pdoStatement->bindValue(':descriptionP', $product->getDescriptionP(), \PDO::PARAM_STR);
        // $environnementP = $this->pdoStatement->bindValue(':environnementP', $product->getEnvironnementP(), \PDO::PARAM_STR);
        // $nomP = $this->pdoStatement->bindValue(':titreP', $product->getNomP(), \PDO::PARAM_STR);
        // $NHeuresP = $this->pdoStatement->bindValue(':NHeuresP', $product->getNHeuresP(), \PDO::PARAM_STR);
        // $id = $this->pdoStatement->bindValue(':id', $product->getId(), \PDO::PARAM_INT);

        //$this->pdoStatement->execute([$id]);

            $id = $product->getId();
              //  var_dump($id);  

             // $typeP = $product->getTypeP();
             $username=  $_SESSION["mail"];

              $descriptionP=  $product->getDescriptionP();
              $environnementP =  $product->getEnvironnementP();
              $price =  $product->getPrice();
              $image =  $product->getImage();
              $NHeuresP = $product->getHeuresP();
              $nomP =  $product->getNomP();
                $executeIsok = $this->pdoStatement->execute([$descriptionP, $environnementP, $price, $image, $NHeuresP, $nomP, $username]);
      
      ///  var_dump($executeIsok);
 
 
         if($executeIsok  === false){
                 $msg ="j'ai aucune valeur" ;
                // var_dump($product);
                return $msg; 
         }else{
             $id = $this->pdo->lastInsertId();
            // $product = $this->read($id);
 
             return $executeIsok;
         }

    }

    public function delete( $product){
        $this->pdoStatement = $this->pdo->prepare("DELETE FROM  Products WHERE id=:id LIMIT 1 ");
        
       $this->pdoStatement->bindValue(':id', $product,\PDO::PARAM_INT);
        return $this->pdoStatement->execute();
    }



    public function save(Products $product){

        if(is_null($_SESSION["mail"])){
            echo 'nouveau object';
            return $this->create($product);
        }else{ 
            echo ' existe';

            return $this->update($product);
        }
    }
   }
