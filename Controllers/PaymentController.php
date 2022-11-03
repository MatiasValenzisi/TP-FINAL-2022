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
        
        public function list($paymentState) {
            
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";

            $paymentListAux    = $this->paymentDAO->getAllDAO();
            $this->bookingList = $this->bookingDAO->getAllDAO();
                
            foreach ($paymentListAux as $key => $payment) {
                    
                if(strcmp($paymentState, "pendient") == 0 && is_null($payment->getDateIssued())) {

                    array_push($this->paymentList, $payment);

                } else if(strcmp($paymentState, "paid") == 0 && !is_null($payment->getDateIssued())) { 

                    array_push($this->paymentList, $payment);
                } 
            }

            if(strcmp($paymentState, "pendient") == 0) {

                require_once ROOT_VIEWS."/paymentListPendientView.php";

            } else if (strcmp($paymentState, "paid") == 0){

                require_once ROOT_VIEWS."/paymentListPaidView.php";
            }                

            require_once ROOT_VIEWS."/mainFooter.php";
        }

        public function pay($tokenPayment){

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/paymentBookingView.php";
            require_once ROOT_VIEWS."/mainFooter.php";

        }
    }
?>