<?php
class PerfilModel extends BaseModel  {
   
    public function __construct(){
      
        parent::__construct();        
    }

    public function update($dato){
        try {
                        
            $sql  = " UPDATE `profiles` SET  ";
            $sql .= " `nombre`= ?, `apellido`= ?, `cedula`= ? , `sexo`= ?  , `telefono`= ?  , `direccion`= ? ";
            $sql .= " WHERE id = ? ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param ("ssssssi", $dato["nombre"], $dato["apellido"], $dato["cedula"], $dato["sexo"], $dato["telefono"], $dato["direccion"], $dato["id"]);
            $estado =   $stmt->execute();

            if ($stmt->affected_rows || $estado) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $stmt->insert_id
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error1'
                );
            }

        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'Msm' => $e->GetMessage(),
                'Lugar' => 'catch ',
                'Linea' . $e->getLine()
            );
        }
        $stmt->close();
        die(json_encode($respuesta));
        	
       /*  return $resultado; */
    }

    public function updateRol($dato){
        $sql  = " UPDATE `user_role` SET  ";
        $sql .= " `id_role`= ?";
        $sql .= " WHERE id_user = ? ";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param ("ii",$dato["rol"], $dato["id"]);
        $estado =   $stmt->execute();  
    }

    public function updatePass($dato){
        $sql  = " UPDATE `users` SET ";
        $sql .= " `pass`= ?";
        $sql .= " WHERE id = ? ";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param ("si",$dato["passNew"], $dato["id"]);
        $estado =   $stmt->execute();  
        $respuesta = array(
            'respuesta' => 'exito',
            
        );
        die(json_encode($respuesta));
    }




        
}    

