<?php namespace Models;

    class Photo extends Multimedia {
         
        public function __construct($format = null, $size = null, $extension = null, $url = null){
            
            parent::__construct($format, $size, $extension, $url);
        }
    }
?>