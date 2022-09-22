<?php namespace JsonDAO;

    use Models\Guardian as Guardian;

    class GuardianDAO {
        private $guardianList;
        private $fileName;

        public function __construct(){
            $this->fileName = dirname(ROOT)."/Data/JsonDao/Guardian.json";
        }

        public function Add(Guardian $guardian) {
            $this->RetrieveData();
            array_push($this->guardianList, $guardian);
            $this->SaveDate();
        }

        public function GetAll() { 
            $this->RetrieveData();
            return $this->guardianList;
        }

        public function SaveDate() {
            $arrayToEncode = array();

            foreach($this->guardianList as $guardian) {
                $arrayValues["token"] = $guardian->getToken();
                $arrayValues["userName"] = $guardian->getUserName();
                $arrayValues["password"] = $guardian->getPassword();
                $arrayValues["dischargeDate"] = $guardian->getDischargeDate();
                $arrayValues["downDate"] = $guardian->getDownDate();
                $arrayValues["firtsName"] = $guardian->getFirtsName();
                $arrayValues["lastName"] = $guardian->getLastName();
                $arrayValues["birthDate"] = $guardian->getBirthDate();
                $arrayValues["cuil"] = $guardian->getCuil();
                $arrayValues["experience"] = $guardian->getExperience();
                $arrayValues["bookingList"] = $guardian->getBookingList();
                $arrayValues["reviewList"] = $guardian->getReviewList();
                $arrayValues["serviceList"] = $guardian->getServiceList();
                
                array_push($arrayToEncode, $arrayValues);
            }
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        public function RetrieveData() {
            $this->guardianList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                if($jsonContent) {
                    $arrayToDecode = json_decode($jsonContent, true);
                } else{
                    $arrayToDecode = array();
                }
                
                foreach($arrayToDecode as $values) {
                    $guardian = new Guardian();
                    $guardian->setToken($values["token"]);
                    $guardian->setUserName($values["userName"]);
                    $guardian->setPassword($values["password"]);
                    $guardian->setDischargeDate($values["dischargeDate"]);
                    $guardian->setDownDate($values["downDate"]);
                    $guardian->setFirtsName($values["firtsName"]);
                    $guardian->setLastName($values["lastName"]);
                    $guardian->setBirthDate($values["birthDate"]);
                    $guardian->setCuil($values["cuil"]);
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