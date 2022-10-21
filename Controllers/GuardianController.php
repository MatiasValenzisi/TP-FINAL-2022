<?php namespace Controllers;

    use DAO\GuardianDAO as GuardianDAO;
    use DAO\ReviewDAO as ReviewDAO;
    use Models\Guardian as Guardian;
    use Models\Review as Review; 

    class GuardianController {  

        private $token;

        private $guardian;
        private $guardianDAO;
        private $guardianList;

        private $userController;

        private $reviewDAO;
        private $reviewList;
        
        public function __construct(){
            
            $this->token          = null;
            $this->guardian       = null;
            $this->guardianDAO    = new GuardianDAO();
            $this->guardianList   = array();
            $this->userController = new UserController();
            $this->reviewDAO      = new ReviewDAO();            
            $this->reviewList     = array();
        }

        // Muestra el perfil del guardian en sessión.

        public function profile($type = null, $action = null, $specific = null){

            $serviceArray = array();

            $serviceDate = date("m-d-Y").' - '.date("m-d-Y");

            if (!is_null($_SESSION['userPH']->getServiceStartDate()) && !is_null($_SESSION['userPH']->getServiceEndDate())){

                $serviceStartDate = date("Y-m-d", strtotime($_SESSION['userPH']->getServiceStartDate()));
                $serviceStartDate = date("m-d-Y", strtotime($serviceStartDate));

                $serviceEndDate = date("Y-m-d", strtotime($_SESSION['userPH']->getServiceEndDate()));
                $serviceEndDate = date("m-d-Y", strtotime($serviceEndDate));

                $serviceDate = $serviceStartDate.' - '.$serviceEndDate; 
            }

            if (!is_null($_SESSION['userPH']->getServiceDayList())){

                foreach ($_SESSION['userPH']->getServiceDayList() as $key => $value) {
               
                    $serviceArray[$value] = $value;
                }
            }

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/guardianProfileView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit($password, $experience, $servicePrice = null, $serviceDate = null, $disp = null){

            $serviceDate = explode(" - ", $serviceDate);

            $serviceStartDate = date("m/d/Y", strtotime($serviceDate["0"]));
            $serviceStartDate = date("Y-m-d", strtotime($serviceStartDate));

            $serviceEndDate = date("m/d/Y", strtotime($serviceDate["1"]));
            $serviceEndDate = date("Y-m-d", strtotime($serviceEndDate));

            $this->guardian = $this->guardianDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

            $this->guardian->setPassword($password);
            $this->guardian->setExperience($experience);
            $this->guardian->setServicePrice($servicePrice);
            $this->guardian->setServiceStartDate($serviceStartDate);
            $this->guardian->setServiceEndDate($serviceEndDate);
            $this->guardian->setServiceDayList($disp);

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

                if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0){

                    $this->guardianList = $this->guardianDAO->getAllDischargeDateDAO();

                    require_once ROOT_VIEWS."/guardianListDischargedateAdminView.php";    

                } else if (strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                    $this->guardianList = $this->guardianDAO->getAllDischargeDateCompleteDAO();

                    if (strcmp($dateType, "filter") == 0){



                    

                    }                    

                    require_once ROOT_VIEWS."/guardianListDischargedateOwnerView.php";    
                }            
            }
            
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function view($token) {
            
            $this->guardian = $this->guardianDAO->getUserTokenDAO($token);

            $serviceArray = array();

            if (!is_null($this->guardian->getServiceDayList())){

                foreach ($this->guardian->getServiceDayList() as $key => $value) {
               
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