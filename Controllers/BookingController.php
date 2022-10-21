<?php namespace Controllers;

    use Models\Booking as Booking;
    use DAO\BookingDAO as BookingDAO;

    class BookingController {

        private $bookingList;
        private $bookingDAO;
        private $guardian = null;


        public function __construct()
        {
            $this->bookingDAO = new BookingDAO();
        }

        public function list($typeUser = null) {

            require_once ROOT_VIEWS."/mainHeader.php";

            if(strcmp($typeUser, "guardian") == 0) {

                $this->guardian = $this->bookingDAO->getUserName($_SESSION['userName']);
                $this->bookingList = $this->guardian->getBookingList();

                require_once ROOT_VIEWS."/guardianBookingList.php";   

            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/mainFooter.php";


        }




    }
?>