<?php namespace Controllers;

    use DAO\OwnerDAO as OwnerDAO;
    use Models\Owner as Owner;
    use \Exception as Exception; 

    class OwnerController {  

        private $ownerDAO;
        private $userController;
        
        public function __construct(){
          
            $this->ownerDAO  = new OwnerDAO();
 
            $this->userController = new UserController();
        }

        public function profile($type = null, $action = null, $specific = null){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/ownerProfileView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";      
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function profileEdit($password,$newPhoto){

            try {

                $owner = $this->ownerDAO->getUserTokenDAO($_SESSION['userPH']->getToken());

                $owner->setPassword($password);

                if (file_exists($_FILES['photo']['tmp_name'])) {

                    $fileName = ROOT_VIEWS."/photo/".$owner->getToken()."-".basename($_FILES['photo']['name']);

                    $extension = $this->getExtension($fileName);

                    if (strcmp($extension, 'jpg') == 0 || strcmp($extension, 'png') == 0) {

                        $sizeP = $_FILES['photo']['size'];

                        if ($sizeP > 1000000){ // 1 mb.
                            
                            //cambiar dsp agregando la ruta 
                            header("Location: ".FRONT_ROOT."/owner/profile/error/edit/save");
                             exit();

                        } else {                        
                            
                            if (move_uploaded_file($_FILES['photo']['tmp_name'], $fileName)){

                                $newPhoto = $owner->getToken()."-".basename($_FILES['photo']['name']);
                             
                            }  else {
                                
                                header("Location: ".FRONT_ROOT."/owner/profile/success/edit/save");
                                exit();
                            }            
                        }
                    
                    } else {

                        header("Location: ".FRONT_ROOT."/owner/profile/error/edit/save");
                         exit();
                    }
                }
              
                
                $owner->setProfilePicture($newPhoto);
                
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

        private function getExtension($str){

            $array = explode(".", $str);
            $indice = count($array)-1;
            $extension = $array[$indice];
            return $extension;
        }
    } 
?>