<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;

    use Models\Owner as Owner;

    class OwnerDAO implements IDAO{
        
        private $connection;
        private $tableName = "owner";

        // Metodo que genera un nuevo usuario de tipo Owner a la base de datos.

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
                
                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        // Metodo que retorna todos los usuarios Owner de la base de datos en forma de lista.

        public function getAllDAO(){

            $ownerList = array();

            try {

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

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $ownerList;

        }

        // Metodo que actualiza un usuario de tipo Owner en base de datos mediante su token. 

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

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        // Metodo que retorna un usuario de tipo Owner de la base de datos a partir de su nombre de usuario.

        public function getUserNameDAO($username) {

            $owner = null;

            try {

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

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $owner;
        }

        // Metodo que retorna un usuario de tipo Owner de la base de datos a partir de su token.

        public function getUserTokenDAO($token){

            $owner = null;

            try {

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

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $owner;
        } 

         public function getAllDownDateDAO() {

            $ownerList = array();

            try {
                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".downDate IS NOT NULL;";

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

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $ownerList;
        }

        public function getAllDischargeDateDAO() {

            $dischargeList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".dischargeDate IS NOT NULL AND ".$this->tableName.".downDate IS NULL;";

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

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $dischargeList;
        }           
        
    } ?>