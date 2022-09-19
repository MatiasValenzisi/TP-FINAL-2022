<?php
    namespace Model;

    class Guardian {
        private $cuil;
        private $experience;

        public function getCuil() {return "23" . $this->cuil . "9"; }

        public function getExperience(){return $this->experience;}

        public function setExperience($experience): self
        {
                $this->experience = $experience;

                return $this;
        }
    }
?>