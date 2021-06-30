<?php 
class ClienteModel extends BaseModel {
    public function __construct(){     
        parent::__construct();        
    }

    public function Insert($dato){
       
        try {
         $sql = "INSERT INTO `cliente`(`cedula`, `nombre`, `apellido`, `telefono`, `direccion`, `email`) ";
         $sql .= " VALUES ";             
         $stmt = $this->db->prepare($sql. "(?, ?, ?, ?, ?, ?)");
         $stmt->bind_param('ssssss', $dato['Cedula-cliente'], $dato['nombre'], $dato['apellido'], $dato['telefono'], $dato['direccion'] , $dato['email']);
         $stmt->execute();   
         
         if ($stmt->affected_rows>0) {                  
            return ($stmt->insert_id);                   
         } else {
            /* $respuesta = array(
                'respuesta' => 'error'                
            ); 
            die(json_encode($respuesta));
             echo $stmt->affected_rows;   */  
         } 
        } catch (Exception $e) {    
            $respuesta = array(
                'respuesta' => 'error',
                'Exception' => $e
            ); 
             die(json_encode($respuesta)); 
        }
        
         return NULL;      
             
        
    }


}


?>