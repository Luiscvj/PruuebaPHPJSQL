<?php
namespace Clases;

class Departamento{
        protected static $conn;
        private  $idDep;
        private  $nombreDep;
        private  $idPais;
        
    
        public function __construct($args=[]){
         
        }

        public static function setConn($connDB){
            self::$conn = $connDB;
        }

        /* Funcion de insertar datos */

        public function getAllDepartamento(){

            $sql= "SELECT * FROM departamento";
            try{         
                $stmt = self::$conn->prepare($sql);
                $stmt->execute();
                $departamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $departamentos;

            }catch(\PDOExecption $e){

                return "ERROR" . e->getMessage();          
              }
        }




     
}