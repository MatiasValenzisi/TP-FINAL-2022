<?php namespace Models;

    class Coupon extends Payment {

        private $percentage = 50;

        public function __construct($amount=null, $date=null, $paymentMethod=null, $booking = null){
            
            parent::__construct($amount, $date, $paymentMethod, $booking);
        }
        
        public function getPercentage(){
            
            return $this->percentage;
        }
    }
?>