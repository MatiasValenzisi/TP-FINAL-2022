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
            require_once ROOT_VIEWS."/ownerListDischargedateView.php";            
            require_once ROOT_VIEWS."/mainFooter.php"; 
            
        }

        // Actualiza la lista de dueños

        private function updateOwnerList() {
            $ownerListDao = $this->getOwnerDAO();
            $this->ownerList = $ownerListDao->getAllDAO();
        }

        public function getOwnerDAO() {
            return $this->ownerDAO;
        }
    } 
?>