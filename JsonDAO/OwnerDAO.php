<?php namespace JsonDAO;

    use Models\Owner as Owner;

    class OwnerDAO implements IJsonDAO {

        private $ownerList;
        private $fileName = ROOT."JsonDAO/Data/Owner.json";

        public function addDAO($owner){  

            $this->retrieveData();

            array_push($this->ownerList, $owner);

            $this->SaveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->ownerList;
        }

        public function deleteDAO($value){

            // Dar de baja con downDate = fecha actual.
        }

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->ownerList as $owner) {

                $arrayValues["token"]         = $owner->getToken();
                $arrayValues["userName"]      = $owner->getUserName();
                $arrayValues["password"]      = $owner->getPassword();
                $arrayValues["dischargeDate"] = $owner->getDischargeDate();
                $arrayValues["downDate"]      = $owner->getDownDate();
                $arrayValues["firstName"]     = $owner->getFirstName();
                $arrayValues["lastName"]      = $owner->getLastName();
                $arrayValues["birthDate"]     = $owner->getBirthDate();
                $arrayValues["dni"]           = $owner->getDni();
                $arrayValues["bookingsList"]   = $owner->getBookingList();
                $arrayValues["petList"]       = $owner->getPetList();
                $arrayValues["paymentsList"]  = $owner->getPaymentsList();
                
                array_push($arrayToEncode, $arrayValues);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        public function retrieveData(){

            $this->ownerList = array();

            if(file_exists($this->fileName)){

                $jsonContent = file_get_contents($this->fileName);

                if($jsonContent){

                    $arrayToDecode = json_decode($jsonContent, true);

                } else {

                    $arrayToDecode = array();
                }
                
                foreach($arrayToDecode as $values) {

                    $owner = new Owner();

                    $owner->setToken($values["token"]);
                    $owner->setUserName($values["userName"]);
                    $owner->setPassword($values["password"]);
                    $owner->setDischargeDate($values["dischargeDate"]);
                    $owner->setDownDate($values["downDate"]);
                    $owner->setFirstName($values["firstName"]);
                    $owner->setLastName($values["lastName"]);
                    $owner->setBirthDate($values["birthDate"]);
                    $owner->setDni($values["dni"]);
                    $owner->setBookingsList($values["bookingsList"]);
                    $owner->setPetList($values["petList"]);
                    $owner->setPaymentsList($values["paymentsList"]);
                    
                    array_push($this->ownerList, $owner);
                }
            }
        }
    }
?>