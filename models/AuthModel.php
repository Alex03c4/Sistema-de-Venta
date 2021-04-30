<?php
class AuthModel {
   private $db;
   private $id;
  /*  private $auth;    */
    public function __construct(){
        $this->db = Conectar::conexion();
        /* $this->auth = array(); */
    }

    public function getUser(){
        $email=$_POST["email"];        
        $password =$_POST["pass"];
       
        try {
            $sql = "SELECT * FROM `users` WHERE `email`= ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $email, $pass); // crear variables y asinar el valor de BDD
            if ($stmt->affected_rows) {
            $exixte = $stmt->fetch();
            if ($exixte) {
                if (password_verify($password, $pass)) {                              
                    /* session_start(); */
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $pass;                                             
                    // Login correcto
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'User' =>$email
                    );
                } else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );  
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }      


        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->db = null;
        $stmt->close();
        die(json_encode($respuesta));
    }

    

    public function RegistroUser(){
        $email=$_POST["email"];        
        $password =$_POST["pass"];
        //hashed el password
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

        try {
            $sql = "INSERT INTO `users`(`email`, `pass`)";
            $sql .= " VALUES ";
            
            $stmt = $this->db->prepare($sql. "(?, ?)");
            $stmt->bind_param('ss', $email, $password_hashed);
            $stmt->execute();
            $this->id = $stmt->insert_id;        
            
            if ($stmt->affected_rows>0) {    
                /* session_start(); */
                $_SESSION['id']     = $this->id;
                $_SESSION['email']  = $email;                
            /* require_once "RegistroPerfil.php"; */
                    try {
                        $sql = "INSERT INTO `profiles`(`id`, `user_id`)";
                            $sql .= " VALUES ";
                            $stmt2 = $this->db->prepare($sql. "(?, ?)");
                            $stmt2->bind_param('ss', $this->id, $this->id);
                            $stmt2->execute();
                            if (!$stmt->affected_rows) {
                                $Tabla = "user";
                                $respuesta2 = array(
                                    'respuesta' => 'error',
                                    'donde' => 'sql'
                                );
                                /* require_once "..\..\sql\delete.php"; */   // esto esta en veremos si función                
                                die(json_encode($respuesta2));
                            }
                        
                    } catch (\Throwable $e) {
                        $respuesta2 = array(
                            'respuesta' => 'error',
                            'Msm' => $e->GetMessage(),
                            'Lugar' => 'catch ',
                            'Linea' . $e->getLine()
                        );
                        /* require_once "..\..\sql\delete.php"; */  // esto esta en veremos si función       
                        die(json_encode($respuesta2));
                    }
             $stmt2->close();
                
                $respuesta2 = array(
                    'respuesta' => 'exito',
                    'newEmail' =>  $email,
                );
            } else {
                $respuesta2 = array(
                    'respuesta' => 'error',
                    'donde' => 'sql'
                );
            }
            
            
        } catch (\Throwable $e) {
            $respuesta2 = array(
                'respuesta' => 'error',
                'Msm' => $e->GetMessage(),
                'Lugar' => 'catch ',
                'Linea' . $e->getLine()
            );
        }
        $this->db = null;
        $stmt->close();
        die(json_encode($respuesta2));
    }

    public function update($dato){
        try {                        
            $sql  = " UPDATE `users` SET  ";
            $sql .= " `email`= ? ";
            $sql .= " WHERE id = ? ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param ("si", $dato["email"], $dato["id"]);
            $estado =   $stmt->execute();            

            if ($stmt->affected_rows >= 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $stmt->insert_id
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error1'
                );
            }

        } catch (\Throwable $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'Msm' => $e->GetMessage(),
                'Lugar' => 'catch ',
                'Linea' . $e->getLine()
            );
        }
        $stmt->close();
        die(json_encode($respuesta));   
    }

}
