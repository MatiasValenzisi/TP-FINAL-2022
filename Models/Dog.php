<?php namespace Models;

    class Dog extends Pet {
        
        public function __construct($name = null, $race = null, $size = null, $observations = null, $vaccinationPlan = null, $photo = null){
            
            parent::__construct($name, $race, $size, $observations, $vaccinationPlan, $photo);
        }
    }
?>