<?php 
class EmpresaModel extends BaseModel 
{
    public function __construct(){     
        parent::__construct();        
    }
    
    public function update($dato){
        try {
                        
            $sql  = " UPDATE `empresa` SET  ";
            $sql .= " `nombre`= ?, `documento`= ?, `telefono`= ? , `telefono2`= ?  , `email`= ?, `direccion`= ?  ";
            $sql .= " WHERE id = ? ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param ("ssssssi", $dato["nombre"], $dato["documento"], $dato["telefono"], $dato["movil"], $dato["email"]  , $dato["direccion"], $dato["id"]);
            $estado =   $stmt->execute();

            if ($stmt->affected_rows || $estado) {
                $respuesta = array(
                    'respuesta' => 'exito',
                   
                );            


               /*  $img = new ProductoModel();
                    $img->InsertImg( $dato["id"] , 3 , 'Producto' , $dato);   */

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

    
}


?>