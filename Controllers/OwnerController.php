<?php namespace Controllers;

    use DAO\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner;
    use \Exception as Exception; 

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

        public function profile($type = null, $action = null, $specific = null){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/ownerProfileView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit($password){

            try {

                $owner = $this->ownerDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

                $owner->setPassword($password);

                if($this->userController->checkPassword($owner->getPassword())){

                    $this->ownerDAO->updateDAO($owner);

                    $_SESSION['userPH'] = $owner;

                    header("Location: ".FRONT_ROOT."/owner/profile/success/edit/save");

                } else {

                    header("Location: ".FRONT_ROOT."/owner/profile/error/edit/save");
                }    

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }         
        }

        // Muestra un listado de dueños que varia entre dados de baja o no.

        public function list($dateType = null){

            try {

                if(strcmp($dateType, "downdate") == 0) {

                    $this->ownerList = $this->ownerDAO->getAllDownDateDAO();
                    
                    require_once ROOT_VIEWS."/mainHeader.php";
                    require_once ROOT_VIEWS."/mainNav.php";
                    require_once ROOT_VIEWS."/ownerListDowndateView.php";

                } else {

                    $this->ownerList = $this->ownerDAO->getAllDischargeDateDAO();
                    
                    require_once ROOT_VIEWS."/mainHeader.php";
                    require_once ROOT_VIEWS."/mainNav.php";
                    require_once ROOT_VIEWS."/ownerListDischargedateView.php";                 
                }        

                require_once ROOT_VIEWS."/mainFooter.php";

            } catch (Exception $e) {
                
                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }    
        }
    } 
?>