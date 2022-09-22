<?php namespace Models;
    use Models\User as User;

    class Guardian extends User {
        private $cuil;
        private $experience;
        private $bookingList;
        private $reviewList;
        private $serviceList;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null, $cuil = null, $experience = null, $bookingList = null, $reviewList = null)
        {
            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firtsName, $lastName, $birthDate);
            $this->cuil = $cuil;
            $this->experience = $experience;
            $this->bookingList = $bookingList;
            $this->reviewList = $reviewList;
        }
        

        /**
         * Get the value of cuil
         */
        public function getCuil()
        {
                return $this->cuil;
        }

        /**
         * Set the value of cuil
         */
        public function setCuil($cuil): self
        {
                $this->cuil = $cuil;

                return $this;
        }

        /**
         * Get the value of experience
         */
        public function getExperience()
        {
                return $this->experience;
        }

        /**
         * Set the value of experience
         */
        public function setExperience($experience): self
        {
                $this->experience = $experience;

                return $this;
        }

        /**
         * Get the value of bookingList
         */
        public function getBookingList()
        {
                return $this->bookingList;
        }

        /**
         * Set the value of bookingList
         */
        public function setBookingList($bookingList): self
        {
                $this->bookingList = $bookingList;

                return $this;
        }

        /**
         * Get the value of reviewList
         */
        public function getReviewList()
        {
                return $this->reviewList;
        }

        /**
         * Set the value of reviewList
         */
        public function setReviewList($reviewList): self
        {
                $this->reviewList = $reviewList;

                return $this;
        }

        /**
         * Get the value of serviceList
         */
        public function getServiceList()
        {
                return $this->serviceList;
        }

        /**
         * Set the value of serviceList
         */
        public function setServiceList($serviceList): self
        {
                $this->serviceList = $serviceList;

                return $this;
        }
    }
?>