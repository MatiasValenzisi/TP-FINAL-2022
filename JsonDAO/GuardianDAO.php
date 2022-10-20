<?php namespace JsonDAO;

    use Models\Guardian as Guardian;

    class GuardianDAO implements IJsonDAO {

        private $guardianList;
        private $fileName = ROOT."JsonDAO/Data/Guardian.json";

        public function addDAO($guardian){  

            $this->retrieveData();

            array_push($this->guardianList, $guardian);

            $this->saveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->guardianList;
        }

        public function deleteDAO($value){

            $this->retrieveData();

            foreach ($this->guardianList as $key => $guardian) {

                if (strcmp($guardian->getToken(), $value) == 0){
                   unset($this->guardianList[$key]);
                   $this->saveData();         
                }               
            } 
        }

        public function getAllDownDateDAO() {

            $this->retrieveData();

            $temporalList = array();

            foreach($this->guardianList as $guardian) {

                if(!is_null($guardian->getDownDate())) {
                    array_push($temporalList, $guardian);
                }
            }
            return $temporalList;
        }

        public function getAllDischargeDateDAO() {

            $this->retrieveData();

            $temporalList = array();

            foreach($this->guardianList as $guardian) {

                if(is_null($guardian->getDownDate()) && !is_null($guardian->getDischargeDate())) {
                    array_push($temporalList, $guardian);
                }
            }
            return $temporalList;
        }

        // Retorna únicamente los usuarios de tipo guardian que tengan todos sus datos cargados.

        public function getAllDischargeDateCompleteDAO(){

            $this->retrieveData();

            $temporalCompleteList = array();

            foreach($this->guardianList as $guardian) {
                
                if(is_null($guardian->getDownDate()) && !is_null($guardian->getDischargeDate()) && !is_null($guardian->getServicePrice()) && !is_null($guardian->getServiceStartDate()) && !is_null($guardian->getServiceEndDate()) && !empty($guardian->getServiceDayList()) && !is_null($guardian->getServiceDayList())){

                    array_push($temporalCompleteList, $guardian);
                }
            }
            return $temporalCompleteList;
        }

        public function getAllPendientDateDAO() {

            $this->retrieveData();

            $temporalList = array();

            foreach($this->guardianList as $guardian) {
                if(is_null($guardian->getDischargeDate())) {
                    array_push($temporalList, $guardian);
                }
            }
            return $temporalList;
        }

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
        }

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