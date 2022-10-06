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

        public function deleteDAO($value){

            $this->retrieveData();

            foreach ($this->guardianList as $index => $guardian) {

                if (strcmp($guardian->getToken(), $value) == 0){
                   unset($this->guardianList[$index]);
                   $this->saveData();         
                }               
            } 
        }

        public function updateDAO($value){

            $this->retrieveData();

            foreach ($this->guardianList as $key => $guardian) {

                if (strcmp($guardian->getToken(), $value->getToken()) == 0){

                     $guardian->setPassword($value->getPassword()); 
                     $guardian->setExperience($value->getExperience()); 
                     $guardian->setBookingList($value->getBookingList()); 
                     $guardian->setReviewList($value->getReviewList()); 
                     $guardian->setServiceList($value->getServiceList());                     
                }               
            }

            $this->saveData();
        }

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->guardianList as $guardian) {

                $arrayValues["token"]          = $guardian->getToken();
                $arrayValues["userName"]       = $guardian->getUserName();
                $arrayValues["password"]       = $guardian->getPassword();
                $arrayValues["dischargeDate"]  = $guardian->getDischargeDate();
                $arrayValues["downDate"]       = $guardian->getDownDate();
                $arrayValues["firstName"]      = $guardian->getFirstName();
                $arrayValues["lastName"]       = $guardian->getLastName();
                $arrayValues["birthDate"]      = $guardian->getBirthDate();
                $arrayValues["dni"]            = $guardian->getDni();
                $arrayValues["profilePicture"] = $guardian->getProfilePicture();
                $arrayValues["experience"]     = $guardian->getExperience();
                $arrayValues["bookingList"]    = $guardian->getBookingList();
                $arrayValues["reviewList"]     = $guardian->getReviewList();
                $arrayValues["serviceList"]    = $guardian->getServiceList();
                
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
                    $guardian->setDischargeDate($values["dischargeDate"]);
                    $guardian->setDownDate($values["downDate"]);
                    $guardian->setFirstName($values["firstName"]);
                    $guardian->setLastName($values["lastName"]);
                    $guardian->setBirthDate($values["birthDate"]);
                    $guardian->setDni($values["dni"]);                    
                    $guardian->setProfilePicture($values["profilePicture"]);
                    $guardian->setExperience($values["experience"]);
                    $guardian->setBookingList($values["bookingList"]);
                    $guardian->setReviewList($values["reviewList"]);
                    $guardian->setServiceList($values["serviceList"]);
                    
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