<?php 

$IDcliente =  $_POST['IDcliente'];
    

$respuesta = array(
    'respuesta' => 'exito',
    'Nombre'=> "naudis",
    'Apellido'=> "pepep",
    'Telefono'=> '$IDcliente',
    'Total' =>"pepita"
    
);
die(json_encode($respuesta));

?>