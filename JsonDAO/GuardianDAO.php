<?php namespace JsonDAO;

    use Models\Guardian as Guardian;

    class GuardianDAO implements IJsonDAO {

        private $guardianList;
        private $fileName = ROOT."JsonDAO/Data/Guardian.json";

        public function addDAO($guardian){  

            $this->retrieveData();

            array_push($this->guardianList, $guardian);

            $this->SaveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->guardianList;
        }

        public function deleteDAO($value){

            // Dar de baja con downDate = fecha actual.
        }

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->guardianList as $guardian) {

                $arrayValues["token"]         = $guardian->getToken();
                $arrayValues["userName"]      = $guardian->getUserName();
                $arrayValues["password"]      = $guardian->getPassword();
                $arrayValues["dischargeDate"] = $guardian->getDischargeDate();
                $arrayValues["downDate"]      = $guardian->getDownDate();
                $arrayValues["firstName"]     = $guardian->getFirstName();
                $arrayValues["lastName"]      = $guardian->getLastName();
                $arrayValues["birthDate"]     = $guardian->getBirthDate();
                $arrayValues["dni"]           = $guardian->getDni();
                $arrayValues["experience"]    = $guardian->getExperience();
                $arrayValues["bookingList"]   = $guardian->getBookingList();
                $arrayValues["reviewList"]    = $guardian->getReviewList();
                $arrayValues["serviceList"]   = $guardian->getServiceList();
                
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
                    $guardian->setExperience($values["experience"]);
                    $guardian->setBookingList($values["bookingList"]);
                    $guardian->setReviewList($values["reviewList"]);
                    $guardian->setServiceList($values["serviceList"]);
                    
                    array_push($this->guardianList, $guardian);
                }
            }
        }
    }
?>