<?php
namespace Db;
use Config\CfLoginFIEB;

class DbConnection extends CfLoginFIEB{
    
    private $conn;
    private $user = 'root';
    private $pass = '12345678';
    //private $host = 'localhost'; 
    private $host = 'localhost'; //LAB1MPROF
    private $port = '3306';
    private $database = 'bdfieb';
    
    // Método responsável em estabelecer a conexão com o banco de dados
    private function connect(){
        try {
            $this->conn = new \PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database",  $this->user, $this->pass);
            if(isset($this->conn)){
                return $this->conn;
            }       
        } catch (\PDOException $exc) {
            throw new \Exception($exc->getCode());
        }   
    }
    
    
    // Método será responsável em ações com o banco (insert, update e delete)
    public function runQuery($sql){
        $this->conn = $this->connect();
        $this->conn->beginTransaction();
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        if($stm){
            $this->conn->commit();
        }else{
            $this->conn->rollBack();
        }
        $this->closeConnection();
       return $stm; 
            
    }
    
    
    // Método responsável em efetuar consultas (select)
    public function runSelect($sql){
         $this->conn = $this->connect();
         $stm = $this->conn->prepare($sql);
         $stm->execute();
         $this->closeConnection();
         return $stm->fetchAll(\PDO::FETCH_ASSOC);
 
    }
    
    // Método responsável em encerrar uma conexão com o banco de dados
    private function closeConnection(){
        $this->conn = null;
    }
    
}
