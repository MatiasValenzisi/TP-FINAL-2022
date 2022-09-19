<?php namespace Model;

    class Payment {
        private $amount;
        private $date;
        private $paymentMethod;

        public function __construct($amount=null, $date=null, $paymentMethod=null) {
            $this->$amount = $amount;
            $this->$date = $date;
            $this->$paymentMethod = $paymentMethod;
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
    }
?>