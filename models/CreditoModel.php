<?php 
class CreditoModel  extends BaseModel {
    public function __construct(){     
        parent::__construct();        
    }

    public function getAllCredito(){
        $resultSet= null;
        $query=$this->db->query("SELECT credito.`id` AS idCredito, `id_cliente`, `id_venta`, `monto`, cliente.`id`, `cedula`, `nombre`, `apellido`, `telefono`, `direccion`, `email` FROM credito INNER JOIN cliente ON credito.`id_cliente` = cliente.id;");       
        if ($query) {
           while ($row = $query->fetch_object()) {
            $resultSet[]=$row;
            }
        }            
        return $resultSet;
    }

    public function  update($dato){
        try {                        
            $sql  = " UPDATE `credito` SET  ";
            $sql .= " `monto`= ? ";
            $sql .= " WHERE id = ? ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param ("di", $dato['monto'], $dato['id']);
            $estado =   $stmt->execute();

            if ($stmt->affected_rows || $estado) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    /* 'id_actualizado' => $stmt->insert_id */
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
        	
    }


}


?>