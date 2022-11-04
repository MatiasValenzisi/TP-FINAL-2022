<?php namespace Controllers;

    use Models\Booking as Booking;
    use Models\Payment as Payment;

    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\PaymentDAO as PaymentDAO;

    use Controllers\PetController as PetController;

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

        private $pet;
        private $petController;

        public function __construct(){

            $this->bookingList    = array();
            $this->bookingDAO     = new BookingDAO();
            $this->booking        = null;

            $this->guardianList   = array();
            $this->guardian       = null;
            $this->guardianDAO    = new GuardianDAO();

            $this->owner          = null;
            $this->ownerDAO       = new OwnerDAO();

            $this->ownerList      = array();

            $this->paymentList    = array();            
            $this->payment        = null;
            $this->paymentDAO     = new PaymentDAO();

            $this->pet            = null;
            $this->petController  = new PetController();
        }
        
        public function list($paymentState) {
            
            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";

            $paymentListAux     = $this->paymentDAO->getAllDAO();

            $this->bookingList  = $this->bookingDAO->getAllDAO();
            $this->guardianList = $this->guardianDAO->getAllDAO();
            $this->ownerList    = $this->ownerDAO->getAllDAO();

            $dogList            = $this->dogDAO->getAllDAO();
            $catList            = $this->catDAO->getAllDAO();

            if (!empty($dogList)){

                $this->petList = array_merge($this->petList, $dogList);
            } 

            if (!empty($catList)){

                $this->petList = array_merge($this->petList, $catList);
            }

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

            $this->payment  = $this->paymentDAO->getPaymentTokenDAO($tokenPayment);
            $this->booking  = $this->bookingDAO->getTokenDAO($this->payment->getTokenBooking());
            $this->guardian = $this->guardianDAO->getUserTokenDAO($this->booking->getTokenGuardian());
            $this->owner    = $this->ownerDAO->getUserTokenDAO($this->booking->getTokenOwner());
            $this->pet      = $this->petController->getPetToken($this->booking->getTokenPet());

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/paymentBookingView.php";
            require_once ROOT_VIEWS."/notificationAlert.php";
            require_once ROOT_VIEWS."/mainFooter.php";
        }

        public function payAction($tokenPayment, $expireDate, $type = null, $action = null, $specific = null){
            
            $dateNow = date("Y-m-d");

            if ($expireDate > $dateNow){


            } else {

                header("Location: ".FRONT_ROOT."/payment/pay/".$tokenPayment."/error/pay/date");
            }
        }
    }
?>