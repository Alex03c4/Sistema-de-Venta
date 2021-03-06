<?php
class BaseModel {

    public  $db;    
    public function __construct() {        
        $this->db = Conectar::conexion();                  
    }    
    

    public function getById($tabla, $id , $columna='id' ) {
        $sql = "SELECT * FROM  $tabla  WHERE `$columna` = $id";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet;
    }

    public function getByIdPass($id) {
        $sql = "SELECT  `pass` FROM `users`  WHERE `id` = $id";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['pass'];
    }


    //Roles y permiso
    public function getRol($id){
        $sql = "SELECT `id_role` FROM  user_role  WHERE `id_user` = $id";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['id_role'];
    }


    public function getByCedula($tabla, $cedula){
     $resultSet= NULL; 
        $sql = "SELECT * FROM  $tabla  WHERE `cedula` = $cedula";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
     return $resultSet; 
    }


    
    //créditos
    public function Credito($cedula){
        $resultSet= NULL; 
           $sql = "SELECT round(SUM(`monto`),2) AS Creditos FROM credito WHERE `id_cliente` = $cedula";
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
        $query= null;
        $files = glob('public/img/'.$Model."/". $img_id . '/*'); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
            unlink($file); //elimino el fichero
        }
        /* if (is_file('public/img/'.$Model."/". $img_id)) */
        rmdir('public/img/'.$Model."/". $img_id);
        try {
            $query=$this->db->query("DELETE FROM `images` WHERE `img_id`= $img_id && `img_type`= $img_type"); 
            return $query;
        } catch (\Throwable $th) {
            $query= null;
        }
                

        
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

    //Tags
    public function TagsAll($Modelo){
        $resultSet= null;
        $query=$this->db->query("SELECT `taggable_id`,`tag_type`, `nombre`, `color` FROM `taggables` INNER JOIN tags ON taggables.tag_id = tags.id WHERE `tag_type`= $Modelo");
       
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }


/* Contar cuanto hay  */
    public function getVentas(){
        $sql = "SELECT COUNT(*) AS con  FROM ventas ";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['con'];  
    }

    public function getVentasDia($fecha){
        $sql = "SELECT COUNT(*) AS con  FROM ventas  WHERE `fecha`>= '$fecha' ";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['con']; 
    }

    
    public function getContar($Tabla){
        $sql = "SELECT COUNT(*) AS con  FROM $Tabla ";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['con'];  
    }

    public function estacion(){
        $resultSet = 0;
        $sql = "SELECT COUNT(*) AS con  ,`stock` FROM `productos` WHERE `stock`<= 25";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet;  
    }

    public function creditoActivo(){
        $resultSet = 0;
        $sql = "SELECT COUNT(*) AS con  ,`id` FROM `credito` WHERE `monto`> 0 ";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['con'];  
    }

    public function Venta8A12($fecha){
        $resultSet = 0;
        $sql = "SELECT SUM(`total`) AS Suma FROM `ventas` WHERE `fecha`>= '$fecha 5:00:00' && `fecha`<= '$fecha 12:00:00'";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['Suma'];  
    }

    public function Venta12A16($fecha){
        $resultSet = 0;
        $sql = "SELECT SUM(`total`) AS Suma FROM `ventas` WHERE `fecha`>= '$fecha 12:00:01' && `fecha`<= '$fecha 23:00:00'";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet['Suma'];  
    }







    
    
}
?>

