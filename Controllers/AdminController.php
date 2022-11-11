<?php namespace Controllers;

    use DAO\AdminDAO as AdminDAO;
    use Models\Admin as Admin; 
    use \Exception as Exception;

    class AdminController {  

        private $adminDAO;
        private $admin;
        private $token;
        private $adminList;
        private $userController;
        
        public function __construct(){
          
            $this->adminDAO       = new AdminDAO();
            $this->admin          = null;
            $this->token          = null;
            $this->adminList      = array();
            $this->userController = new UserController();
        }

        public function profile($type = null, $action = null, $specific = null){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/adminProfileView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit($password){

            try {

                $admin = $this->adminDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

                $admin->setPassword($password);

                if($this->userController->checkPassword($admin->getPassword())){

                    $this->adminDAO->updateDAO($admin);

                    $_SESSION['userPH'] = $admin;

                    header("Location: ".FRONT_ROOT."/admin/profile/success/edit/save");

                } else {

                    header("Location: ".FRONT_ROOT."/admin/profile/error/edit/save");
                } 
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");                
            }       
        }
    } 
?>