<?php 
class VentaController {
    
    public function __construct()
    {
       require_once 'models\VentaModel.php';
       require_once 'controllers\ClienteController.php';           
      
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
            ?>
                <pre>
            <?php
                    die(var_dump($_POST));
            ?>
                </pre>
            <?php
            
           
          
        } else {
            $dato = array(            
                'Cedula-cliente' =>  $_POST['Cedula-cliente'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'email'=> $_POST['email']                            
            );
           $cliente = new ClienteController();
           $cliente->Insert($dato); 

        } 

        
        

    }

/*     public function Carrito2(){
  
        if (!isset($_SESSION['C-Compra'])) {
            $p = array(
                'id'=> $_POST['Producto'],
                'can'=> 1
            );
            $_SESSION['C-Compra'][0]= json_encode($p);
        }else {
            $NumeroProducto = count($_SESSION['C-Compra']);
            $p = array(
                'id'=> $_POST['Producto'],
                'can'=> 1
            );

            $aux= json_decode($_SESSION['C-Compra']);
            foreach ($aux as $key ) {
                if ($key->id == $_POST['Producto']) {
                    # code...
                }
            }

            $_SESSION['C-Compra'][$NumeroProducto] = json_encode($p);;
        }
        
    } */




/* de prevea  */
    public function Carrito(){

        ?>
            <pre>
        <?php
                die(var_dump($_POST));
        ?>
            </pre>
        <?php
        


        if (!isset($_SESSION['C-Compra'])) {
            $p = array(
                'id'=> $_POST['id'],
                'can'=> 1
            );
            $_SESSION['C-Compra'][0]= json_encode($p);
        } else {
            $NumeroProducto = count($_SESSION['C-Compra']);
            $p = array(
                'id'=> $_POST['id'],
                'can'=> 1
            );           
            $_SESSION['C-Compra'][$NumeroProducto] = json_encode($p);
        }



        $id = $_POST['id'];
        $producto = new ventaModel();
        $pro = $producto->getById('productos', $id);
        $img = $producto->img($id, 3);


        $carrito = array(
                'producto'=> $pro,
                'img'=>  $img
        );

        

        die(json_encode($carrito));  
         
}

}

?>