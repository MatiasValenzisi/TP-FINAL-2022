<?php namespace Models;

    class Payment {

        private $token;
        private $tokenBooking;     
        private $amount;           
        private $dateGenerated;    
        private $dateIssued;     
        private $type;            

        public function __construct($token = null, $tokenBooking = null, $amount = null, $dateGenerated = null, $dateIssued = null, $type = null) {

            $this->token              = $token;
            $this->tokenBooking       = $tokenBooking;
            $this->amount             = $amount;
            $this->dateGenerated      = $dateGenerated;
            $this->dateIssued         = $dateIssued;
            $this->type               = $type;
        }

        public function getToken() { 

            return $this->token; 
        } 

        public function setToken($token) { 

            $this->token = $token; 
        }

        public function getTokenBooking() { 

            return $this->tokenBooking; 
        } 

        public function setTokenBooking($tokenBooking) { 

            $this->tokenBooking = $tokenBooking;
        }  

        public function getAmount() { 

            return $this->amount; 
        } 

        public function setAmount($amount) { 

            $this->amount = $amount; 
        } 

        public function getDateGenerated() { 

            return $this->dateGenerated; 
        } 

        public function setDateGenerated($dateGenerated) { 

            $this->dateGenerated = $dateGenerated; 
        } 

        public function getDateIssued() { 

            return $this->dateIssued; 
        } 

        public function setDateIssued($dateIssued) {

            $this->dateIssued = $dateIssued; 
        }

        public function getType() { 

            return $this->type; 
        } 

        public function setType($type) { 

            $this->type = $type;
        }
    }
?>