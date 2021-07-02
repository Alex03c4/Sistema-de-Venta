<?php
class ProveedorModel extends BaseModel {
   
   
   
    public function Insert($dato){
        try {
         $sql = "INSERT INTO `proveedores`( `rig`,`nombre`, `telefono`, `direccion`, `descripcion`) ";
         $sql .= " VALUES ";             
         $stmt = $this->db->prepare($sql. "(?, ?, ?, ?, ?)");
         $stmt->bind_param('sssss', $dato['documento'], $dato['nombre'], $dato['telefono'], $dato['direccion'], $dato['descripcionPro']);
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
}

?>