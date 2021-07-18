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

        $fecha_actual = date("Y-m-d");
        
        $data['titulo'] = 'Dashboard';
        $_SESSION['img'] = $user->img($this->id, 1);// var 1 es el modelo User
        $_SESSION['profiles'] = $user->getById('profiles', $this->id); 
        $_SESSION['rol'] = (int)$user->getRol($this->id) ; 
        
        $data2 = array (
            'Ventas'=>   $user->getVentas(),
            'VentaDia'=> $user->getVentasDia($fecha_actual),
            'TotalProducto'=>$user->getContar('productos'),
            'estincion'=>$user->estacion(),
            'cedito'=>$user->getContar('credito'),
            'ceditoActivos'=>$user->creditoActivo(),
            'Ventas8'=>$user->Venta8A12(date("Y-m-d"))
        );
        $Total=array();
        $Total2=array();
        
        for ($i=0; $i <= 5; $i++) {
            $aux =  $user->Venta8A12(date("Y-m-d",strtotime($fecha_actual."- $i days"))) ;
            $aux = number_format($aux, 2, ".", ".");
            if ($aux==NULL) {
                $aux=0;
            }
            array_push ( $Total ,$aux );  
        }
        for ($i=0; $i <= 5; $i++) {
            $aux =  $user->Venta12A16(date("Y-m-d",strtotime($fecha_actual."- $i days"))) ;
            $aux = number_format($aux, 2, ".", ".");
            if ($aux==NULL) {
                $aux=0;
            }
            array_push ( $Total2 ,$aux );  
        }
        
        $user =null;
        require_once "views\admin\Dashboard.php";   
    }

    public function ViewDashboard2(){
        $data['titulo'] = 'Dashboard';
        require_once "views\admin\Dashboard.php"; 
    }


    public function edit(){
        $user = new PerfilModel();
        $data["titulo"] = 'Perfil';
        $data['img'] = $user->img($this->id, 1);
        $data["profiles"] = $user->getById('profiles', $this->id);
        $data["user"] = $user->getById('users', $this->id);
        $user =null;
        require_once "views\admin\Perfil.php";  
    }

    public function editAdmin($id){
        $user = new PerfilModel();
        $data["titulo"] = 'Perfil';
        $data['img'] = $user->img($id, 1);
        $data["profiles"] = $user->getById('profiles', $id);
        $data["user"] = $user->getById('users', $id);
        $data["user_role"] = $user->getById('user_role',$id ,"id_user");
        $user =null;
        require_once "views\admin\User-edid.php";  
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

    public function updateAdmin(){

        
        $dato = array(
            'id' => $_POST['id'],
            'nombre' =>  $_POST['nombre'],
            'apellido' => $_POST['apellido'] ,
            'cedula' =>  $_POST['cedula'],
            'sexo' =>  $_POST['sexo'],
            'telefono' =>  $_POST['telefono'],
            'direccion' =>  $_POST['dire'],
            'rol'=>  (int)$_POST['rol'],
            
        );

        $perfil = new PerfilModel();
        $perfil->updateRol($dato);
        $perfil->update($dato);

        		
    }

    public function updatePass(){
        $perfil = new PerfilModel();
        $passReal = $perfil->getByIdPass($_SESSION['id']);             
        if (password_verify($_POST['pass'], $passReal )){

            $opciones = array(
                'cost' => 12
            );
            $password_hashed = password_hash($_POST['passNew'], PASSWORD_BCRYPT, $opciones);           
            $dato = array(
                'id'=>$_SESSION['id'],            
                'passNew' =>  $password_hashed,
                
            );
            $perfil->updatePass($dato);
        } else{
            $respuesta = array(
                'respuesta' => 'error'
            );  
            die(json_encode($respuesta));
        }
        

    }


    public function destroy() {
        $user = new PerfilModel();
        
        /* $id   = $_POST["id"]; */
        $user->deleteById("profiles", $this->id) ;
        $user->deleteById("users", $this->id) ;
        $user->deleteImg($this->id , 1, 'User');

    }


    public function ViewUser(){
        $user = new PerfilModel();
        $data['titulo'] = 'Usuarios';
        $data['img'] = $user->imgAll(1); 
        $data['profiles'] = $user->getAll('profiles');   
        $user = null;
        require_once "views\admin\User.php";  
    }



}