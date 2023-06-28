<?php
namespace Clases;

class Region{
        protected static $conn;
        private  $idReg;
        private  $nombreRegion;
        private  $idDep;
        
    
        public function __construct($args=[]){
         
        }

        public static function setConn($connDB){
            self::$conn = $connDB;
        }

        /* Funcion de insertar datos */

        public function getAllRegion(){

            $sql= "SELECT * FROM region";
            try{         
                $stmt = self::$conn->prepare($sql);
                $stmt->execute();
                $region = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $region;

            }catch(\PDOExecption $e){

                return "ERROR" . e->getMessage();          
              }
        }




     
}