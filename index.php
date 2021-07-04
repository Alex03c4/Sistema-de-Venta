<?php    
    require_once 'config/config.php';
    require_once "core/routes.php";
    require_once 'config/database.php';
    require_once 'config/sesiones.php';
	require_once 'models/BaseModel.php';
    foreach(glob("controllers/*.php") as $file){
		if (!$file == "controllers\VentaController.php" ) {
			require_once $file;
		}
            
    }
    
	if(isset($_GET['controllers'])){	
		$controlador = cargarControlador($_GET['controllers']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
		
	} else {
		
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
                
                
}       
?>

