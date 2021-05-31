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
       //modificado no sabemos si pueda causar un defectos hay que herce pruebas  
        if ($query) {
           while ($row = $query->fetch_object()) {
            $resultSet[]=$row;
            }
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
        
    }

    public function UpdateImg(){

    }

    public function deleteImg($img_id, $img_type, $Model){        
        //Eliminar Img
        $files = glob('public/img/'.$Model."/". $img_id . '/*'); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
            unlink($file); //elimino el fichero
        }
        rmdir('public/img/'.$Model."/". $img_id);

        $query=$this->db->query("DELETE FROM `images` WHERE `img_id`= $img_id && `img_type`= $img_type");       

        return $query;
    }



/**
 * Funciones para el Control del Tags
 */

    public function InserTaggables($tags_id, $tags_type, $Model){

        try {
            $sql = "INSERT INTO `taggables`(`taggable_id`, `tag_type`, `tag_id`)  ";
            $sql .= " VALUES ";             
            $stmt = $this->db->prepare($sql. "(?, ?, ?)");
            $stmt->bind_param('iii', $tags_id , $tags_type , $Model);
            $stmt->execute();               
            
            if ($stmt->affected_rows>0) {               
                $respuesta = array(
                    'respuesta' => 'exito'                    
                );             

            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'donde' => 'sql'
                );
                die(json_encode($respuesta));
            }          
        
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'donde' => 'sql',
                'e' => $e->getMessage()
            );
            die(json_encode($respuesta));
        }
         
    }

    public function deleteTaggables($taggable_id, $tag_type){
        $query=$this->db->query("DELETE FROM `taggables`  WHERE  `taggable_id` =$taggable_id && `tag_type`= $tag_type ");      
        return $query;
    }

    public function TaggablesAll($taggable_id, $tag_type){
        $resultSet= null;
        $query=$this->db->query("SELECT * FROM taggables WHERE  `taggable_id` =$taggable_id && `tag_type`= $tag_type ");
       
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }






    
    
}
?>

