<?php namespace Controllers;

    use JsonDAO\DogDAO as DogDAO;
    use Models\Dog as Dog; 

    class PetController {  

        private $dogDAO;
        private $catDAO;
        private $dog;
        private $cat;
        private $tokenPet;
        private $dogList;
        private $catList;
        
        public function __construct(){
          
            $this->dogDAO  = new DogDAO();
            $this->dog     = null;
            $this->tokenPet  = null;
            $this->dogList = array();
        }
    
        // Muestra un listado de mascotas.

        public function list(){


            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/petAdministrationView.php";            
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

<<<<<<< HEAD
        // Crear mascota
        public function createPet()
        {
            $parameters     = $_GET;
            
            $ownerToken=$_SESSION['userPH']->getToken();
            $token=$this->createToken($this->getPetToken());
            $this->dog =new Dog($token,$ownerToken,$parameters["name"],$parameters["race_new"]); 
            $this->dogDAO->addDAO($this->dog);
            $this->dogDAO->saveData();
        }

        public function createToken($petListToken){ 

   		 $newToken = null;

   			do {

   			    $controller = false;
   				$newToken = $this->generateNumber(6);

   				foreach($petListToken  as $key => $value) {

   				   if($newToken == $value){

   				      $controller = true;

   				}  }  } while($controller);

   	   	   return $newToken; 
   	   }

       /* Retorna un número aleatorio de una cantidad dada */
   		
   	  public function generateNumber($cant){ 

        $key = '';

        for($i=0; $i<$cant; $i++) {
            
            $key .= rand(0,9);
        } 		
          	     
 		return $key; 
   	  }

     public function getPetToken($token){ 
        $this->pet = $this->dogDAO->getDogTokenDAO($token);
        
        return $this->pet;
        
    }
    public function getTokenUserList(){ 

        $tokenList = array();

        $adminDao = $this->getAdminDAO();
        $adminList = $adminDao->getAllDAO();

        if($adminList != null) {

            foreach($adminList as $admin) {

                array_push($tokenList, $admin->getToken());
            }
        }


        return $tokenList; 
    }
    
=======
        public function add(){

            echo "Añadir mascotas";
        }
>>>>>>> efa345bce3d29e4fa8179a07bd1722cb5ed6a751
    } 
?>