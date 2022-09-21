<?php namespace Models;

    use Models\Multimedia as Multimedia;

    class Video extends Multimedia {
        private $duration;

        public function __construct($format = null, $size = null, $extension = null, $url = null, $duration = null)
        {
            parent::__construct($format, $size, $extension, $url);
            $this->duration = $duration;
        }

        /**
         * Get the value of duration
         */
        public function getDuration()
        {
                return $this->duration;
        }

        /**
         * Set the value of duration
         */
        public function setDuration($duration): self
        {
                $this->duration = $duration;

                return $this;
        }
    }

?>