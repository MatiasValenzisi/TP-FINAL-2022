<?php namespace Models;
    use Models\User as User;

    abstract class Person extends User{
        private $firtsName;
        private $lastName;
        private $birthDate;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null)
        {
            parent::__construct($token, $userName, $password, $dischargeDate, $downDate);
            $this->firtsName = $firtsName;
            $this->lastName = $lastName;
            $this->birthDate = $birthDate;
        }

        public function getFirtsName() { return $this->firtsName; }

        public function setFirtsName($firtsName): self
        {
                $this->firtsName = $firtsName;

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