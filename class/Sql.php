<?php
  
class Sql extends PDO{
    private $conn;
    
    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");
    }
    
    private function SetParams($statement, $parameters = array()){
        foreach ($parameters as $key => $value) {
           $this->SetParams($statement, $key, $value);
        }   
    }
    
    public function SetParam($statement, $key, $value){
        $statement->bindParam($key, $value);
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
