<?php namespace JsonDAO;

    use Models\Booking as Booking;

    class BookingDAO implements IJsonDAO {

        private $bookingList;
        private $fileName = ROOT."JsonDAO/Data/Booking.json";

        public function addDAO($booking){  

            $this->retrieveData();

            array_push($this->bookingList, $booking);

            $this->saveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->bookingList;
        }

        public function deleteDAO($value){

            $this->retrieveData();

            foreach ($this->bookingList as $key => $booking) {

                if (strcmp($booking->getToken(), $value) == 0){
                   unset($this->bookingList[$key]);
                   $this->saveData();         
                }               
            } 
        }

        /*
        public function updateDAO($value){

            $this->retrieveData();

            foreach ($this->guardianList as $key => $guardian) {

                if (strcmp($guardian->getToken(), $value->getToken()) == 0){

                    $guardian->setPassword($value->getPassword());
                    $guardian->setProfilePicture($value->getProfilePicture());

                    $guardian->setExperience($value->getExperience()); 
                    $guardian->setServicePrice($value->getServicePrice()); 
                    $guardian->setServiceStartDate($value->getServiceStartDate()); 
                    $guardian->setServiceEndDate($value->getServiceEndDate()); 

                    $guardian->setServiceDayList($value->getServiceDayList()); 
                    $guardian->setBookingList($value->getBookingList()); 
                    $guardian->setReviewList($value->getReviewList()); 

                    $guardian->setDischargeDate($value->getDischargeDate()); 
                    $guardian->setDownDate($value->getDownDate());
                  
                }               
            }

            $this->saveData();
        }*/

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->guardianList as $guardian) {

                $arrayValues["token"]            = $guardian->getToken();
                $arrayValues["userName"]         = $guardian->getUserName();
                $arrayValues["password"]         = $guardian->getPassword();
                $arrayValues["firstName"]        = $guardian->getFirstName();
                $arrayValues["lastName"]         = $guardian->getLastName();
                $arrayValues["birthDate"]        = $guardian->getBirthDate();
                $arrayValues["dni"]              = $guardian->getDni();
                $arrayValues["profilePicture"]   = $guardian->getProfilePicture();

                $arrayValues["experience"]       = $guardian->getExperience();
                $arrayValues["servicePrice"]     = $guardian->getServicePrice();
                $arrayValues["serviceStartDate"] = $guardian->getServiceStartDate();
                $arrayValues["serviceEndDate"]   = $guardian->getServiceEndDate();

                $arrayValues["serviceDayList"]   = $guardian->getServiceDayList();
                $arrayValues["bookingList"]      = $guardian->getBookingList();
                $arrayValues["reviewList"]       = $guardian->getReviewList();

                $arrayValues["dischargeDate"]    = $guardian->getDischargeDate();
                $arrayValues["downDate"]         = $guardian->getDownDate();

                array_push($arrayToEncode, $arrayValues);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        public function retrieveData(){

            $this->guardianList = array();

            if(file_exists($this->fileName)){

                $jsonContent = file_get_contents($this->fileName);

                if($jsonContent){

                    $arrayToDecode = json_decode($jsonContent, true);

                } else {

                    $arrayToDecode = array();
                }
                
                foreach($arrayToDecode as $values) {

                    $guardian = new Guardian();

                    $guardian->setToken($values["token"]);
                    $guardian->setUserName($values["userName"]);
                    $guardian->setPassword($values["password"]);
                    $guardian->setFirstName($values["firstName"]);
                    $guardian->setLastName($values["lastName"]);
                    $guardian->setBirthDate($values['birthDate']);
                    $guardian->setDni($values["dni"]);
                    $guardian->setProfilePicture($values["profilePicture"]);

                    $guardian->setExperience($values["experience"]);
                    $guardian->setServicePrice($values["servicePrice"]);
                    $guardian->setServiceStartDate($values["serviceStartDate"]);
                    $guardian->setServiceEndDate($values["serviceEndDate"]);

                    $guardian->setServiceDayList($values["serviceDayList"]);
                    $guardian->setBookingList($values["bookingList"]);
                    $guardian->setReviewList($values["reviewList"]); 

                    $guardian->setDischargeDate($values["dischargeDate"]);
                    $guardian->setDownDate($values["downDate"]);
                    
                    array_push($this->guardianList, $guardian);
                    
                }
            }
        }

        public function getUserNameDAO($userName){ 

            $this->retrieveData();

            $user = null;

            foreach ($this->guardianList as $value) {

                if(strcmp($value->getUserName(), $userName) == 0){

                    $user = $value;
                }
            }

            return $user;
        }

        public function getUserTokenDAO($token){ 

            $this->retrieveData();

            $guardian = null;

            foreach ($this->guardianList as $value) {

                if(strcmp($value->getToken(), $token) == 0){

                    $guardian = $value;
                }
            }

            return $guardian;
        }    

        public function confirmGuardianDAO($token) {

            $this->retrieveData();

            $this->getUserTokenDAO($token)->setDischargeDate(date("Y-m-d"));

            $this->saveData();
        }

    }
?>