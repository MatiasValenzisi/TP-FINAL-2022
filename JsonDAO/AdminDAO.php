<?php namespace JsonDAO;

    use Models\Admin as Admin;

    class AdminDAO implements IJsonDAO {

        private $adminList;
        private $fileName = ROOT."JsonDAO/Data/JsonDao/Admin.json";

        public function addDAO($admin){  

            $this->retrieveData();

            array_push($this->adminList, $admin);

            $this->SaveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->adminList;
        }

        public function deleteDAO($value){

            $this->retrieveData();    

            foreach($this->adminList as $admin){

                if($admin->getToken() == $value){

                    unset($admin);
                }
            }

            $this->saveData();
        }

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->adminList as $admin) {

                $arrayValues["token"]         = $admin->getToken();
                $arrayValues["userName"]      = $admin->getUserName();
                $arrayValues["password"]      = $admin->getPassword();
                $arrayValues["dischargeDate"] = $admin->getDischargeDate();
                $arrayValues["downDate"]      = $admin->getDownDate();
                $arrayValues["firstName"]     = $admin->getFirstName();
                $arrayValues["lastName"]      = $admin->getLastName();
                $arrayValues["birthDate"]     = $admin->getBirthDate();
                $arrayValues["dni"]           = $admin->getDni();
                
                array_push($arrayToEncode, $arrayValues);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        public function retrieveData(){

            $this->adminList = array();

            if(file_exists($this->fileName)){

                $jsonContent = file_get_contents($this->fileName);

                if($jsonContent){

                    $arrayToDecode = json_decode($jsonContent, true);

                } else {

                    $arrayToDecode = array();
                }
                
                foreach($arrayToDecode as $values) {

                    $admin = new Admin();

                    $admin->setToken($values["token"]);
                    $admin->setUserName($values["userName"]);
                    $admin->setPassword($values["password"]);
                    $admin->setDischargeDate($values["dischargeDate"]);
                    $admin->setDownDate($values["downDate"]);
                    $admin->setFirstName($values["firstName"]);
                    $admin->setLastName($values["lastName"]);
                    $admin->setBirthDate($values["birthDate"]);
                    $admin->setDni($values["dni"]);
                    $admin->setBookingList($values["bookingList"]);
                    $admin->setPetList($values["petList"]);
                    $admin->setPaymentsList($values["paymentsList"]);
                    
                    array_push($this->adminList, $admin);
                }
            }
        }
    }
?>