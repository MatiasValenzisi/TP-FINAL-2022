<?php namespace Controllers;

    use Models\User as User;

    class HomeController {

        /* Metodo inicial de la pagina que te envia al home de la pagina o al inicio de sesión en el caso de ser correspondiente */

        public function index() {
          
            if (!isset($_SESSION['userPH'])){

			    require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/loginView.php";

    		} else { 

                header("Location: ".FRONT_ROOT."/home/administration");

    		}            
        }

        /* Metodo que muestra la vista home de la pagina */ 

        public function administration(){ 
            
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";            
            require_once ROOT_VIEWS."/mainFooter.php"; 
                
        }

        /* Metodo que cierra una sesión y te redirecciona al inicio de sesión */

        public function logout(){

        }       
    }
?>

 
