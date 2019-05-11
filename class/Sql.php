<?php
  
class Sql extends PDO{
    private $conn;
    
    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");
    }
    
    private function SetParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
           $this->SetParams($key, $value);
        }   
    }
    
    public function SetParam($statment, $key, $value){
        $statment->bindParam($key, $value);
    }
    
    public function Query($rawquery, $params = array()){
        
        $stmt = $this->conn->prepare($rawquery);
        $this->SetParams($stmt, $params);
        $stmt->execute();
        return $stmt;        
    }
    
    public function Select($rawquery, $params = array()):array{
        
        $stmt = $this->Query($rawquery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
