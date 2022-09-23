<?php namespace Models;

    class Booking {

        private $initialDate;
        private $finalDate;
        private $initialSchedule; // Horario inicial.
        private $finalSchedule;   // Horario final.
        private $condition;       // Estado.
        private $couponPayment;
        private $remainingPayment;
        private $guardian;
        private $owner;

        public function __construct($initialDate = null, $finalDate = null, $initialSchedule = null, $finalSchedule = null, $condition = null, 
        $couponPayment = null, $remainingPayment = null, $guardian = null, $owner = null){

            $this->initialDate      = $initialDate;
            $this->finalDate        = $finalDate;
            $this->initialSchedule  = $initialSchedule;
            $this->finalSchedule    = $finalSchedule;
            $this->condition        = $condition;
            $this->couponPayment    = $couponPayment;
            $this->remainingPayment = $remainingPayment;
            $this->guardian         = $guardian;
            $this->owner            = $owner;
        }
      
        public function getInitialDate(){

            return $this->initialDate;
        }

        public function setInitialDate($initialDate){

            $this->initialDate = $initialDate;
        }

        public function getFinalDate(){

            return $this->finalDate;
        }

        public function setFinalDate($finalDate){
            
            $this->finalDate = $finalDate;
        }

        public function getInitialSchedule(){

            return $this->initialSchedule;
        }

        public function setInitialSchedule($initialSchedule){

            $this->initialSchedule = $initialSchedule;
        }

        public function getFinalSchedule(){

            return $this->finalSchedule;
        }

        public function setFinalSchedule($finalSchedule){
            
            $this->finalSchedule = $finalSchedule;
        }

        public function getCondition(){
            
            return $this->condition;
        }

        public function setCondition($condition){
            
            $this->condition = $condition;
        }

        public function getCouponPayment(){

            return $this->couponPayment;
        }

        public function setCouponPayment($couponPayment){
            
            $this->couponPayment = $couponPayment;
        }

        public function getRemainingPayment(){
            
            return $this->remainingPayment;
        }

        public function setRemainingPayment($remainingPayment){
            
            $this->remainingPayment = $remainingPayment;
        }

        public function getGuardian(){
            
            return $this->guardian;
        }

        public function setGuardian($guardian){

            $this->guardian = $guardian;
        }

        public function getOwner(){
            
            return $this->owner;
        }

        public function setOwner($owner){
            
            $this->owner = $owner;
        }
    }
?>