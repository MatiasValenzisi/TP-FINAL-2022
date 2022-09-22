<?php namespace Models;

    abstract class User {
        private $token;
        private $userName; //Email
        private $password;
        private $dischargeDate; //Fecha de alta
        private $downDate; //Fecha de baja
        private $firstName;
        private $lastName;
        private $birthDate;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, $firstName = null, $lastName = null, $birthDate = null) {
        
            $this->token = $token;
            $this->userName = $userName;
            $this->password = $password;
            $this->dischargeDate = $dischargeDate;
            $this->downDate = $downDate;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthDate = $birthDate;
        }

        public function getToken()
        {
                return $this->token;
        }

        public function setToken($token): self
        {
                $this->token = $token;

                return $this;
        }

        public function getUserName()
        {
                return $this->userName;
        }

        public function setUserName($userName): self
        {
                $this->userName = $userName;

                return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password): self
        {
                $this->password = $password;

                return $this;
        }

        public function getDischargeDate()
        {
                return $this->dischargeDate;
        }

        public function setDischargeDate($dischargeDate): self
        {
                $this->dischargeDate = $dischargeDate;

                return $this;
        }

        public function getDownDate()
        {
                return $this->downDate;
        }

        public function setDownDate($downDate): self
        {
                $this->downDate = $downDate;

                return $this;
        }

        public function getFirstName() { return $this->firstName; }

        public function setFirstName($firstName): self
        {
                $this->firstName = $firstName;

                return $this;
        }

        public function getLastName() { return $this->lastName; }

        public function setLastName($lastName): self
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function getBirthDate() { return $this->birthDate; }

        public function setBirthDate($birthDate): self
        {
                $this->birthDate = $birthDate;

                return $this;
        }
    }

?>