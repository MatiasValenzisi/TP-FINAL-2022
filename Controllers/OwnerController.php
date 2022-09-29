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
            echo "perfil dueño";
        }
        
        // Muestra un listado de dueños.

        public function list(){
            $this->updateOwnerList();
            
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/temporal-listado-owner.php";            
            require_once ROOT_VIEWS."/mainFooter.php"; 
            
        }

        // Retorna la lista de owners

        private function updateOwnerList() {
            $ownerDao = $this->getOwnerDAO();
            $this->ownerList = $ownerDao->getAllDAO();
        }

        public function getOwnerDAO() {
            return $this->ownerDAO;
        }
    } 
?>