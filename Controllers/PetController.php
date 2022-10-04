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

        public function add()
        {
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/createPetView.php";     
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }
        // Crear mascota
        public function createPet()
        {
            
            $parameters  = $_POST;
            $ownerToken=$_SESSION['userPH']->getToken();
            $token=$this->createToken($this->getTokenPetList());
            $this->dog =new Dog($token,$ownerToken,$parameters["name"],$parameters["race"],$parameters["size"],$parameters["observations"],$parameters["vaccinationplan"],$parameters["photo"]=null); 
            $this->dogDAO->addDAO($this->dog);
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
    public function getTokenPetList(){ 

        $tokenList = array();

        $dogList = $this->dogDAO->getAllDAO();

        if($dogList != null) {

            foreach($dogList as $currentDog) {

                array_push($tokenList, $currentDog->getToken());
            }
        }


        return $tokenList; 
    }
    
    } 
?>