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
        $data['xUnidad'] = $venta->getAll('xunidad');
        $venta = null;
        require_once "views\admin\Ventas.php";   
    }

    public function GenerarVentas(){ 
        try {
            $aux =NULL;
            $model = new VentaModel();
            $newStock = null;
            $destaparSaco= array(); 
            $time = time();
            $time= date("Y-m-d(H:i:s)",$time);           
                foreach ($_SESSION['C-Compra'] as $key => $value) {
                    if ($value["can"] == 0) {
                      unset($_SESSION['C-Compra'][$key]);
                    }else {
                        $aux = true;
                    }
                }
                if ($aux == NULL) {
                    die();
                }
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
    
                $id_vente =  $model->InsertVentas($Venta);
                if ($_POST["radio"] == 'Credito') {
                    $Venta = array(                        
                        'Total'=> $_SESSION["Total"],                                          
                        'id_Cliente' => $Id_Cliente,
                        'id_venta'=> $id_vente  
                       
                    );

                   $model->InserCredito($Venta);
                }          
               
                foreach ($_SESSION["C-Compra"] as $key ) {               
                    $id             = (int)$key['id'];                   
                    $cantida        = (int)$key['can'];
                    $Stock          = (int)$key['stock'];                    
                    $newStock       = ($Stock - $cantida);
                    $Tipo_unidad    = $key['Tipo_unidad']; 
                    $stockxUnidad   = $key['stockxUnidad'];
                    $idxSaco        = $key['idxSaco'];
                    
                    if ( $Tipo_unidad == "Cantidad") {
                       $model->StockUpdate("productos",$newStock, $id);
                    }else {
                        if ($stockxUnidad >= $cantida) {
                            $newStock =$stockxUnidad - $cantida;                           
                            $model->StockUpdate("xunidad",$newStock, $id);
                        } else{                           
                            array_push($destaparSaco, $idxSaco );
                            $model->StockUpdate("xunidad",($stockxUnidad + $Stock) , $id);
                            $model->StockUpdate("xunidad",( ($stockxUnidad + $Stock) - $cantida) , $id);
                        }
                        
                    }                
                    
                }
               
                
                  foreach ($destaparSaco as $key ) {                     
                     $this->destaparSaco("productos", $key); 
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
        
        $stockxUnidad=NULL;
        $stockxSaco=NULL; 
        $idxSaco=NULL;

        $p=NULL;      
        if (isset($_POST['stockxUnidad'])) {
            $stockxUnidad = $_POST['stockxUnidad'];
        }

        if (isset($_POST['idxSaco'])) {
            $idxSaco = $_POST['idxSaco'];
        }

        if (isset($_POST['stockxSaco'])) {
            $stockxSaco = $_POST['stockxSaco'];
        }

        if (!isset($_SESSION['C-Compra'])) { 
            $bsf =  number_format($_SESSION['dolar']*$_POST['precio'], 2, ",", ".");            
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
                'bsf'=>$bsf,
                'Posicion'=> 0,
                'Tipo_unidad'=>$_POST['Tipo_unidad']
            );

            $p2 = array(                
                'id' => $_POST['id'],
                'can'=> 1,  
                'nombre'=> $_POST['nombre'],
                'marca'=> $_POST['marca'],
                'precio'=> $_POST['precio'],
                'stock'=> $_POST['stock'],
                'Total'=>$_POST['precio'],
                'Tipo_unidad'=>$_POST['Tipo_unidad'],
                'stockxUnidad'=> $stockxUnidad ,
                'stockxSaco'=> $stockxSaco,
                'idxSaco'=> $idxSaco 
                              
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
                'bsf'=>number_format($_SESSION['dolar']*$aux, 2, ",", "."),
                'Posicion'=> $NumeroProducto,
                'Tipo_unidad'=>$_POST['Tipo_unidad']
                
            );  
            $p2 = array(
                
                'id' => $_POST['id'],
                'can'=> 1,  
                'nombre'=> $_POST['nombre'],
                'marca'=> $_POST['marca'],
                'precio'=> $_POST['precio'],
                'stock'=> $_POST['stock'],
                'Total'=>$_POST['precio'],
                'Tipo_unidad'=>$_POST['Tipo_unidad'],
                'stockxUnidad'=> $stockxUnidad,
                'stockxSaco'=> $stockxSaco,
                'idxSaco'=> $idxSaco 

                
            );  
            $_SESSION['Total'] = $aux;
            $_SESSION['C-Compra'][$NumeroProducto] = $p2;
        }       

        die(json_encode($p));  
         
    }

    public function addCarito(){
        
        $_SESSION['SubTotal'][$_POST['Posicion']] =  (float)$_POST['Precio']* $_POST['Cantidad'];
        $_SESSION['C-Compra'][$_POST['Posicion']]['can'] = (float)$_POST['Cantidad'];
        $_SESSION['C-Compra'][$_POST['Posicion']]['Total'] = (float)$_POST['Precio']* $_POST['Cantidad'];
        $aux = 0;

            
        foreach ($_SESSION['SubTotal'] as $key => $value) {
           $aux += $value ;
        }
        $bsf= number_format($_SESSION['dolar']*$aux, 2, ",", ".");
        $aux = number_format($aux, 2, ",", ".");
        $_SESSION['Total'] = $aux;
        
        
        $aux =array(
            'dolar'=> $_SESSION['Total'],
            'bsf'=> $bsf
        );
        die(json_encode($aux));  
            
    }


    public function destaparSaco($tabla, $id){
        $ventas = new VentaModel();
        $stock = $ventas->getStock($tabla, $id);
        $ventas->StockUpdate($tabla, $stock-1, $id);
    }

    public function getVentas(){
        $venta = new VentaModel();
        $data['titulo'] = "Factura";
        $data['ventas'] = $venta->AllVentas() ;
        require_once "views\admin\component\Dashboard\Lista-Ventas.php";  
            
    }

    public function IDVentas(){      
        $venta = new VentaModel();       
        $data['ventas'] = $venta->IDVentas($_POST['id_venta']) ;
        require_once "public\plugins\pdf\crearPdf.php";  
    }

    
   

}

?>