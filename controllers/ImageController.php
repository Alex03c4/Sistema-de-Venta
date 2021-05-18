<?php 

class ImageController {
    

    public function __construct() {
        require_once 'models/ImageModel.php';               
    }
    
    public function imgUserInsert(){
       if ($_SESSION['aux']==='Insert') {
          $img = new ImageModel();
          $img->Insert($_SESSION['id'], 1);
        
       } else {
           echo 'el uso de modification de las url pueden llevar a sanciones';
       }        

    }


    public function Insert($img_id, $img_type, $file){
        $img = new ImageModel();
        $img->Insert2($img_id, $img_type , $file);      
    }

    public function imgUserUpdate(){
        if ($_SESSION['aux']==='Update') {
            echo "Hola2";
        } else {
            echo 'el uso de modification de las url pueden llevar a sanciones';
        }

    }


    public function AllProducto(){
        
    }
    
}
