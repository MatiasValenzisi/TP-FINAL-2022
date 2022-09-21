<?php namespace Models;

    class Booking {
        private $initialDate;
        private $finalDate;
        private $initialSchedule; //Horario inicial
        private $finalSchedule; //Horario final
        private $condition; //estado
        private $couponPayment;
        private $remainingPayment;
        private $guardian;
        private $owner;

        public function __construct($initialDate = null, $finalDate = null, $initialSchedule = null, $finalSchedule = null, $condition = null, 
        $couponPayment = null, $remainingPayment = null, $guardian = null, $owner = null)
        {
                $this->initialDate = $initialDate;
                $this->finalDate = $finalDate;
                $this->initialSchedule = $initialSchedule;
                $this->finalSchedule = $finalSchedule;
                $this->condition = $condition;
                $this->couponPayment = $couponPayment;
                $this->remainingPayment = $remainingPayment;
                $this->guardian = $guardian;
                $this->owner = $owner;
        }
      

        /**
         * Get the value of initialDate
         */
        public function getInitialDate()
        {
                return $this->initialDate;
        }

        /**
         * Set the value of initialDate
         */
        public function setInitialDate($initialDate): self
        {
                $this->initialDate = $initialDate;

                return $this;
        }

        /**
         * Get the value of finalDate
         */
        public function getFinalDate()
        {
                return $this->finalDate;
        }

        /**
         * Set the value of finalDate
         */
        public function setFinalDate($finalDate): self
        {
                $this->finalDate = $finalDate;

                return $this;
        }

        /**
         * Get the value of initialSchedule
         */
        public function getInitialSchedule()
        {
                return $this->initialSchedule;
        }

        /**
         * Set the value of initialSchedule
         */
        public function setInitialSchedule($initialSchedule): self
        {
                $this->initialSchedule = $initialSchedule;

                return $this;
        }

        /**
         * Get the value of finalSchedule
         */
        public function getFinalSchedule()
        {
                return $this->finalSchedule;
        }

        /**
         * Set the value of finalSchedule
         */
        public function setFinalSchedule($finalSchedule): self
        {
                $this->finalSchedule = $finalSchedule;

                return $this;
        }

        /**
         * Get the value of condition
         */
        public function getCondition()
        {
                return $this->condition;
        }

        /**
         * Set the value of condition
         */
        public function setCondition($condition): self
        {
                $this->condition = $condition;

                return $this;
        }

        /**
         * Get the value of couponPayment
         */
        public function getCouponPayment()
        {
                return $this->couponPayment;
        }

        /**
         * Set the value of couponPayment
         */
        public function setCouponPayment($couponPayment): self
        {
                $this->couponPayment = $couponPayment;

                return $this;
        }

        /**
         * Get the value of remainingPayment
         */
        public function getRemainingPayment()
        {
                return $this->remainingPayment;
        }

        /**
         * Set the value of remainingPayment
         */
        public function setRemainingPayment($remainingPayment): self
        {
                $this->remainingPayment = $remainingPayment;

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

        /**
         * Get the value of owner
         */
        public function getOwner()
        {
                return $this->owner;
        }

        /**
         * Set the value of owner
         */
        public function setOwner($owner): self
        {
                $this->owner = $owner;

                return $this;
        }
    }
?>