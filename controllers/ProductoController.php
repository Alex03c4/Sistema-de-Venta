<?php

class ProductoController  extends BaseController {
    public $idProdruto;
    public function __construct(){ 
        require_once 'models\ProductoModel.php';
        parent::__construct();        
    }

    public function ViewProducto(){
        $producto = new ProductoModel();
        $data['titulo'] = 'Productos';
        $data['img'] = $producto->imgAll(3); /* El id del modelo del producto es = 3 */
        $data['producto'] = $producto->getAll('productos');
    
        $producto = null;
        require_once "views\admin\Productos.php";   
    }
    public function ViewInsert() { 
        $producto = new ProductoModel(); 
        $data['titulo'] = 'Productos';        
        $data['proveedor'] = $producto->getAll('proveedores');
        $date['tags'] = $producto->getAll('tags');
        require_once "views\admin\Producto-insert.php";   
    }

    public function Insert(){
        $che= NULL;
        $estatus="2";
        $Img_nombre= NULL;
        $Img_urlTMP= NULL;
        if (isset($_POST['checkbox'])) {
           $che = $_POST['checkbox'];
        }
        if (isset($_POST['estatus'])) {
            $estatus = "1";
         }
        if (isset($_FILES['Img']['name'])) {
            $Img_nombre = $_FILES['Img']['name'];
            $Img_urlTMP = $_FILES['Img']['tmp_name'];
        }
  
        $producto = new ProductoModel();
        $dato = array(            
            'nombre' =>  $_POST['nombre'],
            'precio' => $_POST['precio'],
            'marca' => $_POST['marca'],
            'stock' => $_POST['stock'],
            'descripcion' => $_POST['descripcion'],
            'id_proveedor'=> $_POST['id_proveedor'],
            /* 'estatus' => $_POST['estatus'], */
            'Img_nombre' => $Img_nombre,
            'Img_urlTMP'=> $Img_urlTMP,
            'checkbox' => $che,
            'estatus' => $estatus
        );
        
        
 
        /*  var_dump($dato); */
        $producto->Insert($dato );      

    }

    public function update(){  
       /*  die(var_dump($_POST)) ; */
        $che= NULL;
        $estatus="2";
        $Img_nombre= NULL;
        $Img_urlTMP= NULL;
        if (isset($_POST['checkbox'])) {
           $che = $_POST['checkbox'];
        } 
        if (isset($_POST['estatus'])) {
            $estatus = "1";
         } 
        if (isset($_FILES['Img']['name'])) {
            $Img_nombre = $_FILES['Img']['name'];
            $Img_urlTMP = $_FILES['Img']['tmp_name'];
        } 
        $dato = array(
            'id' => $_SESSION['productoedid'],
            'nombre' =>  $_POST['nombre'],
            'precio' => $_POST['precio'] ,
            'marca' =>  $_POST['marca'],
            'stock' =>  $_POST['stock'],
            'descripcion' =>  $_POST['descripcion'], 
            'id_proveedor' => $_POST['id_proveedor'],

            'Img_nombre' => $Img_nombre,
            'Img_urlTMP'=> $Img_urlTMP,

            'checkbox'=>$che,
            'estatus' => $estatus
            
        );        
        $producto = new ProductoModel();

        $producto->update($dato);

        

        		
    }


    public function getByID($id){
        $producto = new ProductoModel();        
        $data['titulo'] = 'Productos';
        $data['proveedor'] = $producto->getAll('proveedores');
        $data['producto'] = $producto->getByID('productos', $id);
        $date['tags'] = $producto->getAll('tags');
        $date['taggables'] = $producto->TaggablesAll($data['producto']['id'],3);
        $data['img'] = $producto->img($data['producto']['id'], 3);
        $_SESSION['productoedid'] = $data['producto']['id'];
        
        require_once 'views\admin\Producto-edid.php';
    }


    public function destroy($id)
    {
        $producto = new ProductoModel();     
        $producto->deleteById("productos", $id);
        $producto->deleteImg($this->id , 3 , 'Producto');
        

    }



}


?>