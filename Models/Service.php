<?php namespace Models;

    class Service {

        private $typeOfPet;
        private $size;
        private $day;
        private $price;
        private $guardian;

        public function __construct($typeOfPet = null, $size = null, $day = null, $price = null, $guardian = null){

            $this->typeOfPet = $typeOfPet;
            $this->size      = $size;
            $this->dat       = $day;
            $this->price     = $price;
            $this->guardian  = $guardian;
        }

        public function getTypeOfPet(){
            return $this->typeOfPet;
        }

        public function setTypeOfPet($typeOfPet){
            
            $this->typeOfPet = $typeOfPet;
        }

        public function getSize(){
            
            return $this->size;
        }

        public function setSize($size){
            
            $this->size = $size;
        }

        public function getDay(){
            
            return $this->day;
        }

        public function setDay($day){
            
            $this->day = $day;
        }

        public function getPrice(){
            
            return $this->price;
        }

        public function setPrice($price){
            
            $this->price = $price;
        }

        public function getGuardian() { 

            return $this->guardian; 
        } 

        public function setGuardian($guardian) { 

            $this->guardian = $guardian; 
        } 
    }
?>