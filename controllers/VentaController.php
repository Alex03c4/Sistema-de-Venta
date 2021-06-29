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

        ?>
            <pre>
        <?php
                die(var_dump($_POST));
        ?>
            </pre>
        <?php
        
        
        $model = new VentaModel();
        $newStock = null; 
                
            foreach ($_SESSION["C-Compra"] as $key ) {               
                    $id         = (int)$key['id'];
                    $precio     = (int)$key['precio'];
                    $cantida    = (int)$_POST[$key['id']];
                    $Stock      = (int)$key['stock'];
                    
                    $newStock = ($Stock - $cantida);                                    
                    $model->StockUpdate($newStock, $id);
            }
    
            if (isset($_POST['Cliente'])) {           
                
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
            
            $respuesta = array(
                'respuesta' => 'error'
            );
            die(json_encode($respuesta));  
            
        
    }

    public function Carrito(){        
        $p=NULL;      
        if (!isset($_SESSION['C-Compra'])) {             
            $p = array(
                'id'=> $_POST['id'],
                'can'=> 1,                
                'nombre'=> $_POST['nombre'],
                'precio'=> $_POST['precio'],
                'marca'=> $_POST['marca'],
                'stock'=> $_POST['stock'],
                'imgURL'=> $_POST['imgURL'],
                'descrip'=> $_POST['descrip'],
                'Total'=>$_POST['precio'],
                'Posicion'=> 0
            );

            $p2 = array(
                'id' => $_POST['id'],
                'precio'=> $_POST['precio'],
                'stock'=> $_POST['stock'],
                'Total'=>$_POST['precio']
            );

            $_SESSION['SubTotal'][0] = (float)$_POST['precio'];
            $_SESSION['C-Compra'][0] = $p2;
                        
        } else {
            $aux = 0;
            $NumeroProducto = count($_SESSION['C-Compra']); 
            $_SESSION['SubTotal'][$NumeroProducto] = (float)$_POST['precio'];     
            foreach ($_SESSION['SubTotal'] as $key => $value) {
                $aux += $value ;
            }
            

            $p = array(
                'id'=> $_POST['id'],
                'can'=> 1,
                'nombre'=> $_POST['nombre'],
                'precio'=> $_POST['precio'],
                'marca'=> $_POST['marca'],
                'stock'=> $_POST['stock'],
                'imgURL'=> $_POST['imgURL'],
                'descrip'=> $_POST['descrip'],
                'Total'=>$aux,
                'Posicion'=> $NumeroProducto
                
            );  
            $p2 = array(
                'id' => $_POST['id'],
                'precio'=> $_POST['precio'],
                'stock'=> $_POST['stock'],
                
            );  
            
            $_SESSION['C-Compra'][$NumeroProducto] = $p2;
        }       

        die(json_encode($p));  
         
    }

    public function addCarito(){
        
        $_SESSION['SubTotal'][$_POST['Posicion']] =  (float)$_POST['Precio']* $_POST['Cantidad'];
       
        $aux = 0;

            
        foreach ($_SESSION['SubTotal'] as $key => $value) {
           $aux += $value ;
        }

        $aux = number_format($aux, 2, ",", ".");
        die(json_encode($aux));  
            
    }

    
   

}

?>