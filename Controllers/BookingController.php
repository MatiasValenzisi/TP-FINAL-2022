<?php namespace Controllers;

    use Controllers\PetController as PetController;
    use Models\Booking as Booking;
    use Models\Payment as Payment;
    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\DogDAO as DogDAO;
    use DAO\CatDAO as CatDAO;
    use DAO\PaymentDAO as PaymentDAO;
    use \Exception as Exception;

    class BookingController {

        private $bookingList;
        private $bookingDAO;
        private $booking;

        private $guardianList;        
        private $guardian;
        private $guardianDAO;

        private $owner;
        private $ownerDAO;

        private $petList;
        private $pet;
        private $petController;

        private $dogDAO;
        private $catDAO;

        private $ownerList;

        private $paymentList;
        private $payment;
        private $paymentDAO;

        private $score;
        private $date;
        private $observations;
        private $tokenGuardian;

        private $reviewList;

        public function __construct(){

            $this->bookingList   = array();
            $this->bookingDAO    = new BookingDAO();
            $this->booking       = null;

            $this->guardianList  = array();
            $this->guardian      = null;
            $this->guardianDAO   = new GuardianDAO();

            $this->owner         = null;
            $this->ownerDAO      = new OwnerDAO();

            $this->petList       = array();
            $this->pet           = null;
            $this->petController = new PetController();

            $this->dogDAO        = new DogDAO();            
            $this->catDAO        = new CatDAO();

            $this->ownerList     = array();

            $this->paymentList   = array();            
            $this->payment       = null;
            $this->paymentDAO    = new PaymentDAO();

            $this->score         = null;
            $this->date          = null;
            $this->observations  = null;
            $this->tokenGuardian = null;

            $this->reviewList    = array();
        }

        public function consult($tokenGuardian = null, $type = null, $action = null, $specific = null){

            try {

                $date = array();
                $date = date("m-d-Y").' - '.date("m-d-Y");

                $this->guardian = $this->guardianDAO->getUserTokenDAO($tokenGuardian);

                $nameGuardian   = $this->guardian->getFirstName()." ".$this->guardian->getLastName();
                $nameOwner      = $_SESSION['userPH']->getFirstName()." ".$_SESSION['userPH']->getLastName();

                $this->loadPetList();     

                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/mainNav.php";
                require_once ROOT_VIEWS."/ownerBookingConsultView.php";    
                require_once ROOT_VIEWS."/notificationAlert.php"; 
                require_once ROOT_VIEWS."/mainFooter.php";
                
            } catch (Exception $e) {
                
                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }
        }

        public function consultAction($tokenGuardian, $tokenPet, $serviceDate){

            try {

                $dataNew   = explode(" - ", $serviceDate);

                $startDate = date("m/d/Y", strtotime($dataNew["0"]));
                $startDate = date("Y-m-d", strtotime($startDate));

                $endDate   = date("m/d/Y", strtotime($dataNew["1"]));
                $endDate   = date("Y-m-d", strtotime($endDate));

                $this->pet = $this->petController->getPetToken($tokenPet);

                $this->guardian = $this->guardianDAO->getUserTokenDAO($tokenGuardian);

                if (strcmp($this->pet->getSize(), $this->guardian->getPetSize()) == 0) {

                    if ($this->verifyDate($this->guardian, $startDate, $endDate)){

                        $dateMin = date("Y-m-d", strtotime("+ 7 days")); 

                        if ($startDate >= $dateMin){

                            header("Location: ".FRONT_ROOT."/booking/generate/".$tokenGuardian."/".$tokenPet."/".$startDate."/".$endDate);                

                        } else {

                            header("Location: ".FRONT_ROOT."/booking/consult/".$tokenGuardian."/error/consult/date");
                        } 

                    } else {

                        header("Location: ".FRONT_ROOT."/booking/consult/".$tokenGuardian."/error/consult/guardian");
                    } 

                } else {

                    header("Location: ".FRONT_ROOT."/booking/consult/".$tokenGuardian."/error/consult/pet");
                }
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            }
         }

        // Verificar si en el rango de fechas, trabaja el guardian seleccionado.

        private function verifyDate($guardian, $startDate, $endDate){

            try {

                $dateRangeList = $this->getDateRange($startDate, $endDate);
                $guardianDateList = $this->getDateListGuardian($guardian->getServiceStartDate(), $guardian->getServiceEndDate(), $guardian->getServiceDayList());

                return $this->getCompareDateList($dateRangeList, $guardianDateList);
                
            } catch (Exception $e) {

                throw $e;                
            }
        }

        // Retorna el arreglo de fechas que trabaja el guardian.

        private function getDateListGuardian($dateStart, $dateEnd, $dayList){

            $dateList = array();

            $dateStart = date("Y-m-d", strtotime($dateStart));

            while ($dateStart <= $dateEnd) {

                $day = date('l', strtotime($dateStart));

                foreach ($dayList as $key => $value) {

                    if (strcmp($value, $day) == 0){

                        array_push($dateList, $dateStart);
                    }
                }

                $dateStart = date("Y-m-d", strtotime($dateStart."+ 1 days"));            
            }

            return $dateList;
        }

        // Retorna las fechas de un rango.

        private function getDateRange($dateStart, $dateEnd){

            $dateList = array();

            $dateStart = date("Y-m-d", strtotime($dateStart));

            while ($dateStart <= $dateEnd) {  

                array_push($dateList, $dateStart);
                
                $dateStart = date("Y-m-d", strtotime($dateStart."+ 1 days"));            
            }

            return $dateList;
        } 

        // Retorna verdadero o falso si la lista de fecha dos abarca la lista uno.

        private function getCompareDateList($dateList1, $dateList2){

            $compareDate = true;

            foreach ($dateList1 as $key => $date1) {

                $control = false; 

                foreach ($dateList2 as $key => $date2) {

                    if ($date1 == $date2){

                        $control = true;
                    }
                } 

                if (!$control){

                    $compareDate = false;
                }
            }

            return $compareDate;
        }

        public function generate($tokenGuardian, $tokenPet, $startDate, $endDate){

            try {

                $this->pet      = $this->petController->getPetToken($tokenPet);
                $this->guardian = $this->guardianDAO->getUserTokenDAO($tokenGuardian);

                $cant           = count($this->getDateRange($startDate, $endDate));
                $startDate      = date("Y/m/d", strtotime($startDate));
                $endDate        = date("Y/m/d", strtotime($endDate));
                $priceService   = $this->guardian->getServicePrice();
                $priceTotal     = $priceService * $cant;
               
                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/mainNav.php";
                require_once ROOT_VIEWS."/ownerBookingGenerateView.php";    
                require_once ROOT_VIEWS."/notificationAlert.php"; 
                require_once ROOT_VIEWS."/mainFooter.php";
                
            } catch (Exception $e) {
                
                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");                 
            }
        }

        public function generateAction($tokenGuardian, $tokenPet, $startDate, $endDate, $priceTotal){

            $token = $this->createToken($this->getTokenBookingList());

            $startDate      = date("Y-m-d", strtotime($startDate));
            $endDate        = date("Y-m-d", strtotime($endDate));            

            $this->booking = new Booking ($token, $tokenPet, $startDate, $endDate, $priceTotal, 'Pendiente', $tokenGuardian, $_SESSION['userPH']->getToken());

            $this->bookingDAO->addDAO($this->booking);

            header("Location: ".FRONT_ROOT."/booking/list");   
        }

        public function list($type = null, $action = null, $specific = null, $add = null) {

            try {
            
                $this->loadPetList();

                $this->guardianList = $this->guardianDAO->getAllDAO();
                $this->ownerList    = $this->ownerDAO->getAllDAO();

                if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                    $this->bookingList = $this->bookingDAO->getAllGuardianDAO($_SESSION['userPH']->getToken());
                    
                    require_once ROOT_VIEWS."/mainHeader.php";
                    require_once ROOT_VIEWS."/mainNav.php";
                    require_once ROOT_VIEWS."/guardianBookingListView.php";

                } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                    $this->bookingList = $this->bookingDAO->getAllOwnerDAO($_SESSION['userPH']->getToken());
                    
                    require_once ROOT_VIEWS."/mainHeader.php";
                    require_once ROOT_VIEWS."/mainNav.php";
                    require_once ROOT_VIEWS."/ownerBookingListView.php"; 

                } else {

                    header("Location: ".FRONT_ROOT);
                    exit();   
                }

                require_once ROOT_VIEWS."/notificationAlert.php"; 
                require_once ROOT_VIEWS."/mainFooter.php";  

             } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");                  
             } 
        }
        
        public function update($bookingToken, $action) {

            try {

                if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0 || strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                    $this->booking = $this->bookingDAO->getTokenDAO($bookingToken);

                    $this->guardian = $this->guardianDAO->getUserTokenDAO($this->booking->getTokenGuardian());  

                    $this->loadPetList();  

                    $this->pet = $this->petController->getPetToken($this->booking->getTokenPet()); 

                    if (strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0 && strcmp($action, "Aceptado") == 0){                    

                        $this->bookingList = $this->bookingDAO->getAllGuardianActiveDAO($this->guardian->getToken(), $this->booking->getDateStart(), $this->booking->getDateEnd()); 

                        $dateBookingList = $this->getDateRange($this->booking->getDateStart(), $this->booking->getDateEnd());

                        foreach ($this->bookingList as $key => $bookingAux) {
                    
                            $dateBookingAuxList = $this->getDateRange($bookingAux->getDateStart(), $bookingAux->getDateEnd());
        
                            foreach ($dateBookingList as $key => $dateBooking) {
                                
                                foreach ($dateBookingAuxList as $key => $dateBookingAux) {
                                 
                                    if ($dateBooking == $dateBookingAux){

                                        $petBookingAux = null;

                                        foreach ($this->petList as $key => $pet) {
     
                                            if (strcmp($pet->getToken(), $bookingAux->getTokenPet()) == 0){

                                                $petBookingAux = $pet;
                                            }
                                        }

                                        if (strcmp($this->pet->getRace(), $petBookingAux->getRace()) != 0){

                                            $this->bookingDAO->updateState($bookingToken, "Rechazado");
                                            header("Location: ".FRONT_ROOT."/booking/list/error/update/state/race");
                                            exit();

                                        } else {

                                            if (strcmp(get_class($this->pet), get_class($petBookingAux)) != 0){
                                                                                            
                                                $this->bookingDAO->updateState($bookingToken, "Rechazado");
                                                header("Location: ".FRONT_ROOT."/booking/list/error/update/state/race");
                                                exit();
                                                
                                            } else {

                                                if (strcmp($this->pet->getToken(), $petBookingAux->getToken()) == 0){

                                                    $this->bookingDAO->updateState($bookingToken, "Rechazado");
                                                    header("Location: ".FRONT_ROOT."/booking/list/error/update/state/pet");
                                                    exit();
                                                }
                                            }
                                        }
                                    }
                                }
                            }                        
                        }   

                        $token         = $this->createToken($this->getTokenPaymentList());
                        $tokenBooking  = $this->booking->getToken();
                        $amount        = $this->booking->getPrice() / 2;
                        $dateGenerated = date("Y-m-d");

                        $this->payment = new Payment ($token, $tokenBooking, $amount, $dateGenerated, null, "Cupón de pago");
                        $this->paymentDAO->addDAO($this->payment);                            
                    }

                    $this->bookingDAO->updateState($bookingToken, $action);

                    if (strcmp($action, "Rechazado") == 0 || strcmp($action, "Aceptado") == 0){

                        $nameGuardian = $this->guardian->getFirstName()." ".$this->guardian->getLastName();

                        $subject = "Solicitud de reserva con el guardian ".$nameGuardian." ha sido: ".$action;

                        $email = $this->guardian->getUserName();

                        $date = "desde el ".$this->booking->getDateStart()." al ".$this->booking->getDateEnd();

                        $body = "Solicitud de reserva con el guardian ".$nameGuardian." con fecha ".$date." ha sido: ".$action."<br>";

                        if (strcmp($action,"Aceptado") == 0){

                            $body.= "Se ha cargado ya un cupón de pagó para la reserva.";
                        }

                        require_once ROOT_LIBRARY."/PHPMailer/index.php"; 
                    }

                    header("Location: ".FRONT_ROOT."/booking/list/success/update/booking");                                                         

                } else {

                    header("location: ".FRONT_ROOT);
                }     

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");  
            }
        }

        public function history() { 

            try {

                $this->guardianList = $this->guardianDAO->getAllDAO();
                $this->ownerList    = $this->ownerDAO->getAllDAO();

                $this->reviewList   = $this->bookingDAO->getAllReviewDAO();

                $this->loadPetList();                

                if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                    $this->bookingList = $this->bookingDAO->getAllGuardianDAO($_SESSION['userPH']->getToken());


                } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                    $this->bookingList = $this->bookingDAO->getAllOwnerDAO($_SESSION['userPH']->getToken());
                }
                
                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/mainNav.php";  
                require_once ROOT_VIEWS."/bookingHistoryListView.php";   
                require_once ROOT_VIEWS."/mainFooter.php";  

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown"); 
            } 
        }

        public function review($bookingToken){

            try {

                $this->booking = $this->bookingDAO->getTokenDAO($bookingToken);
                $this->guardian = $this->guardianDAO->getUserTokenDAO($this->booking->getTokenGuardian());  

                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/mainNav.php";  
                require_once ROOT_VIEWS."/reviewBookingView.php";   
                require_once ROOT_VIEWS."/mainFooter.php"; 

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");
            }
        }

        public function reviewAction($guardianToken, $score, $observations = ''){

            try {

                $this->bookingDAO->addReviewDAO($guardianToken, $score, $observations);  

                header("Location: ".FRONT_ROOT."/booking/history");

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");
            }
        }

        /* Carga la lista de mascotas con todas las disponibles */

        private function loadPetList(){

            try {

                $dogList = $this->dogDAO->getAllDAO();
                $catList = $this->catDAO->getAllDAO();
                
                if (!empty($dogList)){

                    $this->petList = array_merge($this->petList, $dogList);
                } 

                if (!empty($catList)){

                    $this->petList = array_merge($this->petList, $catList);
                }

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");
            }
        }  

        public function getTokenBookingList(){ 

            try {

                $tokenList = array();

                $this->bookingList = $this->bookingDAO->getAllDAO();
                
                if($this->bookingList != null) {

                    foreach($this->bookingList as $current) {

                        array_push($tokenList, $current->getToken());
                    }
                }

                return $tokenList; 

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");
            }
        }

        public function getTokenPaymentList(){ 

            try {

                $tokenList = array();

                $this->paymentList = $this->paymentDAO->getAllDAO();
                
                if($this->paymentList != null) {

                    foreach($this->paymentList as $current) {

                        array_push($tokenList, $current->getToken());
                    }
                }
                return $tokenList; 

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/dao/unknown");
            } 
        }

        /* Retorna un nuevo número de token que no haya sido utilizado antes */

        public function createToken($listToken){ 

            $newToken = null;

            do {

                $controller = false;
                $newToken = $this->generateNumber(6);

                foreach($listToken  as $key => $value) {

                   if($newToken == $value){

                      $controller = true;
                    }  
                }
                
            } while($controller);

            return $newToken; 
        }

        /* Retorna un número aleatorio de una cantidad dada */
        
        public function generateNumber($cant){ 

            $key = '';

            for($i=0; $i<$cant; $i++) {
            
                $key .= rand(0,9);
            }     
            return $key; 
        }
    }
?>