<?php namespace Models;

    class Dog extends Pet {
        
        public function __construct($token = null, $tokenOwner = null, $name = null, $race = null, $size = null, $weight = null, $observations = null, $vaccinationPlan = null, $photo = null, $video = null){
            
            parent::__construct($token, $tokenOwner, $name, $race, $size,$weight, $observations, $vaccinationPlan, $photo, $video);
        }
    }
?>