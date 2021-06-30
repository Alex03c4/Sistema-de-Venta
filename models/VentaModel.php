<?php 
class VentaModel extends BaseModel 
{
    public function __construct(){     
        parent::__construct();        
    }


    public function StockUpdate($newStock, $id){
        $sql  = " UPDATE `productos` SET  ";
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

    }
    


    
}


?>