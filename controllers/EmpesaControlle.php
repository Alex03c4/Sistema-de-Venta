<?php 
class EmpresaController  {
    
    public function __construct()
    { 
       require_once 'models\EmpresaModel.php';
       /* parent::__construct();         */
    } 
    
    public function ViewEmpresa(){
        $empresa  = new EmpresaModel();
        $data['titulo'] = 'Empresa';
        $data['img'] = $empresa->imgAll(4); /* El id del modelo de la Empresa es = 4 */
        $data['empresa'] = $empresa->getById('empresa',1);
    
        $empresa = null;
        require_once "views\admin\Empresa.php";   
    }

    public function update(){  
  /*       die(var_dump($_POST)); */
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
             'id' => 1,
             'nombre' =>  $_POST['nombre'],
             'documento' => $_POST['documento'] ,
             'telefono' =>  $_POST['telefono'],
             'movil' =>  $_POST['movil'],
             'email' =>  $_POST['email'], 
             'direccion'=> $_POST['direccion'],
 
             'Img_nombre' => $Img_nombre,
             'Img_urlTMP'=> $Img_urlTMP,
             
         );        
         $empresa  = new EmpresaModel();
 
         $empresa->update($dato);
 
         
 
                 
     }


}

?>