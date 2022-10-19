<?php namespace Controllers;

    use DAO\GuardianDAO as GuardianDAO;
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

        public function profile($type = null, $action = null, $specific = null){

            $serviceArray = array();

            if (!is_null($_SESSION['userPH']->getServiceList())){

                foreach ($_SESSION['userPH']->getServiceList() as $key => $value) {
               
                    $serviceArray[$value] = $value;
                }
            }

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/guardianProfileView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit($password, $experience, $disp = null){

            $this->guardian = $this->guardianDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

            $this->guardian->setPassword($password);
            $this->guardian->setExperience($experience);
            $this->guardian->setServiceList($disp);

            if($this->userController->checkPassword($this->guardian->getPassword())){

                $this->guardianDAO->updateDAO($this->guardian);

                $_SESSION['userPH'] = $this->guardian;

                header("Location: ".FRONT_ROOT."/guardian/profile/success/edit/save");

            } else {

                header("Location: ".FRONT_ROOT."/guardian/profile/error/edit/save");
            }            
        }
        
        // Muestra un listado de guardianes.

        public function list($dateType = null){
          
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";

            //Selecciona el tipo de lista que vas a mostrar

            if(strcmp($dateType, "downdate") == 0) { 

                $this->guardianList = $this->guardianDAO->getAllDownDateDAO();

                require_once ROOT_VIEWS."/guardianListDowndateView.php";

            } else if(strcmp($dateType, "pendient") == 0) {

                $this->guardianList = $this->guardianDAO->getAllPendientDateDAO();

                require_once ROOT_VIEWS."/guardianListPendientView.php";

            } else {

                $this->guardianList = $this->guardianDAO->getAllDischargeDateDAO();

                if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0){

                    require_once ROOT_VIEWS."/guardianListDischargedateAdminView.php";    

                } else {

                    require_once ROOT_VIEWS."/guardianListDischargedateOwnerView.php";    
                }            
            }
            
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function view($token) {
            $this->guardian = $this->guardianDAO->getUserTokenDAO($token);

            $serviceArray = array();

            if (!is_null($this->guardian->getServiceList())){

                foreach ($this->guardian->getServiceList() as $key => $value) {
               
                    $serviceArray[$value] = $value;
                }
            }

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/guardianView.php";
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }


        // Metodo de alta (guardian)

        public function confirmGuardian($token) {
            
            $this->guardianDAO->confirmGuardianDAO($token);
            
            
            header("Location: ".FRONT_ROOT."/guardian/list/pendient");
        }

        public function declineGuardian($token) {
            
            $this->guardianDAO->deleteDAO($token);            
            
            header("Location: ".FRONT_ROOT."/guardian/list/pendient");
        }

    } 
?>