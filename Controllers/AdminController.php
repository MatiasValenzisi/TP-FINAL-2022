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

        public function profileEdit($password,$newPhoto){

            try {

                $admin = $this->adminDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

                $admin->setPassword($password);

                if (file_exists($_FILES['photo']['tmp_name'])) {

                    $fileName = ROOT_VIEWS."/photo/".$admin->getToken()."-".basename($_FILES['photo']['name']);

                    $extension = $this->getExtension($fileName);

                    if (strcmp($extension, 'jpg') == 0 || strcmp($extension, 'png') == 0) {

                        $sizeP = $_FILES['photo']['size'];

                        if ($sizeP > 1000000){ // 1 mb.
                            
                            //cambiar dsp agregando la ruta 
                            header("Location: ".FRONT_ROOT."/admin/profile/error/edit/save");
                             exit();

                        } else {                        
                            
                            if (move_uploaded_file($_FILES['photo']['tmp_name'], $fileName)){

                                $newPhoto = $admin->getToken()."-".basename($_FILES['photo']['name']);
                             
                            }  else {
                                
                                header("Location: ".FRONT_ROOT."/admin/profile/success/edit/save");
                                exit();
                            }            
                        }
                    
                    } else {

                        header("Location: ".FRONT_ROOT."/admin/profile/error/edit/save");
                         exit();
                    }
                }
              
                
                $admin->setProfilePicture($newPhoto);
                
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

        private function getExtension($str){

            $array = explode(".", $str);
            $indice = count($array)-1;
            $extension = $array[$indice];
            return $extension;
        }
    } 
?>