<?php

class ImageModel extends BaseModel  {
   
        public function __construct(){          
            parent::__construct();        
        }
    

    public function Insert($img_id, $img_type){        
        
        $directorio = "public/img/User/"; 
        if (!is_dir($directorio)) {
            mkdir($directorio, 0755, true);
        } 
        
        
        $directorioUsuario = $directorio . $_SESSION['id'] . "/";
        if (!is_dir($directorioUsuario)) {
            mkdir($directorioUsuario, 0755, true);
            if (!($_FILES['ImgUser']['name']== "")) { 
              if (move_uploaded_file($_FILES['ImgUser']['tmp_name'], $directorioUsuario . $_FILES['ImgUser']['name'])) {
 
                $imagen_url = $_FILES['ImgUser']['name'];                   

                } else {
                   $respuesta = array(
                       'respuesta' => 'error',
                       'Img' => error_get_last()
                   );            
                   rmdir($directorioUsuario);
                   die(json_encode($respuesta));
               }
           }
       }


        try {
            $sql = "INSERT INTO `images`( `url`, `img_id`, `img_type`) ";
            $sql .= " VALUES ";             
            $stmt = $this->db->prepare($sql. "(?, ?, ?)");
            $stmt->bind_param('sii', $imagen_url , $img_id , $img_type);
            $stmt->execute();               
            
            if ($stmt->affected_rows>0) {               
                $respuesta = array(
                    'respuesta' => 'exito'                    
                );               
                
                die(json_encode($respuesta));    
           
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'donde' => 'sql'
                );
            }
            
        

        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'donde' => 'sql',
                'e' => $e->getMessage()
            );
        }

        die(json_encode($respuesta));   
    }


    public function Insert2($img_id, $img_type, $file){        
        
        $directorio = "public/img/$file/"; 
        if (!is_dir($directorio)) {
            mkdir($directorio, 0755, true);
        } 
        
        
        $directorioUsuario = $directorio . $img_id . "/";
        if (!is_dir($directorioUsuario)) {
            mkdir($directorioUsuario, 0755, true);
            if (!($_FILES['ImgUser']['name']== "")) { 
              if (move_uploaded_file($_FILES['ImgUser']['tmp_name'], $directorioUsuario . $_FILES['ImgUser']['name'])) {
 
                $imagen_url = $_FILES['ImgUser']['name'];                   

                } else {
                   $respuesta = array(
                       'respuesta' => 'error',
                       'Img' => error_get_last()
                   );            
                   rmdir($directorioUsuario);
                   die(json_encode($respuesta));
               }
           }
       }


        try {
            $sql = "INSERT INTO `images`( `url`, `img_id`, `img_type`) ";
            $sql .= " VALUES ";             
            $stmt = $this->db->prepare($sql. "(?, ?, ?)");
            $stmt->bind_param('sii', $imagen_url , $img_id , $img_type);
            $stmt->execute();               
            
            if ($stmt->affected_rows>0) {               
                $respuesta = array(
                    'respuesta' => 'exito'                    
                );               
                
               /*  die(json_encode($respuesta));     */
           
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'donde' => 'sql'
                );
            }
            
        

        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => 'error',
                'donde' => 'sql',
                'e' => $e->getMessage()
            );
        }

        /* die(json_encode($respuesta));    */
    }
    
}
