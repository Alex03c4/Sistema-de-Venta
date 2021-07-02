<?php 
class CreditoController {
    public function __construct() {
        require_once 'models/CreditoModel.php';

    }

    public function ViewCredito(){
        $credito = new CreditoModel();
        $data['titulo'] = 'Créditos';
        $data['Credito'] = $credito->getAllCredito();          
        $credito = null;
        require_once "views\admin\Credito.php";   
    }

    public function getByID($id){
        $credito = new CreditoModel();
        $data['titulo'] = 'Créditos';
        $data['Credito'] = $credito->getById("credito",$id);        
        $data['Venta'] = $credito->getById("ventas",$data['Credito']['id_venta']); 
        $data['Cliente'] = $credito->getById("cliente",$data['Credito']['id_cliente']);
        $data['img'] = $credito->imgAll(3);
        $data['producto']= json_decode($data['Venta']['productos']) ;
        /* ?>
            <pre>
        <?php
                die(var_dump( $data['Credito']));
        ?>
            </pre>
        <?php */
         

        $credito = null;
        require_once "views\admin\Credito-edid.php";   
    }


    public function  update() {

        
        $dato = array(
            'monto' => $_POST['monto'],
            'id' =>(int)$_POST['id']

        );
        
        $credito = new CreditoModel();        

        $credito->update($dato);
    }
}


?>