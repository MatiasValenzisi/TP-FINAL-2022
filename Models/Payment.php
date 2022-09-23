<?php namespace Models;

    class Payment {

        private $amount;
        private $date;
        private $paymentMethod;  // Metodo de pago.
        private $booking;        // Reserva.

        public function __construct($amount = null, $date = null, $paymentMethod = null, $booking = null) {

            $this->amount = $amount;
            $this->date = $date;
            $this->paymentMethod = $paymentMethod;
            $this->booking = $booking;
        }

        public function getAmount(){

            return $this->amount;
        }

        public function setAmount($amount){

            $this->amount = $amount;
        }

        public function getDate(){

            return $this->date;
        }

        public function setDate($date){
            
             $this->date = $date;
        }

        public function getPaymentMethod(){
            
            return $this->paymentMethod;
        }

        public function setPaymentMethod($paymentMethod){
            
             $this->paymentMethod = $paymentMethod;
        }

        public function getBooking(){
             
             return $this->booking;
        }

        public function setBooking($booking){
            
            $this->booking = $booking;
        }
    }
?>