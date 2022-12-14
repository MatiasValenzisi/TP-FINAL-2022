<?php namespace Models;

    class Chat {

        private $date;
        private $trasmitter;
        private $receiver;
        private $message;

        public function __construct($date = null, $trasmitter = null, $receiver = null, $message = null){

            $this->date = $date;
            $this->trasmitter = $trasmitter;
            $this->receiver = $receiver;
            $this->message = $message;
        }  

        public function getDate() { 
            return $this->date; 
        } 

        public function setDate($date) { 
            $this->date = $date; 
        } 

        public function getTrasmitter() { 
            return $this->trasmitter; 
        } 

        public function setTrasmitter($trasmitter) { 
            $this->trasmitter = $trasmitter; 
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