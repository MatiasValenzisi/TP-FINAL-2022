<?php namespace Controllers;
    
    use Models\Booking as Booking;
    use Models\Payment as Payment;
    use DAO\BookingDAO as BookingDAO;
    use DAO\CatDAO as CatDAO;
    use DAO\DogDAO as DogDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\PaymentDAO as PaymentDAO;
    use Controllers\PetController as PetController;
    use \Exception as Exception;

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

        private $petList;
        private $catDAO;
        private $dogDAO;
        private $petController;

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

            $this->petList       = array();       
            $this->catDAO        = new CatDAO();
            $this->dogDAO        = new DogDAO();
            $this->petController = new PetController();
        }
        
        public function list($paymentState) {

            try {

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
                    
                    require_once ROOT_VIEWS."/mainHeader.php";
                    require_once ROOT_VIEWS."/mainNav.php";
                    require_once ROOT_VIEWS."/paymentListPendientView.php";

                } else if (strcmp($paymentState, "paid") == 0){
                    
                    require_once ROOT_VIEWS."/mainHeader.php";
                    require_once ROOT_VIEWS."/mainNav.php";
                    require_once ROOT_VIEWS."/paymentListPaidView.php";

                } else {
                    
                    header("Location: ".FRONT_ROOT); 
                    exit();
                }               

                require_once ROOT_VIEWS."/mainFooter.php";
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }    
        }

        public function pay($tokenPayment, $type = null, $action = null, $specific = null){

            try {

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
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }
        }

        public function payAction($tokenPayment, $expireDate){

            try {

                $dateNow = date("Y-m-d");

                if ($expireDate > $dateNow){

                    $this->paymentDAO->updateDAO($tokenPayment, $dateNow);
                    header("Location: ".FRONT_ROOT."/payment/list/paid");

                } else {

                    header("Location: ".FRONT_ROOT."/payment/pay/".$tokenPayment."/error/pay/date");
                }
                    
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }            
        }
    }
?>