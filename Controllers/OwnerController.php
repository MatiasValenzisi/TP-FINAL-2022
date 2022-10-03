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

        
        // Muestra un listado de dueños.

        public function list($dateType = null){
          
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";

            //Selecciona el tipo de lista que vas a mostrar

            if(strcmp($dateType, "downdate") == 0) {

                $this->ownerList = $this->ownerDAO->getAllDownDateDAO();

                require_once ROOT_VIEWS."/ownerListDowndateView.php";

            } else {

                $this->ownerList = $this->ownerDAO->getAllDischargeDateDAO();
                
                require_once ROOT_VIEWS."/ownerListDischargedateView.php";                 
            }        

            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

    } 
?>