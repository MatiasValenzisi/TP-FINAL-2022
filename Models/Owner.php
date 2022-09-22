<?php namespace Models;

use Models\User as User;

class Owner extends User {
        private $dni;
        private $bookingsList ;
        private $petList;
        private $paymentsList ;
        
        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null, $dni = null, $bookingsList = null, $petList = null, $paymentsList = null)
        {
                parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firtsName, $lastName, $birthDate);
                $this->dni = $dni;
                $this->bookingsList = $bookingsList;
                $this->petList = $petList;
                $this->paymentsList = $paymentsList;
                
        }

        /**
         * Get the value of dni
         */
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         */
        public function setDni($dni): self
        {
                $this->dni = $dni;

                return $this;
        }

        /**
         * Get the value of bookingsList
         */
        public function getBookingsList()
        {
                return $this->bookingsList;
        }

        /**
         * Set the value of bookingsList
         */
        public function setBookingsList($bookingsList): self
        {
                $this->bookingsList = $bookingsList;

                return $this;
        }

        /**
         * Get the value of petList
         */
        public function getPetList()
        {
                return $this->petList;
        }

        /**
         * Set the value of petList
         */
        public function setPetList($petList): self
        {
                $this->petList = $petList;

                return $this;
        }

        /**
         * Get the value of paymentsList
         */
        public function getPaymentsList()
        {
                return $this->paymentsList;
        }

        /**
         * Set the value of paymentsList
         */
        public function setPaymentsList($paymentsList): self
        {
                $this->paymentsList = $paymentsList;

                return $this;
        }
}

?>