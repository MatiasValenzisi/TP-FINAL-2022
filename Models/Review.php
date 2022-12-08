<?php namespace Models;

    class Review {

        private $score;
        private $date;
        private $observations;
        private $tokenGuardian;
        private $tokenBooking;

        public function __construct($score = null, $date = null, $observations = null, $tokenGuardian = null, $tokenBooking = null){
            
            $this->score         = $score;
            $this->date          = $date;
            $this->observations  = $observations;
            $this->tokenGuardian = $tokenGuardian;
            $this->tokenBooking  = $tokenBooking;
        }

        public function getScore(){

            return $this->score;
        }

        public function setScore($score){
            
            $this->score = $score;
        }

        public function getDate(){
            
            return $this->date;
        }

        public function setDate($date){
            
            $this->date = $date;
        }

        public function getObservations(){
            
            return $this->observations;
        }

        public function setObservations($observations){
            
            $this->observations = $observations;
        }

        public function getTokenGuardian() {

            return $this->tokenGuardian; 
        } 

        public function setTokenGuardian($tokenGuardian) { 

            $this->tokenGuardian = $tokenGuardian; 
        } 

        public function getTokenBooking() { 

            return $this->tokenBooking; 
        } 

        public function setTokenBooking($tokenBooking) { 

            $this->tokenBooking = $tokenBooking; 
        } 
    }
?>