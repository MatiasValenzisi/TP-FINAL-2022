<?php namespace Controllers;

    use Controllers\UserController as UserController;

    use Models\Admin as Admin;
    use Models\Guardian as Guardian; 
    use Models\Owner as Owner;

    class SignController {  

        private $userController;
        
        public function __construct(){
          
            $this->userController = new UserController();
        }

        /* Metodo que controla la sesión del usuario en caso que hayan modificaciones en la base de datos o el json */
        
        public function checkSession(){

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
        }

        /* Metodo que verifica si el usuario inicio sesión o si los datos que utilizo pertenecen a un usuario */

        public function login($username = null, $password = null){  

            if ($username != null && $password != null){

                $userLogin = $this->userController->getUserName($username);

                if (!is_null($userLogin) && is_null($userLogin->getDownDate()) && strcmp($userLogin->getPassword(), $password) == 0){

                    $_SESSION["userPH"] = $userLogin;

                    header("Location: ".FRONT_ROOT."/home/administration");

                } else {

                    if (is_null($userLogin)){ // El usuario no existe.

                        header("Location: ".FRONT_ROOT."/home/index/error/login/user");

                    } else {

                        if(!is_null($userLogin->getDownDate())){ // El usuario esta dado de baja.

                            header("Location: ".FRONT_ROOT."/home/index/error/login/user");

                        } else {

                            if (strcmp($userLogin->getPassword(), $password) != 0){ // La contraseña no coincide con la ingresada.

                                header("Location: ".FRONT_ROOT."/home/index/error/login/password");

                            } else { // Error desconocido.

                                header("Location: ".FRONT_ROOT."/home/index/error/login/unknown");
                            }
                        }   
                    }                    
                }

            } else {

                if (!isset($_SESSION['userPH'])){

                    header("Location: ".FRONT_ROOT);

                } else {

                    header("Location: ".FRONT_ROOT."/home/administration");

                }               
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

        /* Metodo que realiza la accion de guardar un nuevo usuario si es posible en la bdd o json */

        public function createUser($typeUser = null){

            date_default_timezone_set('America/Argentina/Buenos_Aires');

            $parameters     = $_GET;
            $token          = $this->userController->createToken($this->userController->getTokenUserList());
            $firstName      = $this->userController->textNameFormat($parameters['firstName_new']);
            $lastName       = $this->userController->textNameFormat($parameters['lastName_new']);
            $dischargeDate  = date("Y-m-d");
            $downDate       = null;
 
            if(strcmp($typeUser, "guardian") == 0) { 

                if($this->userController->checkPassword($parameters['password_new'])){
                    
                    if($this->userController->controllerDNI($parameters['dni'])){

                        if($this->userController->birthDateCheck($parameters['birthDate_new'])){

                            $newGuardian = new Guardian(
                                $token, $parameters['email_new'], $parameters['password_new'], $dischargeDate, $downDate, $firstName,
                                $lastName, $parameters['birthDate_new'], $parameters['dni_new'], $parameters['experience_new']
                            );
                            
                            $this->userController->getGuardianDAO()->addDAO($newGuardian);
    
                            header("Location: ".FRONT_ROOT."/home/index/success/register/guardian");

                        } else {

                            header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/birthday");
                        }
                        
                    } else {

                        header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/dni");
                    }
    
                } else {

                    header("Location: ".FRONT_ROOT."/sign/register/guardian/error/create/password");
                }
    
            } else {
    
                if($this->userController->checkPassword($parameters['password_new'])){
    
                    if($this->userController->controllerDNI($parameters['dni'])){

                        if($this->userController->birthDateCheck($parameters['birthDate_new'])){
                            
                            $newOwner = new Owner(
                                $token, $parameters['email_new'], $parameters['password_new'], $dischargeDate, $downDate, $firstName,
                                $lastName, $parameters['birthDate_new'], $parameters['dni_new']
                            );
                            
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
            }
        }

        /* Metodo que cierra una sesión y te redirecciona al inicio de sesión */

        public function logout(){

            unset($_SESSION['userPH']); 

            header("Location: ".FRONT_ROOT."/");
        }   
    } 

?>