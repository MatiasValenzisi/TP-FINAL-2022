<?php namespace Controllers;

    use DateTime;
    use JsonDAO\AdminDAO as AdminDAO;
    use JsonDAO\GuardianDAO as GuardianDAO;
    use JsonDAO\OwnerDAO as OwnerDAO;

    use Models\Admin as Admin;
    use Models\Guardian as Guardian; 
    use Models\Owner as Owner;

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

      /* Metodo que llama a los usuarios no dado de baja con su respectiva vista */
      
      public function administration(){ 

      }

      /* Metodo que trae los datos requeridos para el registro de usuarios con su respectiva vista */

      public function register($type = null){

        require_once ROOT_VIEWS."/mainHeader.php";
        require_once ROOT_VIEWS."/temporal-register.php";
      }

      /* Metodo de registro de un usuario a partir de los datos mandandos por el metodo POST en caso de cumplir con los requisitos de control */

      public function createUser($type = null){  

            $parameters = $_GET;
            $tokenList = array();
            $userArrays = $this->getUserList();

            if($userArrays != null) {
                foreach($userArrays as $user){
                    array_push($tokenList, $user);
                } 
            } else{
                $tokenList = null;
            }

            if(strcmp($type, "admin") == 0){
                $newADmin = new Admin($this->createToken($tokenList), $parameters['email'], $parameters['password'], date("Y-m-d"), null, $parameters['firstName'], $parameters['lastName'],  $parameters['birthDate'], $parameters['dni']);
                if($this->checkPassword($newADmin->getPassword())){
                    $adminDao = $this->getAdminDAO();
                    $adminDao->addDAO($newADmin);
                    header("Location: ".FRONT_ROOT);
                } else {
                    header("Location: ".FRONT_ROOT."/Views/temporal-register.php");
                }

            } else if(strcmp($type, "guardian") == 0) {
                $newGuardian = new Guardian($this->createToken($tokenList),$parameters['email'],$parameters['password'],date("Y-m-d"),null,$parameters['firstName'],$parameters['lastName'],$parameters['birthDate'],$parameters['dni'],$parameters['experience'],null,null);
                if($this->checkPassword($newGuardian->getPassword())) {
                    $guardianDao = $this->getGuardianDAO();
                    $guardianDao->addDAO($newGuardian);
                    header("Location: ".FRONT_ROOT);
                } else {
                    header("Location: ".FRONT_ROOT."/Views/temporal-register.php");
                }
            } else{
                $newOwner = new Owner($this->createToken($tokenList), $parameters['email'], $parameters['password'], date("Y-m-d"), null, $parameters['firstName'], $parameters['lastName'], $parameters['birthDate'], $parameters['dni'], null, null, null);
                if($this->checkPassword($newOwner->getPassword())){
                    $adminDao = $this->getAdminDAO();
                    $adminDao->addDAO($newOwner);
                    header("Location: ".FRONT_ROOT);
                } else {
                    header("Location: ".FRONT_ROOT."/Views/temporal-register.php");
                }
            }
      }

      // Controla si es mayor de edad
      /*
      private function checkAge($birthday) {
        $nacimiento = new DateTime($birthday);
        $fechaActual = new DateTime(date("Y-m-d"));
        $diferencia = $fechaActual->diff($nacimiento);
        $age = $diferencia->format("%y");
        if($age >= 18){
            return true;
        } 
        return false;
      }*/

      // Controla que la password tengo al menos 1 letra y 1 numero

      private function checkPassword($password) {
        if($this->controllerLetters($password) && $this->controllerNumber($password)) {
            return true;
        }
        return false;
      }

      // Controlar si hay aunque sea una letra. 

      private function controllerLetters($string){

          $letters = "abcdefghijklmnopqrs/**//tuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

          for ($i=0; $i < strlen($string); $i++){

              if (strpos($letters, substr($string[$i],0)) == true){

                return true;

              }
          }
          
          return false;
      }

      // Controlar si hay aunque sea un número. 

      private function controllerNumber($string){

          for ($i=0; $i < strlen($string); $i++) { 
              
              if (is_numeric($string[$i])) {
                
                  return true;
              }
          }

          return false; 

      }

      /* Metodo que trae los datos requeridos para mostrar un usuario y poder editarlo con su respectiva vista */

      public function edit($token = null, $msj = "", $type = "", $div = ""){ 

      }

      /* Metodo que evalua los cambios realizados en un usuario mediante el metodo POST, para en caso de ser posible actualizarlos */

      public function editUser(){ 

      }

      /* Metodo que trae los datos requeridos para dar de baja un usuario con su respectiva vista */

      public function deregister($token = null){ 

      }

      /* Metodo de dada de baja de un usuario a partir de su token por el metodo POST */

      public function deregisterUser(){ 

      } 

      /* Busca un usuario por su userName entre los diferentes tipos y lo retorna si existe */

      public function getUserName($userName){ 

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
      }

      /* Busca un usuario por su token entre los diferentes tipos y lo retorna si existe */

      public function getUserToken($token){ 

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
      }

      /* Retorna un nuevo número de token que no haya sido utilizado antes */

      public function createToken($userListToken){ 

   		 $newToken = null;

   			do {

   			    $controller = false;
   				$newToken = $this->generateNumber(6);

   				foreach($userListToken  as $key => $value) {

   				   if($newToken == $value){

   				      $controller = true;

   				}  }  } while($controller);

   	   	   return $newToken; 
   	   }

       /* Retorna un número aleatorio de una cantidad dada */
   		
   	  public function generateNumber($cant){ 

          $key = '';
          //$pattern = '1234567890';
          //$max = strlen($pattern)-1;

          for($i=0; $i<$cant; $i++) {
                $key .= rand(0,9);
                //$key .= $pattern{mt_rand(0,$max)};
          } 			
          	     
 			    return $key; 
   		}

      /* Retorna el AdminDAO cargado en la controladora */
     
      public function getAdminDAO(){ 

          return $this->adminDAO; 
      } 

      /* Retorna el GuardianDAO cargado en la controladora */
     
      public function getGuardianDAO(){ 

          return $this->guardianDAO; 
      } 

      /* Retorna el OwnerDAO cargado en la controladora */
     
      public function getOwnerDAO(){ 

          return $this->ownerDAO; 
      } 

      /* Retorna el usuario cargado en la controladora */

      public function getUser(){ 

          return $this->user; 
      }

      /* Retorna el token cargado en la controladora */

      public function getToken(){ 

          return $this->token; 
      }

      /* Retorna la lista de usuarios cargada en la controladora */
      
      public function getUserList(){ 
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
    }
         
   		 
    } ?>
      

  