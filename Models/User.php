<?php namespace Models;

    abstract class User {

        private $token;
        private $userName;      // Correo electronico.
        private $password;
        private $dischargeDate; // Fecha de alta.
        private $downDate;      // Fecha de baja.
        private $firstName;
        private $lastName;
        private $birthDate;
        private $dni;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, $firstName = null, $lastName = null, $birthDate = null, $dni = null) {
        
            $this->token         = $token;
            $this->userName      = $userName;
            $this->password      = $password;
            $this->dischargeDate = $dischargeDate;
            $this->downDate      = $downDate;
            $this->firstName     = $firstName;
            $this->lastName      = $lastName;
            $this->birthDate     = $birthDate;
            $this->dni           = $dni;
        }

        public function getToken(){

            return $this->token;
        }

        public function setToken($token){

            $this->token = $token;
        }

        public function getUserName(){

            return $this->userName;
        }

        public function setUserName($userName){
            
            $this->userName = $userName;
        }

        public function getPassword(){
            
            return $this->password;
        }

        public function setPassword($password){
            
            $this->password = $password;
        }

        public function getDischargeDate(){
            
            return $this->dischargeDate;
        }

        public function setDischargeDate($dischargeDate){
            
            $this->dischargeDate = $dischargeDate;
        }

        public function getDownDate(){
            
            return $this->downDate;
        }

        public function setDownDate($downDate){
            
            $this->downDate = $downDate;
        }

        public function getFirstName(){ 

            return $this->firstName; 
        }

        public function setFirstName($firstName){
            
            $this->firstName = $firstName;
        }

        public function getLastName(){ 

            return $this->lastName; 
        }

        public function setLastName($lastName){
            
            $this->lastName = $lastName;
        }

        public function getBirthDate(){ 

            return $this->birthDate; 
        }

        public function setBirthDate($birthDate){

            $this->birthDate = $birthDate;
        }

        public function getDni(){
            
            return $this->dni;
        }
        
        public function setDni($dni){
            
            $this->dni = $dni;
        }
    }
?>