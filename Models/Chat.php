<?php namespace Models;

    class Chat {

        private $date;
        private $transmitter;
        private $receiver;
        private $message;

        public function __construct($date = null, $transmitter = null, $receiver = null, $message = null){

            $this->date = $date;
            $this->transmitter = $transmitter;
            $this->receiver = $receiver;
            $this->message = $message;
        }  

        public function getDate() { 
            return $this->date; 
        } 

        public function setDate($date) { 
            $this->date = $date; 
        } 

        public function getTransmitter() { 
            return $this->transmitter; 
        } 

        public function setTransmitter($transmitter) { 
            $this->transmitter = $transmitter; 
        } 

        public function getReceiver() { 
            return $this->receiver; 
        } 

        public function setReceiver($receiver) { 
            $this->receiver = $receiver; 
        } 

        public function getMessage() { 
            return $this->message; 
        } 

        public function setMessage($message) { 
            $this->message = $message; 
        } 
    }
?>