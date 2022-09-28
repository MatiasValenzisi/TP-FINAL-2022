<?php namespace Controllers;

    use JsonDAO\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner; 

    class OwnerController {  

        private $ownerDAO;
        private $owner;
        private $token;
        private $ownerList;
        
        public function __construct(){
          
            $this->ownerDAO  = new OwnerDAO();
            $this->owner     = null;
            $this->token     = null;
            $this->ownerList = array();
        }

        // Muestra el perfil del dueño en sessión.

        public function profile(){

        }
        
        // Muestra un listado de dueños activos.

        public function list(){
            
        }
    } 
?>