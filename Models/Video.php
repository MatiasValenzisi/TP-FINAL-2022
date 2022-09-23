<?php namespace Models;

    class Video extends Multimedia {

        private $duration;

        public function __construct($format = null, $size = null, $extension = null, $url = null, $duration = null){
            
            parent::__construct($format, $size, $extension, $url);

            $this->duration = $duration;
        }

        public function getDuration(){

            return $this->duration;
        }

        public function setDuration($duration){
            
            $this->duration = $duration;
        }
    }
?>