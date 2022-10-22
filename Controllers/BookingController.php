<?php namespace Controllers;

    use Models\Booking as Booking;
    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;

    class BookingController {

        private $bookingList;
        private $bookingDAO;
        private $guardian;
        private $guardianDAO;


        public function __construct()
        {
            $this->bookingDAO = new BookingDAO();
            $this->guardianDAO = new GuardianDAO;
        }

        public function list($typeUser = null) {

            require_once ROOT_VIEWS."/mainHeader.php";

            if(strcmp($typeUser, "guardian") == 0) {

                $this->guardian = $this->guardianDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->guardian->getBookingList();

                require_once ROOT_VIEWS."/guardianBookingList.php";   

            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/mainFooter.php";


        }




    }
?>