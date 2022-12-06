<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Admin as Admin;

    class AdminDAO implements IDAO{
        
        private $connection;
        private $tableName = "admin";

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

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);                
                $resulArrayObject = $this->getArrayAdminDAO($resultSet);
                return $resulArrayObject;

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

        public function getUserNameDAO($username) {           

            try {

                $admin = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".userName = :userName";

                $parameters["userName"] = $username;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $admin = new Admin();

                    $admin->setToken($value["token"]);
                    $admin->setUserName($value["userName"]);
                    $admin->setPassword($value["password"]);
                    $admin->setFirstName($value["firstName"]);
                    $admin->setLastName($value["lastName"]);
                    $admin->setBirthDate($value['birthDate']);
                    $admin->setDni($value["dni"]);
                    $admin->setProfilePicture($value["profilePicture"]);
                    $admin->setDischargeDate($value["dischargeDate"]);
                    $admin->setDownDate($value["downDate"]);
                }

                return $admin;

            } catch (Exception $e){

                throw $e;
            }            
        }

        public function getUserTokenDAO($token){            

            try {

                $admin = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $admin = new Admin();

                    $admin->setToken($value["token"]);
                    $admin->setUserName($value["userName"]);
                    $admin->setPassword($value["password"]);
                    $admin->setFirstName($value["firstName"]);
                    $admin->setLastName($value["lastName"]);
                    $admin->setBirthDate($value['birthDate']);
                    $admin->setDni($value["dni"]);
                    $admin->setProfilePicture($value["profilePicture"]);
                    $admin->setDischargeDate($value["dischargeDate"]);
                    $admin->setDownDate($value["downDate"]);
                }

                return $admin;

            } catch (Exception $e){

                throw $e;
            }                       
        }

        private function getArrayAdminDAO($array){

            $adminList = array();

            foreach ($array as $key => $value) {
                 
                $admin = new Admin();
                $admin->setToken($value["token"]);
                $admin->setUserName($value["userName"]);
                $admin->setPassword($value["password"]);
                $admin->setFirstName($value["firstName"]);
                $admin->setLastName($value["lastName"]);
                $admin->setBirthDate($value['birthDate']);
                $admin->setDni($value["dni"]);
                $admin->setProfilePicture($value["profilePicture"]);
                $admin->setDischargeDate($value["dischargeDate"]);
                $admin->setDownDate($value["downDate"]);
                array_push($adminList, $admin);
            }

            return $adminList;
        }
    } 
?>