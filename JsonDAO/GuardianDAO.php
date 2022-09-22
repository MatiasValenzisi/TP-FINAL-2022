<?php namespace JsonDAO;

    use Models\Guardian as Guardian;

    class GuardianDAO {
        private $guardianList;
        private $fileName;

        public function __construct(){
            $this->fileName = dirname(__DIR__)."/Data/guardian.json";
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
                
            }
        }

    }
?>