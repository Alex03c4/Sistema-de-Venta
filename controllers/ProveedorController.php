<?php
class ProveedorController  {
    public function __construct()
    { 
       require_once 'models\ProveedorModel.php';
       /* parent::__construct();         */
    } 

    public function ViewProveedor(){
        $Proveedor = new ProveedorModel();
        $data['titulo'] = 'Proveedor';
        $data['Proveedor'] =$Proveedor->getAll("proveedores");      

        require_once 'views\admin\Proveedor.php';
    } 
    public function Insert(){
        $Proveedor = new ProveedorModel();
        $dato = array(            
            'nombre' =>  $_POST['nombreP'],
            'documento' =>  $_POST['documento'],
            'telefono' => $_POST['telefono'],
            'direccion' => $_POST['direccion'],            
            'descripcionPro' => $_POST['descripcionPro'],            
        );
        $Proveedor->Insert($dato);
    }

    public function ViewInsert() { 
        $Proveedor = new ProveedorModel(); 
        $data['titulo'] = 'Proveedor';      
        require_once "views\admin\Proveedor-insert.php";   
    }

   
}
?>