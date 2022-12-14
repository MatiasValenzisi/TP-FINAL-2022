<?php namespace Controllers;

    use DateTime;    
    use DAO\AdminDAO as AdminDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use Models\Admin as Admin;
    use Models\Guardian as Guardian; 
    use Models\Owner as Owner;
    use \Exception as Exception;

    class UserController{

        private $adminDAO;
        private $guardianDAO;
        private $ownerDAO;
        private $user;
        private $token;
        private $userList;

        public function __construct(){
          
            $this->adminDAO    = new AdminDAO();
            $this->guardianDAO = new GuardianDAO();
            $this->ownerDAO    = new OwnerDAO();
            $this->user        = null;
            $this->token       = null;
            $this->userList    = array();
        }

        // Controla que la password tengo al menos 1 letra y 1 numero.

        public function checkPassword($password) {

            $check = false;

            if($this->controllerLetters($password) && $this->controllerNumber($password)) {
            
                $check = true;
            }

            return $check;
        }

        // Controlar si hay aunque sea una letra. 

        private function controllerLetters($string){

            $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

            $check = false;

            for ($i=0; $i < strlen($string); $i++){

                if (strstr($letters, $string[$i]) != false){

                    $check = true;
                }
            }
          
            return $check;
        }

        // Controlar si hay aunque sea un número. 

        private function controllerNumber($string){

            $check = false;

            for ($i=0; $i < strlen($string); $i++) { 
              
                if (is_numeric($string[$i])) {
                
                    $check = true;
                }
            } 

            return $check; 
        }

        // Controlar que no haya letras en el DNI

        public function controllerDNI($dni, $typeUser){

            try {

                $controllerDNI = true;

                if (!$this->controllerLetters($dni) && strlen($dni) == 8){

                    $temporalList = null;

                    if (strcmp($typeUser,"guardian") == 0) {

                        $temporalList = $this->guardianDAO->getAllDAO();
                    
                    } elseif (strcmp($typeUser,"owner") == 0){

                        $temporalList = $this->ownerDAO->getAllDAO();
                    } 

                    foreach ($temporalList as $key => $user) {
                    
                        if (strcmp($user->getDni(), $dni) == 0) {
                        
                            $controllerDNI = false;;
                        }
                    }

                } else {

                    $controllerDNI = false;            
                } 

                return $controllerDNI;

            } catch (Exception $e) {

                throw $e;
            }
        }

        // Genera un formato para el String

        public function textNameFormat($aCambiar) {

            return ucwords(strtolower($aCambiar));
        }

        // Revisa que la fecha de nacimiento no sea mayor a la actual

        public function birthDateCheck($birthDate){

            $now  = date("Y-m-d");

            $check = false;

            if($birthDate <= $now) {

                $check = true;
            } 
        
            return $check;
        }


        // Busca un usuario por su userName entre los diferentes tipos y lo retorna si existe 

        public function getUserName($userName){ 

            try {

                $this->user = $this->adminDAO->getUserNameDAO($userName);

                if ($this->user != null){

                    return $this->user; 

                } else {

                    $this->user = $this->guardianDAO->getUserNameDAO($userName);

                    if ($this->user != null) {

                        return $this->user;

                    } else {

                        $this->user = $this->ownerDAO->getUserNameDAO($userName);

                    return $this->user;

                    }
                }  

            } catch (Exception $e) {

                throw $e;
            }
        }

        // Busca un usuario por su token entre los diferentes tipos y lo retorna si existe 

        public function getUserToken($token){ 

            try {

                $this->user = $this->adminDAO->getUserTokenDAO($token);

                if ($this->user != null){

                    return $this->user; 

                } else {

                    $this->user = $this->guardianDAO->getUserTokenDAO($token);

                    if ($this->user != null) {

                        return $this->user;

                    } else {

                        $this->user = $this->ownerDAO->getUserTokenDAO($token);

                        return $this->user;
                    }
                } 

            } catch (Exception $e) {

                throw $e;
            }
        }

        // Retorna un nuevo número de token que no haya sido utilizado antes 

        public function createToken($userListToken){ 

   		   $newToken = null;

   			do {

   			    $controller = false;
   				$newToken = $this->generateNumber(6);

   				foreach($userListToken  as $key => $value) {

   				   if($newToken == $value){

   				      $controller = true;
   				    }  
                }
                
            } while($controller);

   	   	    return $newToken; 
   	    }    

        // Retorna un número aleatorio de una cantidad dada 
   		
   	    public function generateNumber($cant){ 

            $key = '';

            for($i=0; $i<$cant; $i++) {
            
                $key .= rand(0,9);
            } 		
          	     
 		    return $key; 
   	    }

        // Retorna el AdminDAO cargado en la controladora 
     
        public function getAdminDAO(){ 

            return $this->adminDAO; 
        } 

        // Retorna el GuardianDAO cargado en la controladora 
     
        public function getGuardianDAO(){ 

            return $this->guardianDAO; 
        } 

        // Retorna el OwnerDAO cargado en la controladora 
     
        public function getOwnerDAO(){ 

            return $this->ownerDAO; 
        } 

        // Retorna el usuario cargado en la controladora 

        public function getUser(){ 

            return $this->user; 
        }

        // Retorna el token cargado en la controladora 

        public function getToken(){ 

            return $this->token; 
        }

        // Retorna la lista de usuarios cargada en la controladora 
      
        public function getUserList(){ 

            try {

                $adminDao = $this->getAdminDAO();
                $adminList = $adminDao->getAllDAO();

                if($adminList != null) {

                    foreach($adminList as $admin) {

                        array_push($this->userList, $admin);
                    }
                }

                $guardianDao = $this->getGuardianDAO();
                $guardianList = $guardianDao->getAllDAO();

                if($guardianList != null) {

                    foreach($guardianList as $guardian) {

                        array_push($this->userList, $guardian);
                    }
                }

                $ownerDao = $this->getOwnerDAO();
                $ownerList = $ownerDao->getAllDAO();

                if($ownerList != null) {

                    foreach($ownerList as $owner) {

                        array_push($this->userList, $owner);
                    }
                }

                return $this->userList; 
                
            } catch (Exception $e) {

                throw $e;
            }
        }

        // Retorna la lista de token de usuarios cargada en la controladora 
       
        public function getTokenUserList(){

            try {
 
                $tokenList = array();

                $adminDao = $this->getAdminDAO();
                $adminList = $adminDao->getAllDAO();

                if($adminList != null) {

                    foreach($adminList as $admin) {

                        array_push($tokenList, $admin->getToken());
                    }
                }

                $guardianDao = $this->getGuardianDAO();
                $guardianList = $guardianDao->getAllDAO();

                if($guardianList != null) {

                    foreach($guardianList as $guardian) {

                        array_push($tokenList, $guardian->getToken());
                    }
                }

                $ownerDao = $this->getOwnerDAO();
                $ownerList = $ownerDao->getAllDAO();

                if($ownerList != null) {

                    foreach($ownerList as $owner) {

                        array_push($tokenList, $owner->getToken());
                    }
                }
            
                return $tokenList; 

            } catch (Exception $e) {

                throw $e;
            } 
        }   		 
    } 
?>