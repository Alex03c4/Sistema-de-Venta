<?php
class BaseModel {

    public  $db;    
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



/* Funciones para el control de Imanes  */
    public function img($img_id, $img_type){
        $sql = "SELECT * FROM  `images` WHERE `img_id`= $img_id && `img_type`= $img_type";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
            
        }else {
            $resultSet=null;
        }
     return $resultSet;
    }

    public function imgAll($img_type){
        $query=$this->db->query("SELECT * FROM `images` WHERE `img_type` = $img_type");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }        
        return $resultSet;
    }

    public function deleteImg($img_id, $img_type){

        
        //Eliminar Img
        $files = glob('public/img/User/'. $img_id . '/*'); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
            unlink($file); //elimino el fichero
        }
        rmdir("public/img/User/" . $img_id);

        $query=$this->db->query("DELETE FROM `images` WHERE `img_id`= $img_id && `img_type`= $img_type");       

        return $query;
    }






    
    
}
?>

