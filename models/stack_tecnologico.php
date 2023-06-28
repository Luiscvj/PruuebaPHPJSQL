<?php
namespace Models;

class Stack_Tecnologico{
        protected static $conn;
        private  $id_stack_tecnologico;
        private  $nombre_stack;
        private  $descripcion_stack;
        private  $id_ruta;


        public function __construct($args=[]){
            $this->id_stack_tecnologico = $args['id_stack_tecnologico'];
            $this->nombre_stack = $args['nombre_stack'];
            $this->descripcion_stack = $args['descripcion_stack'];
            $this->id_ruta = $args['id_ruta'];
        }

        public static function setConn($connDB){
            self::$conn = $connDB;
        }

        /* Funcion de insertar datos */

        public function postStackData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(",:",array_keys($data));
            $cols = join(",", array_keys($data));
            $sql = "INSERT INTO stack_tecnologico($cols) VALUES ($valCols)";
           
            
            try{    
                $stmt= self::$conn->prepare($sql);
                $stmt->execute($data);
                //se usa pdo para capturar errores relacionados con PDO
            }catch(\PDOException $error ){

                return  "ERROR". $error.getMessage();
            }
        }


        public function getDataById($id){
            $sql = "SELECT  * FROM stack_tecnologico WHERE id_stack_tecnologico = :id_stack_tecnologico";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(":id_stack_tecnologico", $id,\PDO::PARAM_INT);
            $stmt->execute();
            $stack = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $stack;

        }

        public function getAllSatck(){

            $sql= "SELECT * FROM stack_tecnologico";
            try{         
                $stmt = self::$conn->prepare($sql);
                $stmt->execute();
                $stacks = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $stacks;

            }catch(\PDOExecption $e){

                return "ERROR" . e->getMessage();            }
        }


        public function delStack($id){

            $sql = "DELETE FROM stack_tecnologico WHERE id_stack_tecnologico = :id_stack_tecnologico";

            try{
                $stmt = self::$conn->prepare($sql);
                $stmt->bindParam(":id_stack_tecnologico",$id,\PDO::PARAM_INT);
                $stmt->execute();
                return  "borrado con exito";
            }catch(\PDOException $e){
                return "ERROR" . $e->getMessage();
            }

        }

        public function updateStackData($data,$id){
            $delimiter = ",;";
            $sql = "UPDATE stack_tecnologico SET  nombre_stack = :nombre_stack, descripcion_stack = :descripcion_stack , id_ruta = :id_ruta WHERE id_stack_tecnologico =:id_stack_tecnologico";
            $cont =0;
            $valsColsString= $delimiter . join(",;",array_keys($data));
            $valCols = explode(',',$valsColsString);
            try{
                $stmt = self::$conn->prepare($sql);
                foreach($data as $key){
                    $stmt->bindValue($valsCols[$cont],$key,\PDO::PARAM_STR);
                    $cont++;
                }
                $stmt->bindParam(':id_stack_tecnologico',$id,\PDO::PARAM_INT);
                $stmt-execute();
            }catch(\PDOException $e){
                return "ERROR". $e->getMessage();

            }

        }
}