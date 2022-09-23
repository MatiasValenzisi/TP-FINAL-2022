<?php namespace Models;

    class Owner extends User {

        private $dni;
        private $bookingsList ;
        private $petList;
        private $paymentsList ;
        
        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firstName = null, $lastName = null, $birthDate = null, $dni = null, $bookingsList = null, $petList = null, $paymentsList = null){

            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firstName, $lastName, $birthDate);

            $this->dni          = $dni;
            $this->bookingsList = $bookingsList;
            $this->petList      = $petList;
            $this->paymentsList = $paymentsList;                
        }

        public function getDni(){
            
            return $this->dni;
        }

        public function setDni($dni){
            
            $this->dni = $dni;
        }

        public function getBookingsList(){

            return $this->bookingsList;
        }

        public function setBookingsList($bookingsList){
            
            $this->bookingsList = $bookingsList;
        }

        public function getPetList(){
            
            return $this->petList;
        }

        public function setPetList($petList){
            
            $this->petList = $petList;
        }

        public function getPaymentsList(){
            
            return $this->paymentsList;
        }

        public function setPaymentsList($paymentsList){
            
            $this->paymentsList = $paymentsList;
        }
    }
?>