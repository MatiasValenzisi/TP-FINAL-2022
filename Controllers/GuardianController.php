<?php namespace Controllers;

    use JsonDAO\GuardianDAO as GuardianDAO;
    use Models\Guardian as Guardian; 

    class GuardianController {  

        private $guardianDAO;
        private $guardian;
        private $token;
        private $guardianList;
        
        public function __construct(){
          
            $this->guardianDAO  = new GuardianDAO();
            $this->guardian     = null;
            $this->token        = null;
            $this->guardianList = array();
        }

        // Muestra el perfil del guardian en sessión.

        public function profile(){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/profileGuardianView.php";        
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit(){
            var_dump($_GET);
        }
        
        // Muestra un listado de guardianes activos.

        public function list(){
            echo "lista de guardianes activos";
        }
    } 
?>