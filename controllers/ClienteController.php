<?php 

class ClienteController  {
    
    public function __construct() {
        require_once 'models/VentaModel.php';        
    }

    public function getById(){
     
      $cedula = $_POST['Cedula-cliente'];
      $venta = new VentaModel()  ;
      $data["cliente"] = $venta->getByCedula("cliente",  $cedula);
      
      if (!$data["cliente"] == NULL) {
            $respuesta = array(
              'respuesta' => 'exito',
              'data' =>  $data["cliente"]              
            );
           $data['url']= "GenerarVentas";

      } else{
        $respuesta = array(
          'respuesta' => 'error',         
        );
        $data['url']= "GenerarVentas2";
      }
      
      die(json_encode($respuesta));
       
      
      
     
    }




    
    
    public function Inset(){
      $che= NULL;
      $estatus="2";

      if (isset($_POST['checkbox'])) {
         $che = $_POST['checkbox'];
      }
      if (isset($_POST['estatus'])) {
          $estatus = "1";
       }
      
      $producto = new ProductoModel();
      $dato = array(            
          'nombre' =>  $_POST['nombre'],
          'precio' => $_POST['precio'],
          'marca' => $_POST['marca'],
          'stock' => $_POST['stock'],
          'descripcion' => $_POST['descripcion'],
          'id_proveedor'=> $_POST['id_proveedor'],
          
          
          'estatus' => $estatus
      );
      
      

      /*  var_dump($dato); */
      $producto->Insert($dato ); 

    }

    public function update(){
      echo "hola";
    }

    public function destroy(){
      echo "hola pep";
    }
}

?>