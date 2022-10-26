<?php namespace Models;

    class Race{
        
        private $petType;
        private $name;

        public function __construct($petType = null, $name = null){

            $this->petType = $petType;
            $this->name    = $name;
        }

        public function getPetType() { 
            
            return $this->petType; 
        }

        public function setPetType($petType) { 

            $this->petType = $petType; 
        } 

        public function getName() { 

            return $this->name; 
        } 

        public function setName($name) { 

            $this->name = $name;
        } 
    }
?>