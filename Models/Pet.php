<?php namespace Models;
    
    abstract class Pet {
        private $name;
        private $race;
        private $size;
        private $weight;
        private $observations;
        private $vaccinationPlan;
        private $photo;

        public function __construct($name = null, $race = null, $size = null,$weight=null, $observations = null, $vaccinationPlan = null, $photo = null)
        {
                $this->name = $name;
                $this->race = $race;
                $this->size = $size;
                $this->weight = $weight;
                $this->observations = $observations;
                $this->vaccinationPlan = $vaccinationPlan;
                $this->photo = $photo;
        }
        

        /**
         * Get the value of name
         */
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         */
        public function setName($name): self
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of race
         */
        public function getRace()
        {
                return $this->race;
        }

        /**
         * Set the value of race
         */
        public function setRace($race): self
        {
                $this->race = $race;

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
         * Get the value of observations
         */
        public function getObservations()
        {
                return $this->observations;
        }

        /**
         * Set the value of observations
         */
        public function setObservations($observations): self
        {
                $this->observations = $observations;

                return $this;
        }

        /**
         * Get the value of vaccinationPlan
         */
        public function getVaccinationPlan()
        {
                return $this->vaccinationPlan;
        }

        /**
         * Set the value of vaccinationPlan
         */
        public function setVaccinationPlan($vaccinationPlan): self
        {
                $this->vaccinationPlan = $vaccinationPlan;

                return $this;
        }

        /**
         * Get the value of photo
         */
        public function getPhoto()
        {
                return $this->photo;
        }

        /**
         * Set the value of photo
         */
        public function setPhoto($photo): self
        {
                $this->photo = $photo;

                return $this;
        }

        /**
         * Get the value of weight
         */
        public function getWeight()
        {
                return $this->weight;
        }

        /**
         * Set the value of weight
         */
        public function setWeight($weight): self
        {
                $this->weight = $weight;

                return $this;
        }
    }

?>