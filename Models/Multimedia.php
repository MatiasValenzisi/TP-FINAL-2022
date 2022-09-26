<?php namespace Models;

    abstract class Multimedia {

        protected $format;
        protected $size;        // Peso.
        protected $extension;
        protected $url;

        public function __construct($format = null, $size = null, $extension = null, $url = null){

            $this->format    = $format;
            $this->size      = $size;
            $this->extension = $extension;
            $this->url       = $url;
        }

        public function getFormat(){
            
            return $this->format;
        }

        public function setFormat($format){
            
            $this->format = $format;
        }

        public function getSize(){
            
            return $this->size;
        }

        public function setSize($size){
            
            $this->size = $size;
        }

        public function getExtension(){
            
            return $this->extension;
        }

        public function setExtension($extension){
            
            $this->extension = $extension;
        }

        public function getUrl(){
           
           return $this->url;
        }

        public function setUrl($url){
            
            $this->url = $url;
        }
    }
?>