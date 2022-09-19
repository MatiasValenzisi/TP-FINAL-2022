<?php namespace Model;
    class Booking {
        private $bookingNumber;
        private $date;

        /**
         * Get the value of bookingNumber
         */
        public function getBookingNumber()
        {
                return $this->bookingNumber;
        }

        /**
         * Set the value of bookingNumber
         */
        public function setBookingNumber($bookingNumber): self
        {
                $this->bookingNumber = $bookingNumber;

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
    }
?>