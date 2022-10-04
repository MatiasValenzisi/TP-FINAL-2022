<?php namespace Models;

    class Admin extends User{
        
        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null, $dni = null, $profilePicture = null){

            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firtsName, $lastName, $birthDate, $dni, $profilePicture);
        }
    }
?>