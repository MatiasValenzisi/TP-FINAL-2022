<?php namespace Models;
    use Models\Person as Person;

    class Admin extends Person{
        private $dni;

        public function __construct($token = null, $userName = null, $password = null, $dischargeDate = null, $downDate = null, 
        $firtsName = null, $lastName = null, $birthDate = null, $dni)
        {
            parent::__construct($token, $userName, $password, $dischargeDate, $downDate, $firtsName, $lastName, $birthDate);
            $this->dni = $dni;
        }


        /**
         * Get the value of dni
         */
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         */
        public function setDni($dni): self
        {
                $this->dni = $dni;

                return $this;
        }
    }
?>