<?php namespace Models;

    abstract class Multimedia {
        private $format;
        private $size; //peso
        private $extension;
        private $url;

        public function __construct($format = null, $size = null, $extension = null, $url = null)
        {
            $this->format = $format;
            $this->size = $size;
            $this->extension = $extension;
            $this->url = $url;
        }

        /**
         * Get the value of format
         */
        public function getFormat()
        {
                return $this->format;
        }

        /**
         * Set the value of format
         */
        public function setFormat($format): self
        {
                $this->format = $format;

                return $this;
        }

        /**
         * Get the value of size
         */
        public function getSize()
        {
                return $this->size;
        }

        /**
         * Set the value of size
         */
        public function setSize($size): self
        {
                $this->size = $size;

                return $this;
        }

        /**
         * Get the value of extension
         */
        public function getExtension()
        {
                return $this->extension;
        }

        /**
         * Set the value of extension
         */
        public function setExtension($extension): self
        {
                $this->extension = $extension;

                return $this;
        }

        /**
         * Get the value of url
         */
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         */
        public function setUrl($url): self
        {
                $this->url = $url;

                return $this;
        }
    }
?>