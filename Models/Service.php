<?php namespace Model;
    class Service {
        private $typeOfPet;
        private $price;
        private $timetable;
        private $reviews;

        /**
         * Get the value of typeOfPet
         */
        public function getTypeOfPet()
        {
                return $this->typeOfPet;
        }

        /**
         * Set the value of typeOfPet
         */
        public function setTypeOfPet($typeOfPet): self
        {
                $this->typeOfPet = $typeOfPet;

                return $this;
        }

        /**
         * Get the value of price
         */
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         */
        public function setPrice($price): self
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of timetable
         */
        public function getTimetable()
        {
                return $this->timetable;
        }

        /**
         * Set the value of timetable
         */
        public function setTimetable($timetable): self
        {
                $this->timetable = $timetable;

                return $this;
        }

        /**
         * Get the value of reviews
         */
        public function getReviews()
        {
                return $this->reviews;
        }

        /**
         * Set the value of reviews
         */
        public function setReviews($reviews): self
        {
                $this->reviews = $reviews;

                return $this;
        }
    }
?>