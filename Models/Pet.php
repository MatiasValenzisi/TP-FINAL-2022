<?php namespace Models;
    
    abstract class Pet {

        protected $token;
        protected $tokenOwner;
        protected $name;
        protected $race;
        protected $size;
        protected $weight;
        protected $observations;
        protected $vaccinationPlan;
        protected $photo;
        protected $video;

        public function __construct($token = null, $tokenOwner = null, $name = null, $race = null, $size = null, $weight = null, $observations = null, $vaccinationPlan = null, $photo = null, $video = null){

            $this->$token          = $token;
            $this->$tokenOwner     = $tokenOwner;
            $this->name            = $name;
            $this->race            = $race;
            $this->size            = $size;
            $this->weight          = $weight;
            $this->observations    = $observations;
            $this->vaccinationPlan = $vaccinationPlan;
            $this->photo           = $photo;
            $this->video           = $video;
        }

        public function getToken(){

            return $this->token;
        }

        public function setToken($token){

            $this->token = $token;
        }

        public function getTokenOwner(){

            return $this->tokenOwner;
        }

        public function setTokenOwner($tokenOwner){

            $this->tokenOwner = $tokenOwner;
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

        public function getVideo() { 

            return $this->video; 
        } 

        public function setVideo($video) { 

            $this->video = $video; 
        } 
    }
?>