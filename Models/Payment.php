<?php namespace Models;

    class Payment {

        private $token;
        private $tokenBooking;     // Token de la reserva.
        private $amount;           // Monto.
        private $dateGenerated;    // Fecha generación de pago.
        private $dateIssued;       // Fecha emisión de pago. 
        private $paymentMethod;    // Metodo de pago.
        private $type;             // Cupon de pago o pago final/restante.  

        public function __construct($token = null, $tokenBooking = null, $amount = null, $dateGenerated = null, $dateIssued = null, $paymentMethod = null, $type = null) {

            $this->token              = $token;
            $this->tokenBooking       = $tokenBooking;
            $this->amount             = $amount;
            $this->dateGenerated      = $dateGenerated;
            $this->dateIssued         = $dateIssued;
            $this->paymentMethod      = $paymentMethod;
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

        public function getPaymentMethod() { 

            return $this->paymentMethod; 
        } 

        public function setPaymentMethod($paymentMethod) { 

            $this->paymentMethod = $paymentMethod; 
        }  

        public function getType() { 

            return $this->type; 
        } 

        public function setType($type) { 

            $this->type = $type;
        }
    }
?>