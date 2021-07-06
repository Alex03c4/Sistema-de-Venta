<?php 
class VentaModel extends BaseModel 
{
    public function __construct(){     
        parent::__construct();        
    }

    // 
    public function StockUpdate($tabla, $newStock, $id){
        $sql  = " UPDATE $tabla SET  ";
        $sql .= " `stock`= ? ";
        $sql .= " WHERE id = ? ";
        $stmt = $this->db->prepare($sql);
            $stmt->bind_param ("ii",$newStock, $id);
            $estado =   $stmt->execute();
    }
  
    public function InsertVentas($Venta){
        $sql = "INSERT INTO `ventas`(`id_cliente`, `id_user`, `productos`, `total`, `tipo_pago` , `descripcion`, `fecha`)  ";
        $sql .= " VALUES ";             
        $stmt = $this->db->prepare($sql. "(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('iisdsss', $Venta['id_Cliente'], $Venta['Id_User'], $Venta['Producto'], $Venta['Total'], $Venta['Tipo_pago'],  $Venta['desc'] ,  $Venta['fecha']  );
        $stmt->execute(); 
        $aux= $stmt->insert_id;
        return $aux;

        
    }

    public function InserCredito($Venta){

        
        try {
            $sql = "INSERT INTO `credito`(`id_cliente`, `id_venta`, `monto`)   ";
            $sql .= " VALUES ";             
            $stmt = $this->db->prepare($sql. "(?, ?, ?)");
            $stmt->bind_param('iid', $Venta['id_Cliente'],  $Venta['id_venta'], $Venta['Total'] );
            $stmt->execute(); 
        } catch (Exception $th) {
            echo $th;
        }
        
    }



    public function getStock($tabla, $id) {
        $sql = "SELECT `stock` FROM  $tabla  WHERE `id` = $id";
        $query= $this->db->query($sql);
        if($row = $query->fetch_assoc()) {
            $resultSet=$row;
        } 
        return $resultSet["stock"];  
    }

    


    
}


?>