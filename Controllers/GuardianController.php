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

        public function profile($type = null, $action = null, $specific = null){

            $serviceArray = array();

            if (!is_null($_SESSION['userPH']->getServiceList())){

                foreach ($_SESSION['userPH']->getServiceList() as $key => $value) {
               
                    $serviceArray[$value] = $value;
                }
            }

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/profileGuardianView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
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

        public function list($dateType = null){

            //Actualiza el atributo de listado de guardianes en base a si queres el listado con los guardianes de alta o baja 
            $this->guardianList =  $this->updateGuardianList($dateType); 
                 

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";

            //Actualiza el atributo de listado de guardianes en base a si queres el listado con los guardianes de alta o baja 
            if(is_null(strcmp($dateType, "dischargedate"))) { //Selecciona el tipo de lista que vas a mostrar
                require_once ROOT_VIEWS."/temporal-listado-guardian-dischargedate.php";  
            } else {
                require_once ROOT_VIEWS."/temporal-listado-guardian-downdate.php";
            }        

            require_once ROOT_VIEWS."/mainFooter.php"; 
        }
        
        // Actualiza la lista de guardianes

        private function updateGuardianList($dateType = null) {
            $temporalList = array();
            $guardianDao = $this->getGuardianDAO();
            $guardianListDao = $guardianDao->getAllDAO();
           
            if(is_null(strcmp($dateType, "dischargedate"))) {
                foreach($guardianListDao as $guardian) {
                    if($guardian->getDownDate()) {
                        array_push($temporalList, $guardian);
                    }
                }
                return $temporalList;
            } 

            foreach($guardianListDao as $guardian) {
                if(!is_null($guardian->getDownDate())) {
                    array_push($temporalList, $guardian);
                }
            }
            return $temporalList;
        }

        public function getGuardianDAO() {
            return $this->guardianDAO;
        }
    } 
?>