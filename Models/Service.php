<?php namespace Models;

use Models\Guardian as Guardian;
    class Service extends Guardian{
        private $typeOfPet;
        private $size;
        private $day;
        private $price;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null, $cuil = null, $experience = null, $bookingList = null, $reviewList = null, 
        $typeOfPet = null, $size = null, $day = null, $price = null)
        {
                parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firtsName, $lastName, $birthDate, $cuil, $experience, 
                $bookingList, $reviewList);
                $this->typeOfPet = $typeOfPet;
                $this->size = $size;
                $this->dat = $day;
                $this->price = $price;
        }

        /**
         * Get the value of typeOfPet
         */
        public function getTypeOfPet()
        {
                return $this->typeOfPet;
        }

        /**
         * Set the value of typeOfPet
         */
        public function setTypeOfPet($typeOfPet): self
        {
                $this->typeOfPet = $typeOfPet;

                return $this;
        }

        /**
         * Get the value of size
         */
        public function getSize()
        {
                return $this->size;
        }

        /**
         * Set the value of size
         */
        public function setSize($size): self
        {
                $this->size = $size;

                return $this;
        }

        /**
         * Get the value of day
         */
        public function getDay()
        {
                return $this->day;
        }

        /**
         * Set the value of day
         */
        public function setDay($day): self
        {
                $this->day = $day;

                return $this;
        }

        /**
         * Get the value of price
         */
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         */
        public function setPrice($price): self
        {
                $this->price = $price;

                return $this;
        }
    }
?>