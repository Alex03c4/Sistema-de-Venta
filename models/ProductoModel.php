<?php
class ProductoModel extends BaseModel {
    public function __construct(){     
        parent::__construct();        
    }


    public function Insert($dato){
        
       try {
        $sql = "INSERT INTO `productos`(`nombre`, `precio`, `marca`, `stock`, `descripcion`, `id_proveedor`) ";
        $sql .= " VALUES ";             
        $stmt = $this->db->prepare($sql. "(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sdsisi', $dato['nombre'], $dato['precio'], $dato['marca'], $dato['stock'], $dato['descripcion'] , $dato['id_proveedor']);
        $stmt->execute();       
        if ($stmt->affected_rows>0) {                   
            $respuesta = array(
                'respuesta' => 'exito',                             
            ); 
            
            
            $img = new ProductoModel();
                $img->InsertImg($stmt->insert_id , 3 , 'Producto' , $dato);            
           
       
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
    } 

    die(json_encode($respuesta));    
       
    }
}

?>