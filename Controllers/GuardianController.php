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

            $guardian = $this->guardianDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

            $guardian->setPassword($_GET['password_edit']);
            $guardian->setExperience($_GET['experience_edit']);
            $guardian->setServiceList($_GET['disp_edit']);

            $this->guardianDAO->updateDAO($guardian);

            echo "- FALTA VERIFICAR CONTRASEÑA. <br>";
            echo "- FALTA REENVIO EN CASO DE ERROR. <br>";
            echo "- FALTA ADAPTAR LOS DIAS DE SERVICIOS CARGADOS A LA VISTA.";
        }
        
        // Muestra un listado de guardianes activos.

        public function list(){
            echo "lista de guardianes activos";
        }
    } 
?>