<?php
class AuthController {
    public function __construct() {
        require_once 'models/AuthModel.php';
    }
    
    public function index(){
      require_once "views\welcome\Welcome.php";  
    }
    public function hola(){
        echo "hola";
    }

    /* Auth */
    public function ViewLogin(){
        $data['titulo'] = 'Login';
        require_once "views\auth\Login.php";   
    }

    public function ViewRegistro(){
        $data['titulo'] = 'Registro';
        require_once "views\auth\Registro.php";   
    }

    
    
    public function Login(){
        $login = new AuthModel();
        $login->getUser();
    }

    public function Registro(){
        $registro =new AuthModel();
        $registro->RegistroUser();
           
    }
}
