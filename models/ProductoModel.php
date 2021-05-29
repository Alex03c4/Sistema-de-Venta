<?php
class ProductoModel extends BaseModel {
    public function __construct(){     
        parent::__construct();        
    }


    public function Insert($dato){
       
       try {
        $sql = "INSERT INTO `productos`(`nombre`, `precio`, `marca`, `stock`, `descripcion`, `id_proveedor`, `estatus`) ";
        $sql .= " VALUES ";             
        $stmt = $this->db->prepare($sql. "(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sdsisii', $dato['nombre'], $dato['precio'], $dato['marca'], $dato['stock'], $dato['descripcion'] , $dato['id_proveedor'], $dato['estatus']);
        $stmt->execute();       
        if ($stmt->affected_rows>0) {                   
            
            $respuesta = array(
                'respuesta' => 'exito',                             
            ); 
            
               
            $aux = new ProductoModel();

            if (!$dato['Img_nombre'] ==NULL) {
                $aux->InsertImg($stmt->insert_id , 3 , 'Producto' , $dato);
            }
               
                if (!$dato['checkbox']==NULL) {
                 foreach ($dato['checkbox'] as $value) {                   
                    $aux->InserTaggables($stmt->insert_id, 3 , $value);
                }   
                }
                
                die(json_encode($respuesta));      
       
        } else {
            $respuesta = array(
                'respuesta' => 'error'
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

    die(json_encode($respuesta));    
       
    }
    
    public function update($dato){
        try {
                        
            $sql  = " UPDATE `productos` SET  ";
            $sql .= " `nombre`= ?, `precio`= ?, `marca`= ? , `stock`= ?  , `descripcion`= ?, `id_proveedor`= ?, `estatus`= ?   ";
            $sql .= " WHERE id = ? ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param ("sdsisiii", $dato["nombre"], $dato["precio"], $dato["marca"], $dato["stock"], $dato["descripcion"] , $dato["id_proveedor"], $dato["estatus"] , $dato["id"]);
            $estado =   $stmt->execute();

            if ($stmt->affected_rows || $estado) {
                $respuesta = array(
                    'respuesta' => 'exito',
                   
                );


                $aux = new ProductoModel();
                
                    $aux->deleteTaggables($dato["id"], 3);

                
                if (!$dato['checkbox'] == NULL) {
                    

                    foreach ($dato['checkbox'] as $value) {                   
                       $aux->InserTaggables($dato["id"], 3 , $value);
                    }   
                }

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