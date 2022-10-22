<?php namespace Controllers;

    use Models\Booking as Booking;
    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;

    class BookingController {

        private $bookingList;
        private $bookingDAO;
        private $guardian;
        private $guardianDAO;
        private $owner;
        private $ownerDAO;


        public function __construct()
        {
            $this->bookingDAO = new BookingDAO();
            $this->guardianDAO = new GuardianDAO();
            $this->ownerDAO = new OwnerDAO();
        }

        public function list($typeUser = null) {

            require_once ROOT_VIEWS."/mainHeader.php";

            if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                $this->guardian = $this->guardianDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->guardian->getBookingList();

                require_once ROOT_VIEWS."/guardianBookingList.php";   

            } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                $this->owner = $this->ownerDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->owner->getBookingList();

                require_once ROOT_VIEWS."/ownerBookingList.php";   
            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/mainFooter.php";


        }

        /* pausado hasta definir tipos de estado de la reserva!!

        public function history() {
            
            require_once ROOT_VIEWS."/mainHeader.php";

            if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                $this->guardian = $this->guardianDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->guardian->getBookingHistoryList();

                require_once ROOT_VIEWS."/guardianBookingList.php";   

            } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                $this->owner = $this->ownerDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->owner->getBookingList();

                require_once ROOT_VIEWS."/ownerBookingList.php";   
            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/mainFooter.php";
        }
        */



    }
?>