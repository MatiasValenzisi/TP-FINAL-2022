<?php namespace Model;
    //use Models\Person as Person;

    class Guardian extends Person{
        private $cuil;
        private $experience;

        public function __construct($cuil = null, $experience = null, )
        {
            parent::__construct();
            $this->$cuil = $cuil;
            $this->$experience = $experience;
        }

        public function getCuil() {return "23" . $this->cuil . "9"; }

        public function getExperience(){return $this->experience;}

        public function setExperience($experience): self
        {
                $this->experience = $experience;

                return $this;
        }
    }
?>