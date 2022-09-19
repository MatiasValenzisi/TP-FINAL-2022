<?php
    namespace Model;

    class Person {
        private $user;
        private $password;
        private $name;
        private $lastName;
        private $dni;
        private $age;

        public function getUser(){return $this->user;}
        public function setUser($user): self
        {
                $this->user = $user;

                return $this;
        }
        public function getPassword(){return $this->password;}
        public function setPassword($password): self
        {
                $this->password = $password;

                return $this;
        }
        
        public function getName(){return $this->name;}
        public function getLastname(){return $this->lastName;}
        public function getAge(){return $this->age;}
        public function getDni(){return $this->dni;}
    }
?>