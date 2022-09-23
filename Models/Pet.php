<?php namespace Models;
    
    abstract class Pet {

        private $name;
        private $race;
        private $size;
        private $weight;
        private $observations;
        private $vaccinationPlan;
        private $photo;

        public function __construct($name = null, $race = null, $size = null,$weight=null, $observations = null, $vaccinationPlan = null, $photo = null){

            $this->name            = $name;
            $this->race            = $race;
            $this->size            = $size;
            $this->weight          = $weight;
            $this->observations    = $observations;
            $this->vaccinationPlan = $vaccinationPlan;
            $this->photo           = $photo;
        }
        
        public function getName(){
            
            return $this->name;
        }

        public function setName($name){
            
            $this->name = $name;
        }

        public function getRace(){

            return $this->race;
        }

        public function setRace($race){
            
            $this->race = $race;
        }

        public function getSize(){
            
            return $this->size;
        }

        public function setSize($size){
             
            $this->size = $size;
        }

        public function getObservations(){
             
            return $this->observations;
        }

        public function setObservations($observations){

            $this->observations = $observations;
        }

        public function getVaccinationPlan(){
            
            return $this->vaccinationPlan;
        }

        public function setVaccinationPlan($vaccinationPlan){
            
            $this->vaccinationPlan = $vaccinationPlan;
        }

        public function getPhoto(){
            
            return $this->photo;
        }

        public function setPhoto($photo){
            
            $this->photo = $photo;
        }

        public function getWeight(){
            
            return $this->weight;
        }

        public function setWeight($weight){
            
            $this->weight = $weight;
        }
    }
?>