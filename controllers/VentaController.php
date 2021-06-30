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

        try {
            $model = new VentaModel();
            $newStock = null; 
            $time = time();
            $time= date("Y-m-d(H:i:s)",$time);            
                    
    
                if (isset($_POST['Cliente'])) {           
                    $Id_Cliente = $_POST['Cliente'];
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
                    $Id_Cliente = $cliente->Insert($dato); 
                } 
                
                $Venta = array(
                    'Producto'=> json_encode($_SESSION['C-Compra']),
                    'Total'=> $_SESSION["Total"],
                    'Tipo_pago'=> $_POST["radio"],
                    'Id_User' =>$_SESSION['id'],
                    'id_Cliente' => $Id_Cliente,
                    'desc' => $_POST['desc-venta'],
                    'fecha' => $time
                );
    
                $model->InsertVentas($Venta);          
               
                foreach ($_SESSION["C-Compra"] as $key ) {               
                    $id         = (int)$key['id'];                   
                    $cantida    = (int)$_POST[$key['id']];
                    $Stock      = (int)$key['stock'];                    
                    $newStock = ($Stock - $cantida);                                    
                    $model->StockUpdate($newStock, $id);
                }
                $respuesta = array(
                    'respuesta' => 'exito'
                );
    
                die(json_encode($respuesta));  
                 
        } catch (\Throwable $th) {    
            $respuesta = array(
                'respuesta' => 'error'
            ); 
            die(json_encode($respuesta)); 
        }
        
        
        
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
                'can'=> 1,  
                'nombre'=> $_POST['nombre'],
                'marca'=> $_POST['marca'],
                'precio'=> $_POST['precio'],
                'stock'=> $_POST['stock'],
                'Total'=>$_POST['precio'],
                
            );

            $_SESSION['SubTotal'][0] = (float)$_POST['precio'];
            $_SESSION['C-Compra'][0] = $p2;
            $_SESSION['Total'] = (float)$_POST['precio'];            
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
                'can'=> 1,  
                'nombre'=> $_POST['nombre'],
                'marca'=> $_POST['marca'],
                'precio'=> $_POST['precio'],
                'stock'=> $_POST['stock'],
                'Total'=>$_POST['precio'],                
                
            );  
            $_SESSION['Total'] = $aux;
            $_SESSION['C-Compra'][$NumeroProducto] = $p2;
        }       

        die(json_encode($p));  
         
    }

    public function addCarito(){
        
        $_SESSION['SubTotal'][$_POST['Posicion']] =  (float)$_POST['Precio']* $_POST['Cantidad'];
        $_SESSION['C-Compra'][$_POST['Posicion']]['can'] = (float)$_POST['Cantidad'];
        $aux = 0;

            
        foreach ($_SESSION['SubTotal'] as $key => $value) {
           $aux += $value ;
        }

        $aux = number_format($aux, 2, ",", ".");
        $_SESSION['Total'] = $aux;
        die(json_encode($aux));  
            
    }

    
   

}

?>