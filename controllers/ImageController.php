<?php 

class ImageController {
    

    public function __construct() {
        require_once 'models/ImageModel.php';               
    }
    
    public function imgUserInsert(){
       if ($_SESSION['aux']==='Insert') {
           echo "Hola";
       } else {
           echo 'el uso de modification de las url pueden llevar a sanciones';
       }
        

    }

    public function imgUserUpdate(){
        if ($_SESSION['aux']==='Update') {
            echo "Hola2";
        } else {
            echo 'el uso de modification de las url pueden llevar a sanciones';
        }

    }
    
}
