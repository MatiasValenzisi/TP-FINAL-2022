<?php namespace Models;

    class Review {

        private $score;
        private $date;
        private $observations;
        private $guardian;

        public function __construct($score = null, $date = null, $observations = null, $guardian = null){
            
            $this->score        = $score;
            $this->date         = $date;
            $this->observations = $observations;
            $this->guardian     = $guardian;
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

        public function getGuardian(){
            
            return $this->guardian;
        }

        public function setGuardian($guardian){
            
            $this->guardian = $guardian;
        }
    }
?>