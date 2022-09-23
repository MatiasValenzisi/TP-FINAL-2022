<?php namespace Models;

    class Admin extends User{

        private $dni;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null, $dni = null){

            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firtsName, $lastName, $birthDate);
            
            $this->dni = $dni;
        }

        public function getDni(){

            return $this->dni;
        }

        public function setDni($dni){  

            $this->dni = $dni;
        }
    }
?>