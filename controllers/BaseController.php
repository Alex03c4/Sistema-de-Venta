<?php
class BaseController  {
    public $id;   
   
    public function __construct() {        
        $this->id = $_SESSION['id'];        
    }



}
