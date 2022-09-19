<?php namespace Models;
    class Pet {
        private $name;
        private $race;
        private $size;
        private $observations;
        private $vaccinationPlan;

        
        public function getName(){return $this->name;}
        public function setName($name): self
        {
                $this->name = $name;

                return $this;
        }

        public function getRace(){return $this->race;}

        public function setRace($race): self
        {
                $this->race = $race;

                return $this;
        }

        public function getSize(){return $this->size;}

        public function setSize($size): self
        {
                $this->size = $size;

                return $this;
        }

        public function getObservations(){return $this->observations;}

        public function setObservations($observations): self
        {
                $this->observations = $observations;

                return $this;
        }

        public function getVaccinationPlan(){return $this->vaccinationPlan;}

        public function setVaccinationPlan($vaccinationPlan): self
        {
                $this->vaccinationPlan = $vaccinationPlan;

                return $this;
        }
    }

?>