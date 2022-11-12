<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Owner as Owner;

    class OwnerDAO implements IDAO{
        
        private $connection;
        private $tableName = "owner";

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (userName, token, password, firstName, lastName, birthDate, dni, profilePicture) VALUES (:userName, :token, :password, :firstName, :lastName, :birthDate, :dni, :profilePicture)";

                $parameters["userName"]       = $value->getUserName();
                $parameters["token"]          = $value->getToken();
                $parameters["password"]       = $value->getPassword();
                $parameters["firstName"]      = $value->getFirstName();
                $parameters["lastName"]       = $value->getLastName();
                $parameters["birthDate"]      = $value->getBirthDate();
                $parameters["dni"]            = $value->getDni();
                $parameters["profilePicture"] = $value->getProfilePicture();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){
                
                throw $e;
            }  
        }

        public function getAllDAO(){            

            try {

                $ownerList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $owner = new Owner();

                    $owner->setToken($value["token"]);
                    $owner->setUserName($value["userName"]);
                    $owner->setPassword($value["password"]);
                    $owner->setFirstName($value["firstName"]);
                    $owner->setLastName($value["lastName"]);
                    $owner->setBirthDate($value['birthDate']);
                    $owner->setDni($value["dni"]);
                    $owner->setProfilePicture($value["profilePicture"]);
                    $owner->setDischargeDate($value["dischargeDate"]);
                    $owner->setDownDate($value["downDate"]);

                    array_push($ownerList, $owner);

                }

                return $ownerList;

            } catch (Exception $e){

                throw $e;
            }  
        }

        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET password = :password, firstName = :firstName, lastName = :lastName, birthDate = :birthDate, dni = :dni, profilePicture = :profilePicture, dischargeDate = :dischargeDate, downDate = :downDate 
                WHERE ".$this->tableName.".token = :token";

                $parameters["token"]          = $value->getToken();
                $parameters["password"]       = $value->getPassword();
                $parameters["firstName"]      = $value->getFirstName();
                $parameters["lastName"]       = $value->getLastName();
                $parameters["birthDate"]      = $value->getBirthDate();
                $parameters["dni"]            = $value->getDni();
                $parameters["profilePicture"] = $value->getProfilePicture();
                $parameters["dischargeDate"]  = $value->getDischargeDate();
                $parameters["downDate"]       = $value->getDownDate();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }  
        }

        public function getUserNameDAO($username){            

            try {

                $owner = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".userName = :userName";

                $parameters["userName"] = $username;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $owner = new Owner();

                    $owner->setToken($value["token"]);
                    $owner->setUserName($value["userName"]);
                    $owner->setPassword($value["password"]);
                    $owner->setFirstName($value["firstName"]);
                    $owner->setLastName($value["lastName"]);
                    $owner->setBirthDate($value['birthDate']);
                    $owner->setDni($value["dni"]);
                    $owner->setProfilePicture($value["profilePicture"]);
                    $owner->setDischargeDate($value["dischargeDate"]);
                    $owner->setDownDate($value["downDate"]);
                }

                return $owner;

            } catch (Exception $e){

                throw $e;
            }            
        }

        public function getUserTokenDAO($token){

            try {

                $owner = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $owner = new Owner();

                    $owner->setToken($value["token"]);
                    $owner->setUserName($value["userName"]);
                    $owner->setPassword($value["password"]);
                    $owner->setFirstName($value["firstName"]);
                    $owner->setLastName($value["lastName"]);
                    $owner->setBirthDate($value['birthDate']);
                    $owner->setDni($value["dni"]);
                    $owner->setProfilePicture($value["profilePicture"]);
                    $owner->setDischargeDate($value["dischargeDate"]);
                    $owner->setDownDate($value["downDate"]);
                }

                return $owner;

            } catch (Exception $e){

                throw $e;
            }            
        } 

         public function getAllDownDateDAO(){

            try {

                $ownerList = array();

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".downDate IS NOT NULL";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $key => $value) {
                 
                    $owner = new Owner();

                    $owner->setToken($value["token"]);
                    $owner->setUserName($value["userName"]);
                    $owner->setPassword($value["password"]);
                    $owner->setFirstName($value["firstName"]);
                    $owner->setLastName($value["lastName"]);
                    $owner->setBirthDate($value['birthDate']);
                    $owner->setDni($value["dni"]);
                    $owner->setProfilePicture($value["profilePicture"]);
                    $owner->setDischargeDate($value["dischargeDate"]);
                    $owner->setDownDate($value["downDate"]);

                    array_push($ownerList, $owner);
                }

                return $ownerList;

            } catch (Exception $e) {

                throw $e;
            }            
        }

        public function getAllDischargeDateDAO(){            

            try {

                $dischargeList = array();

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".dischargeDate IS NOT NULL AND ".$this->tableName.".downDate IS NULL";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $key => $value) {
                 
                    $owner = new Owner();

                    $owner->setToken($value["token"]);
                    $owner->setUserName($value["userName"]);
                    $owner->setPassword($value["password"]);
                    $owner->setFirstName($value["firstName"]);
                    $owner->setLastName($value["lastName"]);
                    $owner->setBirthDate($value['birthDate']);
                    $owner->setDni($value["dni"]);
                    $owner->setProfilePicture($value["profilePicture"]);
                    $owner->setDischargeDate($value["dischargeDate"]);
                    $owner->setDownDate($value["downDate"]);

                    array_push($dischargeList, $owner);
                }

                return $dischargeList;

            } catch (Exception $e) {

                throw $e;
            }
        }           
        
    } ?>