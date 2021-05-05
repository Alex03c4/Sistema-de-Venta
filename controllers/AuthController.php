<?php
/* 
*   Controlador @Auth se encargara de la Tabla User
*   Permitirá la conexión de Login Registro 
*   Y modificación de dicha  tabla  
*/
class AuthController {
    private $id;   
    public function __construct() {
        require_once 'models/AuthModel.php';
        if (isset($_SESSION['id'])) {
           $this->id = $_SESSION['id']; 
        }
         
    }
    
    public function index(){
      require_once "views\welcome\Welcome.php";  
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

    /* Update Tabla User */
    public function update(){
        $dato = array(
            'id' => $this->id,
            'email' =>  $_POST['email'],           
            
        );        
        $perfil = new AuthModel();
        $perfil->update($dato);
        		
    }
}
