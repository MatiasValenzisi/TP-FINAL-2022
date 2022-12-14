<?php namespace Controllers;

    use Models\Admin as Admin;
    use Models\Guardian as Guardian;
    use Models\Owner as Owner;
    use \Exception as Exception;

    class HomeController {

        /*Metodo inicial de la pagina que te envia al home de la pagina o al inicio de sesión en el caso de ser correspondiente */

        public function index($type = null, $action = null, $specific = null){
  
            if (!isset($_SESSION['userPH'])){

			    require_once ROOT_VIEWS."/loginHeader.php";
                require_once ROOT_VIEWS."/loginView.php";
                require_once ROOT_VIEWS."/notificationAlert.php";
                require_once ROOT_VIEWS."/loginFooter.php";

    		} else { 

                header("Location: ".FRONT_ROOT."/home/administration");
    		}        
        }

        /* Metodo que muestra la vista home de la pagina */ 

        public function administration($type = null, $action = null, $specific = null){ 
            
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";     
            require_once ROOT_VIEWS."/homeView.php";  
            require_once ROOT_VIEWS."/notificationAlert.php";  
            require_once ROOT_VIEWS."/mainFooter.php";                 
        } 
    }
?>