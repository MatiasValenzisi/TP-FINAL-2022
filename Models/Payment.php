<?php namespace Models;

    class Payment {

        private $amount;
        private $date;
        private $paymentMethod;  // Metodo de pago.
        private $booking;        // Reserva.

        public function __construct($amount=null, $date=null, $paymentMethod=null, $booking = null) {
            $this->amount = $amount;
            $this->date = $date;
            $this->paymentMethod = $paymentMethod;
            $this->booking = $booking;
        }

        public function getAmount()
        {
                return $this->amount;
        }

        public function setAmount($amount): self
        {
                $this->amount = $amount;

                return $this;
        }

        public function getDate()
        {
                return $this->date;
        }

        public function setDate($date): self
        {
                $this->date = $date;

                return $this;
        }

        public function getPaymentMethod()
        {
                return $this->paymentMethod;
        }

        public function setPaymentMethod($paymentMethod): self
        {
                $this->paymentMethod = $paymentMethod;

                return $this;
        }

        /**
         * Get the value of booking
         */
        public function getBooking()
        {
                return $this->booking;
        }

        /**
         * Set the value of booking
         */
        public function setBooking($booking): self
        {
                $this->booking = $booking;

                return $this;
        }
    }
?>