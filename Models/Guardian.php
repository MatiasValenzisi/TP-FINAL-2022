<?php namespace Models;

    class Guardian extends User {

        private $experience;     
        private $petSize;          
        private $servicePrice;  
        private $serviceStartDate; 
        private $serviceEndDate;    
        private $serviceDayList;     
        private $bookingList;         
        private $reviewList;         

        public function __construct(

            $token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, $firstName = null, $lastName = null, $birthDate = null, $dni = null, $profilePicture = null, $experience = null, $petSize = null, $servicePrice = null, $serviceStartDate = null, $serviceEndDate = null, $serviceDayList = null, $bookingList = null, $reviewList = null){

            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firstName, $lastName, $birthDate, $dni, $profilePicture);

            $this->experience       = $experience;
            $this->petSize          = $petSize;
            $this->servicePrice     = $servicePrice;
            $this->serviceStartDate = $serviceStartDate;
            $this->serviceEndDate   = $serviceEndDate;
            $this->serviceDayList   = $serviceDayList;
            $this->bookingList      = $bookingList;
            $this->reviewList       = $reviewList;
        }

        public function getExperience(){
            
            return $this->experience;
        }

        public function setExperience($experience){
            
            $this->experience = $experience;
        }

        public function getPetSize() {
         
            return $this->petSize; 
        } 

        public function setPetSize($petSize) { 

            $this->petSize = $petSize; 
        } 

        public function getServicePrice() { 

            return $this->servicePrice; 
        } 

        public function setServicePrice($servicePrice) { 

            $this->servicePrice = $servicePrice; 
        } 

        public function getServiceStartDate() { 

            return $this->serviceStartDate; 
        } 

        public function setServiceStartDate($serviceStartDate) { 

            $this->serviceStartDate = $serviceStartDate; 
        } 

        public function getServiceEndDate() { 

            return $this->serviceEndDate; 
        } 

        public function setServiceEndDate($serviceEndDate) { 

            $this->serviceEndDate = $serviceEndDate; 
        } 

        public function getServiceDayList() { 

            return $this->serviceDayList; 
        } 

        public function setServiceDayList($serviceDayList) { 

            $this->serviceDayList = $serviceDayList; 
        } 

        public function getBookingList() { 

            return $this->bookingList;
        } 

        public function setBookingList($bookingList) { 

            $this->bookingList = $bookingList;
        } 

        public function getReviewList() { 

            return $this->reviewList; 
        } 

        public function setReviewList($reviewList) { 

            $this->reviewList = $reviewList; 
        } 

    }
?>