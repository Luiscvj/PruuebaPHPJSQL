<?php
namespace Clases;

class Campers{
        protected static $conn;
        private  $idCamper;
        private  $nombreCamper;
        private  $apellidoCamper;
        private  $fechaNac;
        private  $idReg;


        public function __construct($args=[]){
            $this->idCamper = $args['idCamper'];
            $this->nombreCamper = $args['nombreCamper'];
            $this->apellidoCamper = $args['apellidoCamper'];
            $this->fechaNac = $args['fechaNac'];
            $this->idReg = $args['idReg'];
        }

        public static function setConn($connDB){
            self::$conn = $connDB;
            
        }

        /* Funcion de insertar datos */

        public function postCamperData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(",:",array_keys($data));
            $cols = join(",", array_keys($data));
            $sql = "INSERT INTO campers ($cols) VALUES ($valCols)";
           echo var_dump($data);
    
            
            try{    
                $stmt= self::$conn->prepare($sql);
                echo var_dump($stmt);
                $stmt->execute($data);
                //se usa pdo para capturar errores relacionados con PDO
            }catch(\PDOException $error ){

                return  "ERROR". $error->getMessage();
            }
        }


        public function getDataById($id){
            $sql = "SELECT  * FROM campers WHERE idCamper = :idCamper";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(":idCamper", $id,\PDO::PARAM_INT);
            $stmt->execute();
            $stack = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $stack;

        }

        public function getAllCampers(){

            $sql= "SELECT * FROM campers";
            try{         
                $stmt = self::$conn->prepare($sql);
                $stmt->execute();
                $stacks = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $stacks;

            }catch(\PDOExecption $e){

                return "ERROR" . e->getMessage();            }
        }


        public function delCamper($id){

            $sql = "DELETE FROM campers WHERE idCamper = :idCamper";

            try{
                $stmt = self::$conn->prepare($sql);
                $stmt->bindParam(":idCamper",$id,\PDO::PARAM_STR);
                $stmt->execute();
                return  "borrado con exito";
            }catch(\PDOException $e){
                return "ERROR" . $e->getMessage();
            }

        }

        public function updateStackData($data,$id){
            $delimiter = ",;";
            $sql = "UPDATE campers SET  nombreCamper = :nombreCamper, apellidoCamper = :apellidoCamper , fechaNac = :fechaNac , idReg = :idReg WHERE idCamper =:idCamper";
            $cont =0;
            $valsColsString= $delimiter . join(",;",array_keys($data));
            $valCols = explode(',',$valsColsString);
            try{
                $stmt = self::$conn->prepare($sql);
                foreach($data as $key){
                    $stmt->bindValue($valsCols[$cont],$key,\PDO::PARAM_STR);
                    $cont++;
                }
                $stmt->bindParam(':idCamper',$id,\PDO::PARAM_INT);
                $stmt-execute();
            }catch(\PDOException $e){
                return "ERROR". $e->getMessage();

            }

        }
}