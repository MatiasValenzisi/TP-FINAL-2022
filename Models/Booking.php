<?php namespace Models;

use Controllers\UserController;

    class Booking {

        private $token;            // Token o número de reserva.
        private $tokenPet;         // Token de la mascota a cuidar.  
        private $dateStart;        // Fecha inicial.
        private $dateEnd;          // Fecha final.
        private $price;            // Precio total. Dias por precio del guardian.
        private $state;            // Estado de la reserva.
        private $tokenGuardian;    // Token del guardian asignado a la reserva.
        private $tokenOwner;       // Token del dueño que solicito la reserva.
 

        public function __construct($token = null, $tokenPet = null, $dateStart = null, $dateEnd = null, $price = null, $state = null, $tokenGuardian = null, $tokenOwner = null){

            $this->token             = $token;
            $this->tokenPet          = $tokenPet;
            $this->dateStart         = $dateStart;
            $this->dateEnd           = $dateEnd;
            $this->price             = $price;
            $this->state             = $state;
            //$this->couponPayment     = $couponPayment;
            //$this->remainingPayment  = $remainingPayment;
            $this->tokenGuardian     = $tokenGuardian;
            $this->tokenOwner        = $tokenOwner;
            //$this->acceptanceDate    = $acceptanceDate;
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