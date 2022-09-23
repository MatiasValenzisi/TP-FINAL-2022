<?php namespace Models;

    class Guardian extends User {

        private $cuil;
        private $experience;
        private $bookingList;
        private $reviewList;
        private $serviceList;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, $firstName = null, $lastName = null, $birthDate = null, $cuil = null, $experience = null, $bookingList = null, $reviewList = null){

            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firstName, $lastName, $birthDate);

            $this->cuil        = $cuil;
            $this->experience  = $experience;
            $this->bookingList = $bookingList;
            $this->reviewList  = $reviewList;
        }

        public function getCuil(){

            return $this->cuil;
        }

        public function setCuil($cuil){
            
            $this->cuil = $cuil;
        }

        public function getExperience(){
            
            return $this->experience;
        }

        public function setExperience($experience){
            
            $this->experience = $experience;
        }

        public function getBookingList(){
            
            return $this->bookingList;
        }

        public function setBookingList($bookingList){
            
            $this->bookingList = $bookingList;
        }

        public function getReviewList(){
            
            return $this->reviewList;
        }

        public function setReviewList($reviewList){

            $this->reviewList = $reviewList;
        }

        public function getServiceList(){
            
            return $this->serviceList;
        }

        public function setServiceList($serviceList){
            
            $this->serviceList = $serviceList;
        }
    }
?>