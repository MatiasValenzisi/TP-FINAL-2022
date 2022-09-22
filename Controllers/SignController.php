<?php namespace Controllers;

    use Controllers\UserController as UserController;

    use Models\Guardian as Guardian; 
    use Models\Owner as Owner;
    use Models\Admin as Admin;

    class SignController {   

        /* Metodo que controla la sesión del usuario en caso que hayan modificaciones en la base de datos o el json */

        public function checkSession(){

        }

        /* Metodo que verifica si el usuario inicio sesión o si los datos que utilizo pertenecen a un usuario */

        public function login($username = null, $pass = null){  
             
        }

        /* Metodo que llama al formulario para crear un usuario */ 

        public function register($msj = ''){

        }

        /* Metodo que realiza la accion de guardar un nuevo usuario si es posible en la bdd o json */

        public function registerAction(){

        }          
    } 

?>
