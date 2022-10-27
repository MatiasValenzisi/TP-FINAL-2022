<?php namespace Controllers;

    use Controllers\PetController as PetController;

    use Models\Booking as Booking;

    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\DogDAO as DogDAO;
    use DAO\CatDAO as CatDAO;

    class BookingController {

        private $bookingList;
        private $bookingDAO;
        private $booking;
        private $guardian;
        private $guardianDAO;
        private $owner;
        private $ownerDAO;
        private $pet;
        private $petList;
        private $petController;
        private $dogDAO;
        private $catDAO;
        private $ownerList;
        private $guardianList;

        public function __construct(){

            $this->bookingList   = array();
            $this->bookingDAO    = new BookingDAO();
            $this->booking       = null;
            $this->guardian      = null;
            $this->guardianDAO   = new GuardianDAO();
            $this->owner         = null;
            $this->ownerDAO      = new OwnerDAO();
            $this->pet           = null;
            $this->petList       = array();
            $this->petController = new PetController();
            $this->dogDAO        = new DogDAO();            
            $this->catDAO        = new CatDAO();
            $this->ownerList     = array();
            $this->guardianList     = array();
        }

        public function consult($tokenGuardian = null, $type = null, $action = null, $specific = null){

            $date = array();
            $date = date("m-d-Y").' - '.date("m-d-Y");

            $this->guardian = $this->guardianDAO->getUserTokenDAO($tokenGuardian);

            $nameGuardian   = $this->guardian->getFirstName()." ".$this->guardian->getLastName();
            $nameOwner      = $_SESSION['userPH']->getFirstName()." ".$_SESSION['userPH']->getLastName();

            $dogList = $this->dogDAO->getAllDAO();
            $catList = $this->catDAO->getAllDAO();
            
            if (!empty($dogList)){

                $this->petList = array_merge($this->petList, $dogList);
            } 

            if (!empty($catList)){

                $this->petList = array_merge($this->petList, $catList);
            }     

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            require_once ROOT_VIEWS."/ownerBookingConsultView.php";    
            require_once ROOT_VIEWS."/notificationAlert.php"; 
            require_once ROOT_VIEWS."/mainFooter.php";
        }

        public function consultAction($tokenGuardian, $tokenPet, $serviceDate){

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
         }

        // Verificar si en el rango de fechas, trabaja el guardian seleccionado.

        private function verifyDate($guardian, $startDate, $endDate){

            $dateRangeList = $this->getDateRange($startDate, $endDate);
            $guardianDateList = $this->getDateListGuardian($guardian->getServiceStartDate(), $guardian->getServiceEndDate(), $guardian->getServiceDayList());

            return $this->getCompareDateList($dateRangeList, $guardianDateList);
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
        }

        public function generateAction($tokenGuardian, $tokenPet, $startDate, $endDate, $priceTotal){

            $token = $this->createToken($this->getTokenBookingList());

            $startDate      = date("Y-m-d", strtotime($startDate));
            $endDate        = date("Y-m-d", strtotime($endDate));            

            $this->booking = new Booking ($token, $tokenPet, $startDate, $endDate, $priceTotal, 'Pendiente', null, null, $tokenGuardian, $_SESSION['userPH']->getToken());

            $this->bookingDAO->addDAO($this->booking);

            header("Location: ".FRONT_ROOT."/booking/list");   
        }

        public function list($type = null, $action = null, $specific = null) { 

            require_once ROOT_VIEWS."/mainHeader.php";
            require_once ROOT_VIEWS."/mainNav.php";
            
            $dogList = $this->dogDAO->getAllDAO();
            $catList = $this->catDAO->getAllDAO();
            
            if (!empty($dogList)){

                $this->petList = array_merge($this->petList, $dogList);
            } 

            if (!empty($catList)){

                $this->petList = array_merge($this->petList, $catList);
            }

            $this->guardianList = $this->guardianDAO->getAllDAO();
            $this->ownerList    = $this->ownerDAO->getAllDAO();

            if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                $this->bookingList = $this->bookingDAO->getAllGuardianDAO($_SESSION['userPH']->getToken());

                require_once ROOT_VIEWS."/guardianBookingListView.php";   

            } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                $this->bookingList = $this->bookingDAO->getAllOwnerDAO($_SESSION['userPH']->getToken());

                require_once ROOT_VIEWS."/ownerBookingListView.php";   
            }

            require_once ROOT_VIEWS."/notificationAlert.php"; 
            require_once ROOT_VIEWS."/mainFooter.php"; 
        }
        
        public function update($bookingToken, $action) {

            if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0 || strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {
                
                $control = true;

                // Entra en este control si es un usuario de Tipo Guardian que quiere actualizar el estado de una reserva a "Aceptado".

                if (strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0 && strcmp($action, "Aceptado") == 0){

                    // Reserva en estado pendiente.

                    $this->booking     = $this->bookingDAO->getTokenDAO($bookingToken);

                    // Guardian de la reserva pendiente.

                    $this->guardian    = $this->guardianDAO->getUserTokenDAO($this->booking->getTokenGuardian());                    

                    // Listado de guardianes dados de alta y no dados de baja.

                    $guardianList = $this->guardianDAO->getAllDischargeDateDAO();

                    // Se cargan todas las mascotas posibles dentro de una lista de mascotas.

                    $dogList = $this->dogDAO->getAllDAO();
                    $catList = $this->catDAO->getAllDAO();
                    
                    if (!empty($dogList)){

                        $this->petList = array_merge($this->petList, $dogList);
                    } 

                    if (!empty($catList)){

                        $this->petList = array_merge($this->petList, $catList);
                    }     

                    // Mascota de la reserva pendiente.   

                    $this->pet  = $this->petController->getPetToken($this->booking->getTokenPet());   

                    // Listado de reservas activas de un guardian. (Reservas en estado Aceptado).

                    $this->bookingList = $this->bookingDAO->getAllGuardianActiveDAO($this->guardian->getToken()); 

                    // Fechas de la reserva pendiente.

                    $dateBookingList = $this->getDateRange($this->booking->getDateStart(), $this->booking->getDateEnd());

                    foreach ($this->bookingList as $key => $bookingAux) {

                        // Fechas de la reserva bookingAux.
                        
                        $dateBookingAuxList = $this->getDateRange($bookingAux->getDateStart(), $bookingAux->getDateEnd());

                        // Se verifican todas las fechas de las dos reservas si coinciden en algun caso.              

                        foreach ($dateBookingList as $key => $dateBooking) {
                            
                            foreach ($dateBookingAuxList as $key => $dateBookingAux) {
                             
                                if ($dateBooking == $dateBookingAux){

                                    $petBookingAux = null;

                                    foreach ($this->petList as $key => $pet) {
                                        
                                        // Se carga el objeto mascota de bookingAux.

                                        if (strcmp($pet->getToken(), $bookingAux->getTokenPet()) == 0){

                                            $petBookingAux = $pet;
                                        }
                                    }

                                    if (strcmp($this->pet->getRace(), $petBookingAux->getRace()) != 0){

                                        $control = false;

                                    }
                                }
                            }
                        }                        
                    }
           
                }

                if ($control) {

                    $this->booking = $this->bookingDAO->updateState($bookingToken, $action);
                    header("Location: ".FRONT_ROOT."/booking/list/success/update/booking");  

                } else {

                    header("Location: ".FRONT_ROOT."/booking/list/error/update/booking");
                }

            } else {

                header("location: ".FRONT_ROOT);
            }
        } 

        // pausado hasta definir tipos de estado de la reserva!!

        public function history() { 
            
            $dogList = $this->dogDAO->getAllDAO();
            $catList = $this->catDAO->getAllDAO();
            
            if (!empty($dogList)){

                $this->petList = array_merge($this->petList, $dogList);
            } 

            if (!empty($catList)){

                $this->petList = array_merge($this->petList, $catList);
            }

            $this->guardianList = $this->guardianDAO->getAllDAO();
            $this->ownerList    = $this->ownerDAO->getAllDAO();

            require_once ROOT_VIEWS."/mainHeader.php";

            if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                $this->bookingList = $this->bookingDAO->getAllGuardianDAO($_SESSION['userPH']->getToken());


            } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                $this->bookingList = $this->bookingDAO->getAllOwnerDAO($_SESSION['userPH']->getToken());

            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/bookingHistoryListView.php";   
            require_once ROOT_VIEWS."/mainFooter.php";

        }  

        public function getTokenBookingList(){ 

            $tokenList = array();

            $this->bookingList = $this->bookingDAO->getAllDAO();
            
            if($this->bookingList != null) {

                foreach($this->bookingList as $current) {

                    array_push($tokenList, $current->getToken());
                }
            }
            return $tokenList; 
        } 

        /* Retorna un nuevo número de token que no haya sido utilizado antes */

        public function createToken($bookingListToken){ 

            $newToken = null;

            do {

                $controller = false;
                $newToken = $this->generateNumber(6);

                foreach($bookingListToken  as $key => $value) {

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