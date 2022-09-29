<?php namespace Controllers;

    use JsonDAO\GuardianDAO as GuardianDAO;
    use Models\Guardian as Guardian; 

    class GuardianController {  

        private $guardianDAO;
        private $guardian;
        private $token;
        private $guardianList;
        private $userController;
        
        public function __construct(){
          
            $this->guardianDAO    = new GuardianDAO();
            $this->guardian       = null;
            $this->token          = null;
            $this->guardianList   = array();
            $this->userController = new UserController();
        }

        // Muestra el perfil del guardian en sessión.

        public function profile($type = null, $action = null){

            $serviceArray = array();

            if (!is_null($_SESSION['userPH']->getServiceList())){

                foreach ($_SESSION['userPH']->getServiceList() as $key => $value) {
               
                    $serviceArray[$value] = $value;
                }
            }

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

            if($this->userController->checkPassword($guardian->getPassword())){

                $this->guardianDAO->updateDAO($guardian);

                $_SESSION['userPH'] = $guardian;

                header("Location: ".FRONT_ROOT."/guardian/profile/success/edit/save");

            } else {

                header("Location: ".FRONT_ROOT."/guardian/profile/error/edit/save");
            }            
        }
        
        // Muestra un listado de guardianes activos.

        public function list(){
            echo "lista de guardianes activos";
        }
    } 
?>