<?php namespace Controllers;

    use Controllers\UserController as UserController;
    use Models\Admin as Admin;
    use Models\Guardian as Guardian; 
    use Models\Owner as Owner;
    use \Exception as Exception;

    class SignController {  

        private $userController;
        
        public function __construct(){
          
            $this->userController = new UserController();
        }
    
        public function checkSession(){

            try {

                $user = $_SESSION['userPH'];

                $userLogin = $this->userController->getUserName($user->getUserName());

                if ($user->getPassword() != $userLogin->getPassword()){

                    unset($_SESSION['userPH']);
                     
                    header("Location: ".FRONT_ROOT."/home/index/error/check/user");                

                } else {

                    if ($_SESSION['userPH'] != $userLogin){

                        $_SESSION['userPH'] = $userLogin;
                    }
                }   

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/index/error/dao/unknown"); 
            }           
        }

        /* Metodo que verifica si el usuario inicio sesión o si los datos que utilizo pertenecen a un usuario */

        public function login($username = null, $password = null){

            try {

                if ($username != null && $password != null){

                    $userLogin = $this->userController->getUserName($username);

                    if (!is_null($userLogin) && is_null($userLogin->getDownDate()) && !is_null($userLogin->getDischargeDate())  && strcmp($userLogin->getPassword(), $password) == 0){

                        $_SESSION["userPH"] = $userLogin;

                        header("Location: ".FRONT_ROOT."/home/administration");

                    } else {

                        if (is_null($userLogin) || !is_null($userLogin->getDownDate()) || is_null($userLogin->getDischargeDate())){ 

                            header("Location: ".FRONT_ROOT."/home/index/error/login/user");

                        } else if (strcmp($userLogin->getPassword(), $password) != 0) { 

                            header("Location: ".FRONT_ROOT."/home/index/error/login/password");

                        } else { // Error desconocido.

                            header("Location: ".FRONT_ROOT."/home/index/error/login/unknown");
                        }                   
                    }

                } else {

                    if (!isset($_SESSION['userPH'])){

                        header("Location: ".FRONT_ROOT);

                    } else {

                        header("Location: ".FRONT_ROOT."/home/administration");

                    }               
                }  

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/index/error/dao/unknown"); 
            }          
        }

        /* Metodo que llama al formulario para crear un usuario */ 

        public function register($typeUser = null, $type = null, $action = null, $specific = null){

            require_once ROOT_VIEWS."/loginHeader.php";

            if(strcmp($typeUser, "guardian") == 0){

                require_once ROOT_VIEWS."/guardianRegisterView.php";

            } else {

                require_once ROOT_VIEWS."/ownerRegisterView.php";
            }

            require_once ROOT_VIEWS."/notificationAlert.php";
            require_once ROOT_VIEWS."/loginFooter.php";
        }

        public function createUserOwner($typeUser, $email, $password, $firstName, $lastName, $dni, $birthDate){

            try {

                $token          = $this->userController->createToken($this->userController->getTokenUserList());
                $firstName      = $this->userController->textNameFormat($firstName);
                $lastName       = $this->userController->textNameFormat($lastName);
                $dischargeDate  = date("Y-m-d");
                $downDate       = null;

                if($this->userController->checkPassword($password)){
        
                    if($this->userController->controllerDNI($dni, $typeUser)){

                        if($this->userController->birthDateCheck($birthDate)){
                                
                            $newOwner = new Owner($token, $email, $password, $dischargeDate, $downDate, $firstName, $lastName, $birthDate, $dni);
                                
                            $this->userController->getOwnerDAO()->addDAO($newOwner);

                            header("Location: ".FRONT_ROOT."/home/index/success/register/owner");

                        } else {

                            header("Location: ".FRONT_ROOT."/sign/register/owner/error/create/birthday");
                        }

                    } else {

                        header("Location: ".FRONT_ROOT."/sign/register/owner/error/create/dni");
                    }
                    
                } else {

                    header("Location: ".FRONT_ROOT."/sign/register/owner/error/create/password");
                } 

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/index/error/dao/unknown");
            }
        } 

        public function createUserGuardian($typeUser, $petSize, $email, $password, $firstName, $lastName, $dni, $birthDate, $experience, $servicePrice){

            try {

                $token          = $this->userController->createToken($this->userController->getTokenUserList());
                $firstName      = $this->userController->textNameFormat($firstName);
                $lastName       = $this->userController->textNameFormat($lastName);
                $dischargeDate  = date("Y-m-d");
                $downDate       = null;
     
                if($this->userController->checkPassword($password)){
                        
                    if(is_null($this->userController->getUserName($email))){
                           
                        if($this->userController->controllerDNI($dni, $typeUser)){

                            if($this->userController->birthDateCheck($birthDate)){
        
                                $newGuardian = new Guardian($token, $email, $password, null, $downDate, $firstName, $lastName, $birthDate, $dni, null, $experience, $petSize, $servicePrice);
                                    
                                $this->userController->getGuardianDAO()->addDAO($newGuardian);
            
                                header("Location: ".FRONT_ROOT."/home/index/success/register/guardian");
        
                            } else {
        
                                header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/birthday");
                            }
                                
                        } else {
        
                             header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/dni");
                        }

                    } else {

                        header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/email");
                    }
        
                } else {

                    header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/password");
                }  

            } catch (Exception $e) {
                
                header("Location: ".FRONT_ROOT."/home/index/error/dao/unknown");
            }
        }

        public function logout(){

            unset($_SESSION['userPH']); 

            header("Location: ".FRONT_ROOT."/");
        }   
    } 
?>