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
        $resultSet= null;
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
        $resultSet= null;
        $query=$this->db->query("SELECT * FROM `images` WHERE `img_type` = $img_type");
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }        
        return $resultSet;
    }


    public function InsertImg($img_id, $img_type, $file, $dato){        
          /* die(json_encode($dato)); */
       
        $directorio = "public/img/$file/";
        if (!is_dir($directorio)) {
            mkdir($directorio, 0755, true);
        }         
        
        $directorioFinal = $directorio .  $img_id . "/";
        if (!is_dir($directorioFinal)) {
            
            mkdir($directorioFinal, 0755, true); 
            if (!($dato['Img_nombre']== "")) { 
              if (move_uploaded_file($dato['Img_urlTMP'], $directorioFinal . $dato['Img_nombre'])) {
 
                $imagen_url = $dato['Img_nombre'];                   

                } else {
                   $respuesta = array(
                       'respuesta' => 'error',
                       'Img' => error_get_last()
                   );            
                   rmdir($directorioFinal);
                   die(json_encode($respuesta));
               }
           }
       }
        try {
            $sql = "INSERT INTO `images`( `url`, `img_id`, `img_type`) ";
            $sql .= " VALUES ";             
            $stmt = $this->db->prepare($sql. "(?, ?, ?)");
            $stmt->bind_param('sii', $imagen_url , $img_id , $img_type);
            $stmt->execute();               
            
            if ($stmt->affected_rows>0) {               
                $respuesta = array(
                    'respuesta' => 'exito'                    
                );               
                
                die(json_encode($respuesta));    
           
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'donde' => 'sql'
                );
            }          
        
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'donde' => 'sql',
                'e' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));   
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

