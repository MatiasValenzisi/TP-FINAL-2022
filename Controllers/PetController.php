<?php namespace Controllers;

    use JsonDAO\DogDAO as DogDAO;
    use Models\Dog as Dog; 

    class PetController {  

        private $tokenPet;

        private $dogDAO;
        private $dog;

        private $petList;

        //private $catDAO;        
        //private $cat;   
        
        public function __construct(){
          
            $this->tokenPet = null; 
            
            $this->dogDAO   = new DogDAO();           
            $this->dog      = null;    
                    
            $this->petList  = array();            
        }

        public function list(){

            $this->petList = $this->dogDAO->getAllDAO();

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/petListView.php"; 
            require_once ROOT_VIEWS."/mainFooter.php";           
        }

        public function add($typePet = null, $type = null, $action = null, $specific = null){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";

            if (strcmp($typePet,"cat") == 0){

                require_once ROOT_VIEWS."/catCreateView.php";

            } else {

                require_once ROOT_VIEWS."/dogCreateView.php";
            }            
            require_once ROOT_VIEWS."/notificationAlert.php";     
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }

        public function createPet($typePet, $name, $race, $size, $weight, $vaccinationPlan = null, $photo = null, $video = null, $observations = ''){
            
            $ownerToken = $_SESSION['userPH']->getToken();

            $token = $this->createToken($this->getTokenPetList());  

            $fileName = ROOT_VIEWS."/vaccination/".$token."-".basename($_FILES['vaccinationPlan']['name']);

            $extension = $this->getExtension($fileName);   

            if (strcmp($extension, 'jpg') == 0 || strcmp($extension, 'png') == 0) {

                $sizeVP = $_FILES['vaccinationPlan']['size'];

                if ($sizeVP > 1000000){ // 1 mb.
                    
                    header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/vaccination/size"); 
                    exit(); 

                } else {                
                    
                    if (move_uploaded_file($_FILES['vaccinationPlan']['tmp_name'], $fileName)){

                       $vaccinationPlan = $token."-".basename($_FILES['vaccinationPlan']['name']);

                    } else {

                        header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/vaccination/unknown");  
                        exit();                      
                    }             
                }
                
            } else {

                header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/vaccination/format");
                exit();
            }

            if (file_exists($_FILES['photo']['tmp_name'])) {

                $fileName = ROOT_VIEWS."/photo/".$token."-".basename($_FILES['photo']['name']);

                $extension = $this->getExtension($fileName);

                if (strcmp($extension, 'jpg') == 0 || strcmp($extension, 'png') == 0) {

                    $sizeP = $_FILES['photo']['size'];

                    if ($sizeP > 1000000){ // 1 mb.
                        
                         header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/photo/size");
                         exit();

                    } else {                        
                        
                        if (move_uploaded_file($_FILES['photo']['tmp_name'], $fileName)){

                            $photo = $token."-".basename($_FILES['photo']['name']);

                        }  else {

                            header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/photo/unknown");
                            exit();
                        }            
                    }
                
                } else {

                     header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/photo/format");
                     exit();
                }
               
            } if (file_exists($_FILES['video']['tmp_name'])) {

                $fileName = ROOT_VIEWS."/video/".$token."-".basename($_FILES['video']['name']);
                $extension = $this->getExtension($fileName);

                if (strcmp($extension, 'mp4') == 0){

                    $sizeV = $_FILES['video']['size'];

                    if ($sizeV > 10000000){ // 10 mb.

                        header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/video/size");
                        exit();

                    } else {
                        
                        if (move_uploaded_file($_FILES['video']['tmp_name'], $fileName)){

                            $video = $token."-".basename($_FILES['video']['name']);

                        }  else {

                            header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/video/unknown");
                            exit();
                        }   
                    }

                } else {

                    header("Location: ".FRONT_ROOT."/pet/add/".$typePet."/error/video/format");
                    exit();
                }                
            } 

            if (strcmp($typePet,"dog") == 0) {
               
                $this->dog = new Dog($token, $ownerToken, $name, $race, $size, $weight, $observations, $vaccinationPlan, $photo, $video);

                $this->dogDAO->addDAO($this->dog);

            }

            header("Location: ".FRONT_ROOT."/pet/list");
        }

        private function getExtension($str){

            $array = explode(".", $str);
            $indice = count($array)-1;
            $extension = $array[$indice];
            return $extension;
        }

        public function createToken($petListToken){ 

   		 $newToken = null;

   			do {

   			    $controller = false;
   				$newToken = $this->generateNumber(6);

   				foreach($petListToken  as $key => $value) {

   				   if($newToken == $value){

   				      $controller = true;
   				    }  
                }  

            } while($controller);

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

            $petList = $this->dogDAO->getAllDAO();

            if($petList != null) {

                foreach($petList as $current) {

                    array_push($tokenList, $current->getToken());
                }
            }
            return $tokenList; 
        }

        public function view($typePet, $token){   

            if (strcmp($typePet,"dog") == 0) {
                
                $this->dog = $this->dogDAO->getDogTokenDAO($token);
                
                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/mainNav.php";  
                require_once ROOT_VIEWS."/dogView.php";
                require_once ROOT_VIEWS."/mainFooter.php"; 
                
            } elseif (strcmp($typePet,"cat") == 0) {

                echo "Vista gato: /catView.php";

            } else {
                
                header("Location: ".FRONT_ROOT."/pet/list");
            }

            
        } 
    } 
?>