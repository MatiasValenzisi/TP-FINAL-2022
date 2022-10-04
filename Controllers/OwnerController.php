<?php namespace Controllers;

    use JsonDAO\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner; 

    class OwnerController {  

        private $ownerDAO;
        private $owner;
        private $token;
        private $ownerList;
        private $userController;
        
        public function __construct(){
          
            $this->ownerDAO  = new OwnerDAO();
            $this->owner     = null;
            $this->token     = null;
            $this->ownerList = array();
            $this->userController = new UserController();
        }

        // Muestra el perfil del dueño en sessión.

        public function profile($type = null, $action = null, $specific = null){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/ownerProfileView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit($password){

            $owner = $this->ownerDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

            $owner->setPassword($password);

            if($this->userController->checkPassword($owner->getPassword())){

                $this->ownerDAO->updateDAO($owner);

                $_SESSION['userPH'] = $owner;

                header("Location: ".FRONT_ROOT."/owner/profile/success/edit/save");

            } else {

                header("Location: ".FRONT_ROOT."/owner/profile/error/edit/save");
            }            
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