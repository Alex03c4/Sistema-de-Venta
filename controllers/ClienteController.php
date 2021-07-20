<?php 

class ClienteController  {
    
    public function __construct() {
        require_once 'models/ClienteModel.php';        
    }

    public function getById(){
      $cedula = $_POST['Cedula-cliente'];
      $venta = new ClienteModel()  ;
      $data["cliente"] = $venta->getByCedula("cliente",  $cedula);
      
      if (!$data["cliente"] == NULL) {
        
        $data["credito"] = $venta->Credito($data["cliente"]['id']);
            $respuesta = array(
              'respuesta' => 'exito',
              'data' =>  $data["cliente"],
              'credito'=>   $data["credito"]           
            );
           
      } else{
        $respuesta = array(
          'respuesta' => 'error',         
        );
      }
      die(json_encode($respuesta));     
    }
  

    public function Insert($dato){
      $cliente = new ClienteModel();
      $resultado = $cliente->Insert($dato);
      
      return ($resultado);
   }


}

?>