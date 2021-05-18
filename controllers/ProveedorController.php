<?php
class ProveedorController  {
    public function __construct()
    { 
       require_once 'models\ProveedorModel.php';
       /* parent::__construct();         */
    }    

    public function Insert(){


        $Proveedor = new ProveedorModel();
        $dato = array(            
            'nombre' =>  $_POST['nombreP'],
            'telefono' => $_POST['telefono'],
            'direccion' => $_POST['direccion'],            
            'descripcionPro' => $_POST['descripcionPro'],            
        );
        $Proveedor->Insert($dato);
    }
}
?>