<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Guardian as Guardian;

    class GuardianDAO implements IDAO{
        
        private $connection;
        private $tableName  = "guardian";
        private $tableName2 = "guardian_x_day";

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (userName, token, password, firstName, lastName, birthDate, dni, profilePicture, experience, petSize, servicePrice) VALUES (:userName, :token, :password, :firstName, :lastName, :birthDate, :dni, :profilePicture, :experience, :petSize, :servicePrice)";

                $parameters["userName"]       = $value->getUserName();
                $parameters["token"]          = $value->getToken();
                $parameters["password"]       = $value->getPassword();
                $parameters["firstName"]      = $value->getFirstName();
                $parameters["lastName"]       = $value->getLastName();
                $parameters["birthDate"]      = $value->getBirthDate();
                $parameters["dni"]            = $value->getDni();
                $parameters["profilePicture"] = $value->getProfilePicture();
                $parameters["experience"]     = $value->getExperience();
                $parameters["petSize"]        = $value->getPetSize();
                $parameters["servicePrice"]   = $value->getServicePrice();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }  
        }

        public function getAllDAO(){

            try {

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayGuardianDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e){

                throw $e;
            }            
        }

        public function getAllDownDateDAO(){            

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".downDate IS NOT NULL";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayGuardianDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e) {
            
                throw $e;
            }
        }

        public function getAllDischargeDateDAO(){

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".dischargeDate IS NOT NULL AND ".$this->tableName.".downDate IS NULL";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayGuardianDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e) {

                throw $e;
            }
        }

        // Retorna únicamente los usuarios de tipo guardian que tengan todos sus datos cargados.

        public function getAllDischargeDateCompleteDAO(){            

            try {

                $query = "SELECT * FROM ".$this->tableName."

                WHERE ".$this->tableName.".dischargeDate IS NOT NULL 

                AND ".$this->tableName.".downDate IS NULL 

                AND ".$this->tableName.".servicePrice IS NOT NULL 

                AND ".$this->tableName.".serviceStartDate IS NOT NULL

                AND ".$this->tableName.".serviceEndDate IS NOT NULL";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayGuardianDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e) {

                throw $e;
            }            
        }

        public function getAllPendientDateDAO(){    

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".dischargeDate IS NULL;";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayGuardianDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e) {

                throw $e;
            }
        }

        public function confirmGuardianDAO($token){

            try {

                $query = "UPDATE ".$this->tableName." SET dischargeDate = :dischargeDate WHERE ".$this->tableName.".token = :token";
                $parameters["token"] = $token;
                $parameters["dischargeDate"] = date("Y-m-d");
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e) {

                throw $e;
            }
        }

        public function deleteDAO($token){ 

            try {

                $query = "DELETE FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";
                $parameters["token"] = $token;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch(Exception $e){

                throw $e;
            }
        }

        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET password = :password, profilePicture = :profilePicture, experience = :experience, petSize = :petSize, servicePrice = :servicePrice, serviceStartDate = :serviceStartDate, serviceEndDate = :serviceEndDate, dischargeDate = :dischargeDate, downDate = :downDate WHERE ".$this->tableName.".token = :token";
                $parameters["token"]            = $value->getToken();
                $parameters["password"]         = $value->getPassword();
                $parameters["profilePicture"]   = $value->getProfilePicture();
                $parameters["experience"]       = $value->getExperience();
                $parameters["petSize"]          = $value->getPetSize();
                $parameters["servicePrice"]     = $value->getServicePrice();
                $parameters["serviceStartDate"] = $value->getServiceStartDate();
                $parameters["serviceEndDate"]   = $value->getServiceEndDate();
                $parameters["dischargeDate"]    = $value->getDischargeDate();
                $parameters["downDate"]         = $value->getDownDate();        
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

                if (!is_null($value->getServiceDayList())){

                    $this->updateServiceDayListDAO($value->getToken(), $value->getServiceDayList());

                }  

            } catch (Exception $e){
                
                throw $e;
            }
        }

        public function getUserNameDAO($username){

            try {

                $guardian = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".userName = :userName";

                $parameters["userName"] = $username;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $guardian = new Guardian();

                    $guardian->setToken($value["token"]);
                    $guardian->setUserName($value["userName"]);
                    $guardian->setPassword($value["password"]);
                    $guardian->setFirstName($value["firstName"]);
                    $guardian->setLastName($value["lastName"]);
                    $guardian->setBirthDate($value['birthDate']);
                    $guardian->setDni($value["dni"]);
                    $guardian->setProfilePicture($value["profilePicture"]);

                    $guardian->setExperience($value["experience"]);
                    $guardian->setPetSize($value["petSize"]);
                    $guardian->setServicePrice($value["servicePrice"]);
                    $guardian->setServiceStartDate($value["serviceStartDate"]);
                    $guardian->setServiceEndDate($value["serviceEndDate"]);

                    $guardian->setServiceDayList($this->getServiceDayListDAO($value["token"]));
                    $guardian->setBookingList(null);
                    $guardian->setReviewList(null); 

                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);
                }

                return $guardian;

            } catch (Exception $e){

                throw $e;
            }            
        }

        public function getUserTokenDAO($token){

            try {

                $guardian = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $guardian = new Guardian();

                    $guardian->setToken($value["token"]);
                    $guardian->setUserName($value["userName"]);
                    $guardian->setPassword($value["password"]);
                    $guardian->setFirstName($value["firstName"]);
                    $guardian->setLastName($value["lastName"]);
                    $guardian->setBirthDate($value['birthDate']);
                    $guardian->setDni($value["dni"]);
                    $guardian->setProfilePicture($value["profilePicture"]);

                    $guardian->setExperience($value["experience"]);
                    $guardian->setPetSize($value["petSize"]);
                    $guardian->setServicePrice($value["servicePrice"]);
                    $guardian->setServiceStartDate($value["serviceStartDate"]);
                    $guardian->setServiceEndDate($value["serviceEndDate"]);
                    
                    $guardian->setServiceDayList($this->getServiceDayListDAO($value["token"]));
                    $guardian->setBookingList(null);
                    $guardian->setReviewList(null); 

                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);

                }

                return $guardian;

            } catch (Exception $e){

                throw $e;
            }
        }

        private function getServiceDayListDAO($token){ 

            try {

                $dayList = null;
                $query = "SELECT GD.dayName FROM ".$this->tableName2." AS GD WHERE GD.tokenGuardian = :token";
                $parameters["token"] = $token;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);

                if (!empty($resultSet)){

                    $dayList = array();

                    foreach ($resultSet as $key => $value) {

                        array_push($dayList, $value["dayName"]);
                    }
                }

                return $dayList;

            } catch (Exception $e) {

                throw $e;
            }             
        }

        private function updateServiceDayListDAO($tokenGuardian, $dayList){

            try {

                // Eliminar dias asignados anteriormente al token del guardian en guardian_x_day.

                $query = "DELETE FROM ".$this->tableName2." WHERE ".$this->tableName2.".tokenGuardian = :tokenGuardian";                
                $parameters["tokenGuardian"] = $tokenGuardian;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

                // Asignar dias al token del guardian en guardian_x_day.

                foreach ($dayList as $key => $dayName) {
                
                    $this->addServiceDayListDAO($tokenGuardian, $dayName);
                }

            } catch(Exception $e){

                throw $e;
            }
        }

        private function addServiceDayListDAO($tokenGuardian, $dayName){

            try {

                $query = "INSERT INTO ".$this->tableName2." (tokenGuardian, dayName) VALUES (:tokenGuardian, :dayName)";
                $parameters["tokenGuardian"]  = $tokenGuardian;
                $parameters["dayName"]        = $dayName;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }  
        }   
        
        private function getArrayGuardianDAO($array){

            $guardianList = array();

            foreach ($array as $key => $value) {
                 
                $guardian = new Guardian();
                $guardian->setToken($value["token"]);
                $guardian->setUserName($value["userName"]);
                $guardian->setPassword($value["password"]);
                $guardian->setFirstName($value["firstName"]);
                $guardian->setLastName($value["lastName"]);
                $guardian->setBirthDate($value['birthDate']);
                $guardian->setDni($value["dni"]);
                $guardian->setProfilePicture($value["profilePicture"]);
                $guardian->setExperience($value["experience"]);                    
                $guardian->setPetSize($value["petSize"]);
                $guardian->setServicePrice($value["servicePrice"]);
                $guardian->setServiceStartDate($value["serviceStartDate"]);
                $guardian->setServiceEndDate($value["serviceEndDate"]);
                $guardian->setServiceDayList($this->getServiceDayListDAO($value["token"]));
                $guardian->setDischargeDate($value["dischargeDate"]);
                $guardian->setDownDate($value["downDate"]);
                array_push($guardianList, $guardian);
            }

            return $guardianList;
        }
        
    } ?>