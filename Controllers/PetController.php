<?php namespace Controllers;

    use JsonDAO\DogDAO as DogDAO;
    use Models\Dog as Dog; 

    class PetController {  

        private $dogDAO;
        private $dog;
        private $tokenPet;
        private $dogList;
        
        public function __construct(){
          
            $this->dogDAO  = new DogDAO();
            $this->dog     = null;
            $this->tokenPet  = null;
            $this->dogList = array();
        }
    
        // Muestra un listado de mascotas.

        public function list(){

            echo "listado de mascotas";
        }
    } 
?>