<?php namespace Models;

    class Booking {

        private $token;           
        private $tokenPet;         
        private $dateStart;        
        private $dateEnd;          
        private $price;            
        private $state;            
        private $tokenGuardian;    
        private $tokenOwner;       
 

        public function __construct($token = null, $tokenPet = null, $dateStart = null, $dateEnd = null, $price = null, $state = null, $tokenGuardian = null, $tokenOwner = null){

            $this->token             = $token;
            $this->tokenPet          = $tokenPet;
            $this->dateStart         = $dateStart;
            $this->dateEnd           = $dateEnd;
            $this->price             = $price;
            $this->state             = $state;
            $this->tokenGuardian     = $tokenGuardian;
            $this->tokenOwner        = $tokenOwner;
        }  

        public function getToken() { 

            return $this->token; 
        } 

        public function setToken($token) { 

            $this->token = $token; 
        } 

        public function getTokenPet() { 

            return $this->tokenPet; 
        } 

        public function setTokenPet($tokenPet) { 

            $this->tokenPet = $tokenPet; 
        }  

        public function getDateStart() { 

            return $this->dateStart; 
        }

        public function setDateStart($dateStart) { 

            $this->dateStart = $dateStart; 
        } 

        public function getDateEnd() { 

            return $this->dateEnd; 
        } 

        public function setDateEnd($dateEnd) { 

            $this->dateEnd = $dateEnd; 
        } 

        public function getPrice() { 

            return $this->price; 
        } 

        public function setPrice($price) { 

            $this->price = $price; 
        } 

        public function getState() { 

            return $this->state; 
        } 

        public function setState($state) { 

            $this->state = $state; 
        } 

        public function getTokenGuardian() { 

            return $this->tokenGuardian; 
        } 

        public function setTokenGuardian($tokenGuardian) { 

            $this->tokenGuardian = $tokenGuardian; 
        }  

        public function getTokenOwner() { 

            return $this->tokenOwner; 
        } 

        public function setTokenOwner($tokenOwner) { 

            $this->tokenOwner = $tokenOwner;
        } 
    }
?>