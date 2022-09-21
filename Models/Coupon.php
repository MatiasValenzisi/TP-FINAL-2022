<?php namespace Models;
    use Models\Payment as Payment;

    class Coupon extends Payment {
        private $percentage = 50;

        public function __construct($amount=null, $date=null, $paymentMethod=null, $booking = null)
        {
            parent::__construct($amount, $date, $paymentMethod, $booking);
        }
        

        /**
         * Get the value of percentage
         */
        public function getPercentage()
        {
                return $this->percentage;
        }
    }

?>