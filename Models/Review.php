<?php namespace Models;

    class Review {
        private $score;
        private $date;
        private $observations;
        private $guardian;

        public function __construct($score = null, $date = null, $observations = null, $guardian = null)
        {
            $this->score = $score;
            $this->date = $date;
            $this->observations = $observations;
            $this->guardian = $guardian;
        }

        /**
         * Get the value of score
         */
        public function getScore()
        {
                return $this->score;
        }

        /**
         * Set the value of score
         */
        public function setScore($score): self
        {
                $this->score = $score;

                return $this;
        }

        /**
         * Get the value of date
         */
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         */
        public function setDate($date): self
        {
                $this->date = $date;

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
         * Get the value of guardian
         */
        public function getGuardian()
        {
                return $this->guardian;
        }

        /**
         * Set the value of guardian
         */
        public function setGuardian($guardian): self
        {
                $this->guardian = $guardian;

                return $this;
        }
    }
?>