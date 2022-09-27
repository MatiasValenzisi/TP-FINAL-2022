<?php namespace Controllers;

    use Controllers\UserController as UserController;

    use Models\Admin as Admin;
    use Models\Guardian as Guardian; 
    use Models\Owner as Owner;

    class SignController {   

        /* Metodo que controla la sesión del usuario en caso que hayan modificaciones en la base de datos o el json */
        
        public function checkSession(){

            $user = $_SESSION['userPH'];

            $userController = new UserController();
            $userLogin = $userController->getUserName($user->getUserName());

            if ($user->getPassword() != $userLogin->getPassword()){

                unset($_SESSION['userPH']);
                 
                header("Location: ".FRONT_ROOT."/");                

            } else {

                if ($_SESSION['userPH'] != $userLogin){

                    $_SESSION['userPH'] = $userLogin;
                }
            }
            
        }

        /* Metodo que verifica si el usuario inicio sesión o si los datos que utilizo pertenecen a un usuario */

        public function login($username = null, $password = null){  

            if ($username != null && $password != null){

                $userController = new UserController();

                $userLogin = $userController->getUserName($username);

                if (!is_null($userLogin) && is_null($userLogin->getDownDate()) && strcmp($userLogin->getPassword(), $password) == 0){

                    $_SESSION["userPH"] = $userLogin;

                    header("Location: ".FRONT_ROOT."/home/administration");

                } else {

                    header("Location: ".FRONT_ROOT);
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

        public function register($msj = ''){

        }

        /* Metodo que realiza la accion de guardar un nuevo usuario si es posible en la bdd o json */

        public function registerAction(){

        }

        /* Metodo que cierra una sesión y te redirecciona al inicio de sesión */

        public function logout(){

            unset($_SESSION['userPH']); 

            header("Location: ".FRONT_ROOT."/");
        }   
    } 

?>