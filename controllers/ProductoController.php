<?php

class ProductoController  extends BaseController {
    
    public function __construct(){ 
        require_once 'models\ProductoModel.php';
        parent::__construct();        
    }

    public function ViewProducto(){
        $producto = new ProductoModel();
        $data['titulo'] = 'Productos';
        $data['img'] = $producto->imgAll(1); /* El id del modelo del producto es = 3 */
        $data['producto'] = $producto->getAll('productos');
        /* $_SESSION['producto'] = $producto->getAll('productos'); */
        $producto = null;
        require_once "views\admin\Productos.php";   
    }
    public function ViewInsert() {  
        $data['titulo'] = 'Productos'; 
        $data['icomo']   ='insert';
        require_once "views\admin\Producto-insert.php";   
    }

    public function Insert(){
        var_dump($_POST);   
    }



}


?>