<?php namespace Models;

use Controllers\UserController;

    class Booking {

        private $token;            // Token o número de reserva.
        private $pet;              // Tipo de mascota: gato o perro.
        private $race;             // Raza de la mascota.   
        private $dateStart;        // Fecha inicial.
        private $dateEnd;          // Fecha final.
        private $price;            // Precio total. Dias por precio del guardian.
        private $state;            // Estado de la reserva.
        private $couponPayment;    // Cupón de pago.
        private $remainingPayment; // Pago restante.
        private $tokenGuardian;    // Token del guardian asignado a la reserva.
        private $tokenOwner;       // Token del dueño que solicito la reserva.
        private $acceptanceDate;   // Fecha de aceptación de la reserva por parte del guardian. 

        public function __construct($token = null, $pet = null, $race = null, $dateStart = null, $dateEnd = null, $price = null, $state = null, 
        $couponPayment = null, $remainingPayment = null, $tokenGuardian = null, $tokenOwner = null, $acceptanceDate = null){

            $this->token             = $token;
            $this->pet               = $pet;
            $this->race              = $race;
            $this->dateStart         = $dateStart;
            $this->dateEnd           = $dateEnd;
            $this->price             = $price;
            $this->state             = $state;
            $this->couponPayment     = $couponPayment;
            $this->remainingPayment  = $remainingPayment;
            $this->tokenGuardian     = $tokenGuardian;
            $this->tokenOwner        = $tokenOwner;
            $this->acceptanceDate    = $acceptanceDate;
        }  

        public function getToken() { 

            return $this->token; 
        } 

        public function setToken($token) { 

            $this->token = $token; 
        } 

        public function getPet() { 

            return $this->pet; 
        } 

        public function setPet($pet) { 

            $this->pet = $pet; 
        }    

        public function getRace() { 

            return $this->race; 
        } 

        public function setRace($race) { 

            $this->race = $race; 
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

        public function getCouponPayment() { 

            return $this->couponPayment; 
        } 

        public function setCouponPayment($couponPayment) { 

            $this->couponPayment = $couponPayment; 
        } 

        public function getRemainingPayment() { 

            return $this->remainingPayment; 
        } 

        public function setRemainingPayment($remainingPayment) { 

            $this->remainingPayment = $remainingPayment;
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

        public function getAcceptanceDate() { 

            return $this->acceptanceDate; 
        } 

        public function setAcceptanceDate($acceptanceDate) { 

            $this->acceptanceDate = $acceptanceDate; 
        } 

        public function getOwnerFullName() {
            $userController = new UserController();
            $owner = $userController->getUserToken($this->tokenOwner);

            return $owner->getFirstName()." ".$owner->getLastName();
        }

        

    }
?>