<?php namespace Models;

    class Cat extends Pet {
        
        public function __construct($token = null, $tokenOwner = null, $name = null, $race = null, $size = null, $observations = null, $vaccinationPlan = null, $photo = null, $video = null){
            
            parent::__construct($token, $tokenOwner, $name, $race, $size, $observations, $vaccinationPlan, $photo, $video);
        }
    }
?>