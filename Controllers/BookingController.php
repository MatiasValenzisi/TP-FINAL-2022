<?php namespace Controllers;

    use Models\Booking as Booking;
    use DAO\BookingDAO as BookingDAO;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\DogDAO as DogDAO;
    use DAO\CatDAO as CatDAO;

    class BookingController {

        private $bookingList;
        private $bookingDAO;
        private $guardian;
        private $guardianDAO;
        private $owner;
        private $ownerDAO;
        private $pet;
        private $petList;
        private $dogDAO;
        private $catDAO;

        public function __construct(){

            $this->bookingList = array();
            $this->bookingDAO  = new BookingDAO();
            $this->guardian    = null;
            $this->guardianDAO = new GuardianDAO();
            $this->owner       = null;
            $this->ownerDAO    = new OwnerDAO();
            $this->pet         = null;
            $this->petList     = array();
            $this->dogDAO      = new DogDAO();            
            $this->catDAO      = new CatDAO();
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

        public function consultAction($tokenGuardian, $tokenPet, $reservation){

            $dataNew   = explode(" - ", $reservation);

            $startDate = date("m/d/Y", strtotime($dataNew["0"]));
            $startDate = date("Y-m-d", strtotime($startDate));

            $endDate   = date("m/d/Y", strtotime($dataNew["1"]));
            $endDate   = date("Y-m-d", strtotime($endDate));

            if ($this->guardianList = $this->verifyDate($tokenGuardian, $startDate, $endDate)){

                $dateMin = date("Y-m-d", strtotime("+ 7 days")); 

                if ($startDate >= $dateMin){

                    header("Location: ".FRONT_ROOT."/booking/generate/".$tokenGuardian."/".$tokenPet."/".$startDate."/".$endDate);                

                } else {

                    header("Location: ".FRONT_ROOT."/booking/consult/".$tokenGuardian."/generate/error/verify/date");
                } 

            } else {

                header("Location: ".FRONT_ROOT."/booking/consult/".$tokenGuardian."/generate/error/verify/guardian");
            }  
        }

        // Verificar si en el rango de fechas, trabaja el guardian seleccionado.

        private function verifyDate($tokenGuardian, $startDate, $endDate){

            return true;
        }

        public function generate($tokenGuardian, $tokenPet, $startDate, $endDate){

            echo "Confirmar realización de reserva...";
        }

        public function generateAction(){

            echo "Crear realizacion de reserva...";
        }

        public function list($typeUser = null) { 

            echo "Listar reservas actuales...";


        /*  require_once ROOT_VIEWS."/mainHeader.php";

            if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {

                $this->guardian = $this->guardianDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->guardian->getBookingList();

                require_once ROOT_VIEWS."/guardianBookingListView.php";   

            } else if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) {

                $this->owner = $this->ownerDAO->getUserNameDAO($_SESSION['userPH']->getToken());
                $this->bookingList = $this->owner->getBookingList();

                require_once ROOT_VIEWS."/ownerBookingListView.php";   
            }

            require_once ROOT_VIEWS."/mainNav.php";  
            require_once ROOT_VIEWS."/mainFooter.php"; */
        }

        // pausado hasta definir tipos de estado de la reserva!!

        public function history() { 

            echo "Mostrar historial de reservas...";

        /*  require_once ROOT_VIEWS."/mainHeader.php";

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

            */
        }    
    }
?>