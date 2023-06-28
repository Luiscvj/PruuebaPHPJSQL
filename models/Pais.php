<?php
namespace Clases;

class Pais{
        protected static $conn;
        private  $idPais;
        private  $nombrePais;
    
        public function __construct($args=[]){
         
        }

        public static function setConn($connDB){
            self::$conn = $connDB;
        }

        /* Funcion de insertar datos */

        public function getAllPais(){

            $sql= "SELECT * FROM pais";
            try{         
                $stmt = self::$conn->prepare($sql);
                $stmt->execute();
                $pais = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $pais;

            }catch(\PDOExecption $e){

                return "ERROR" . e->getMessage();          
              }
        }




     
}