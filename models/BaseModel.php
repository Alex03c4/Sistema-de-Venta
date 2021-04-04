<?php
class BaseModel {

    private  $db;    
    public function __construct() {        
        $this->db = Conectar::conexion();                  
    }    
    

    public function getById($tabla, $id) {
        $sql = "SELECT * FROM  $tabla  WHERE `id` = $id";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
     return $resultSet;
    }

    public function getAll($table){
        $query=$this->db->query("SELECT * FROM $table ORDER BY id DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function deleteById($tabla, $id){
        $query=$this->db->query("DELETE FROM $tabla WHERE id= $id"); 
        return $query;
    }
    
    
}
?>

