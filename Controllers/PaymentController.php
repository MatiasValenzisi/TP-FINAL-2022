<?php namespace Controllers;

    use Models\Booking as Booking;
    use Models\Payment as Payment;

    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\PaymentDAO as PaymentDAO;

    class PaymentController {

        private $bookingList;
        private $bookingDAO;
        private $booking;

        private $guardianList;        
        private $guardian;
        private $guardianDAO;

        private $owner;
        private $ownerDAO;
        private $ownerList;

        private $paymentList;
        private $payment;
        private $paymentDAO;

        public function __construct(){

            $this->bookingList   = array();
            $this->bookingDAO    = new BookingDAO();
            $this->booking       = null;

            $this->guardianList  = array();
            $this->guardian      = null;
            $this->guardianDAO   = new GuardianDAO();

            $this->owner         = null;
            $this->ownerDAO      = new OwnerDAO();

            $this->ownerList     = array();

            $this->paymentList   = array();            
            $this->payment       = null;
            $this->paymentDAO    = new PaymentDAO();
        }


        
        public function list($paymentState = null) {
            
            require_once ROOT_VIEWS."/mainHeader.php";  

            if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {
                
                $this->bookingList = $this->bookingDAO->getAllOwnerDAO($_SESSION['userPH']->getToken());
                
                foreach($this->bookingList as $booking) {
                    
                    $this->payment = $this->paymentDAO->getPaymentByBookingTokenDAO($booking->getToken());

                    if(strcmp($paymentState, "pendiente") == 0) {

                        if($this->payment->getDateIssued() == null) {
                            array_push($this->paymentList, $this->payment);
                        }  

                    } else if(strcmp($paymentState, "pagado") == 0){

                        if($this->payment->getDateIssued() != null) {
                            array_push($this->paymentList, $this->payment);
                        }  
                    }
                                   
                }

            } else if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                $this->bookingList = $this->bookingDAO->getAllGuardianDAO($_SESSION['userPH']->getToken());
            
                foreach($this->bookingList as $booking) {

                    $this->payment = $this->paymentDAO->getPaymentByBookingTokenDAO($booking->getToken());

                    if(strcmp($paymentState, "pendiente") == 0) {

                        if($this->payment->getDateIssued() == null) {
                            array_push($this->paymentList, $this->payment);
                        }  

                    } else if(strcmp($paymentState, "pagado") == 0){

                        if($this->payment->getDateIssued() != null) {
                            array_push($this->paymentList, $this->payment);
                        }  
                    }
                }
            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/paymentView.php";
            require_once ROOT_VIEWS."/mainFooter.php";

        }

    }
?>