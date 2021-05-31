<?php 
class VentaController {
    
    public function __construct()
    { 
       require_once 'models\VentaModel.php';
       /* parent::__construct();         */
    } 
    
    public function ViewVentas(){
        $venta = new ventaModel();
        $data['titulo'] = 'Ventas';
        $data['img'] = $venta->imgAll(3); /* El id del modelo del producto es = 3 */
        $data['venta'] = $venta->getAll('ventas');
    
        $producto = null;
        require_once "views\admin\Ventas.php";   
    }

}

?>