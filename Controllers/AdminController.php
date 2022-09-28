<?php namespace Controllers;

    use JsonDAO\AdminDAO as AdminDAO;
    use Models\Admin as Admin; 

    class AdminController {  

        private $adminDAO;
        private $admin;
        private $token;
        private $adminList;
        
        public function __construct(){
          
            $this->adminDAO  = new AdminDAO();
            $this->admin     = null;
            $this->token     = null;
            $this->adminList = array();
        }

        // Muestra el perfil del admin en sessión.

        public function profile(){

        }
        
        // Muestra un listado de administradores activos.

        public function list(){
            
        }
    } 
?>