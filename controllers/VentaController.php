<?php 
class VentaController {
    
    public function __construct()
    { 
       require_once 'models\VentaModel.php';
       require_once 'controllers\ClienteController.php';
       /* parent::__construct();         */
    } 
    
    public function ViewVentas(){
        $venta = new ventaModel();
        $data['titulo'] = 'Ventas';
        $data['img'] = $venta->imgAll(3); /* El id del modelo del producto es = 3 */
        /* $data['venta'] = $venta->getAll('ventas');         */
        $data['producto'] = $venta->getAll('productos');
        $data['tags'] = $venta->TagsAll(3);
    
        $producto = null;
        require_once "views\admin\Ventas.php";   
    }

    public function GenerarVentas(){
        
        if (isset($_POST['Cliente'])) {
           
          
        } else {
            $dato = array(            
                'Cedula-cliente' =>  $_POST['Cedula-cliente'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'email'=> $_POST['email'],                
            );  

           $cliente = new ClienteController();
           $cliente->Insert($dato);


        } 

        
        

    }

    public function GenerarVentas2(){
        if (isset($_POST['nombre'])) {
           $cliente = new ClienteController();
           $cliente->update();
        }
        

    }

}

?>