<?php namespace Model;

    class Owner extends Person {
        private $petList = array();
        private $bookingsList = array();
        private $paymentsList = array();
        
        public function getPetList()
        {
                return $this->petList;
        }

        public function setPetList($petList): self
        {
                $this->petList = $petList;

                return $this;
        }

        public function getBookingsList()
        {
                return $this->bookingsList;
        }

        public function setBookingsList($bookingsList): self
        {
                $this->bookingsList = $bookingsList;

                return $this;
        }

        public function getPaymentsList()
        {
                return $this->paymentsList;
        }

        public function setPaymentsList($paymentsList): self
        {
                $this->paymentsList = $paymentsList;

                return $this;
        }
    }

?>