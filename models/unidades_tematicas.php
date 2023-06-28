<?php
namespace Models;

class Unidades_Tematicas{
    public static $conn;
    protected $id_unidad_tematica;
    protected $nombre_unidad_tematica;
    protected $id_stack_tecnologico;


    public function __construct($args =[]){

        $this->id_unidad_tematica = $args['id_unidad_tematica'];
        $this->nombre_unidad_tematica = $args['nombre_unidad_tematica'];
        $this->id_stack_tecnologico = $args['id_stack_tecnologico'];
       
    }

    public static function setConn($connDB){

        self::$conn = $connDB;
    }

    public function postUnidadData($data){

        $delimiter = ":";
        $valCols = $delimiter . join(",:",array_keys($data));
        $cols = join(",", array_keys($data));
        $sql = "INSERT INTO unidades_tematicas($cols) VALUES ($valCols)";
        try{
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($data);

        }catch(\PDOException $e){

            return "ERROR" . $e->getMessage();

        }

    }

    public function getAllUnidadData(){

        $sql ="SELECT * FROM unidades_tematicas";
         try{

            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $unidades = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $unidades;
         }catch(\PDOException $e){

            return "ERROR" . $e->getMessage();

         }
    }

    public function delUnidadData($id){

        $sql = "DELETE FROM unidades_tematicas WHERE id_unidades_tematicas = :id_unidades_tematicas";

        try{

            $stmt= self::$conn->prepare($sql);
            $stmt->execute();
            return "Borrado con exito";
            
        }catch(\PDOException $e){
            return "ERROR" . $e->getMessage();

        }

    

       }

    public function updateUnidadTematica($data, $id)
       {
           $cont = 0;
           $sqlSet = "";
       
           foreach ($data as $key) {
               if ($cont < count($data) - 1) {
                   $sqlSet .= $key . " = " . ":" . $key . ",";
               } else {
                   $sqlSet .= $key . " = " . ":" . $key;
               }
               $cont++;
           }
       
           $delimiter = ":";
           $sql = "UPDATE unidades_tematicas SET $sqlSet WHERE id_unidad_tematica = :id_unidad_tematica";
           $valColsStr = $delimiter . join(":,", array_keys($data));
           $valCols = explode(",",$valColsStr);
       
           try {
               $stmt = self::$conn->prepare($sql);
               $cont = 0;
               foreach ($data as $key) {
                   $stmt->bindValue($valCols[$cont], $key, \PDO::PARAM_STR);
                   $cont++;
               }
               $stmt->bindParam(":id_unidad_tematica", $id, \PDO::PARAM_INT);
               $stmt->execute($data);
           } catch (\PDOException $e) {
               return "ERROR" . $e->getMessage();
           }
       }
       

   

}


?>