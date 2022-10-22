<?php namespace Models;

    class Owner extends User {

        private $bookingList ;
        private $petList;
        private $paymentsList ;
        
        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firstName = null, $lastName = null, $birthDate = null, $dni = null, $bookingList = null, $petList = null, $paymentsList = null, $profilePicture = null){

            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firstName, $lastName, $birthDate, $dni, $profilePicture);

            $this->bookingList = $bookingList;
            $this->petList      = $petList;
            $this->paymentsList = $paymentsList;                
        }

        public function getBookingList(){

            return $this->bookingList;
        }

        public function setBookingList($bookingList){
            
            $this->bookingsList = $bookingList;
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