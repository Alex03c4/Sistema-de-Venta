<?php
class PerfilController 
{
    private $id;    
   
    public function __construct() {
        require_once 'models/PerfilModel.php';
        $this->id = $_SESSION['id'];        
    }

    public function ViewDashboard(){
        $user = new PerfilModel();              
        $data['titulo'] = 'Dashboard';
        $_SESSION['img'] = $user->img($this->id, 1);// var 1 es el modelo User
        $_SESSION['profiles'] = $user->getById('profiles', $this->id);        
        $user =null;
        require_once "views\admin\Dashboard.php";   
    }
    public function ViewDashboard2(){
        $data['titulo'] = 'Dashboard';
        require_once "views\admin\Dashboard.php"; 
    }


    public function edit(){
        $user = new PerfilModel();
        $data["titulo"] = 'Perfil | Admin';
        $data['img'] = $user->img($this->id, 1);
        $data["profiles"] = $user->getById('profiles', $this->id);
        $data["user"] = $user->getById('users', $this->id);
        $user =null;
        require_once "views\admin\Perfil.php";  
    }
/* Update Tabla Perfil */
    public function update(){
        $dato = array(
            'id' => $this->id,
            'nombre' =>  $_POST['nombre'],
            'apellido' => $_POST['apellido'] ,
            'cedula' =>  $_POST['cedula'],
            'sexo' =>  $_POST['sexo'],
            'telefono' =>  $_POST['telefono'],
            'direccion' =>  $_POST['dire'],
            
        );        
        $perfil = new PerfilModel();
        $perfil->update($dato);
        		
    }

    public function destroy()
    {
        $user = new PerfilModel();
        
        /* $id   = $_POST["id"]; */
        $user->deleteById("profiles", $this->id) ;
        $user->deleteById("users", $this->id) ;
        $user->deleteImg($this->id , 1, 'User');

    }


}