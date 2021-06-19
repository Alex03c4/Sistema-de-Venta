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
    


    
}


?>