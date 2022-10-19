<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;

    use Models\Guardian as Guardian;

    class GuardianDAO implements IDAO{
        
        private $connection;
        private $tableName = "guardian";

        // Metodo que genera un nuevo usuario de tipo Guardian a la base de datos.

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (userName, token, password, firstName, lastName, birthDate, dni, profilePicture, experience) VALUES (:userName, :token, :password, :firstName, :lastName, :birthDate, :dni, :profilePicture, :experience);";

                $parameters["userName"]       = $value->getUserName();
                $parameters["token"]          = $value->getToken();
                $parameters["password"]       = $value->getPassword();
                $parameters["firstName"]      = $value->getFirstName();
                $parameters["lastName"]       = $value->getLastName();
                $parameters["birthDate"]      = $value->getBirthDate();
                $parameters["dni"]            = $value->getDni();
                $parameters["profilePicture"] = $value->getProfilePicture();
                $parameters["experience"]     = $value->getExperience();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                return false;
            }  

            return true;
        }

        // Metodo que retorna todos los usuarios Guardian de la base de datos en forma de lista.

        public function getAllDAO(){

            $guardianList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

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
                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);

                    array_push($guardianList, $guardian);

                }

            } catch (Exception $e){

                return false;
            }

            return $guardianList;

        }

        public function getAllDownDateDAO() {

            $guardianList = array();

            try {
                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".downDate IS NOT NULL;";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

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
                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);

                    array_push($guardianList, $guardian);

                }

            } catch (Exception $e) {
                return false;
            }

            return $guardianList;
        }

        public function getAllDischargeDateDAO() {

            $dischargeList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".dischargeDate IS NOT NULL AND ".$this->tableName.".downDate IS NULL;";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

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
                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);

                    array_push($dischargeList, $guardian);

                }

            } catch (Exception $e) {
                return false;
            }

            return $dischargeList;
        }

        public function getAllPendientDateDAO() {
            
            $pendientList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".dischargeDate IS NULL;";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

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
                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);

                    array_push($pendientList, $guardian);

                }


            } catch (Exception $e) {
                return false;
            }

            return $pendientList;
        }

        public function confirmGuardianDAO($value) {

            try {
                $query = "UPDATE ".$this->tableName." SET dischargeDate = :dischargeDate WHERE ".$this->tableName.".token ='".$value->getToken()."';";

                $parameters["dischargeDate"] = $value->setDischargeDate(date("Y-m-d"));

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e) {
                return false;
            }

            return true;
        }


        // Metodo que da de baja un usuario en la base de datos.

        public function deleteDAO($value){ 

            try {

                $query = "UPDATE ".$this->tableName." SET downDate = now() WHERE ".$this->tableName.".token = '".$value."';";
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);

            } catch(Exception $ex){

                return false;
            }

            return true;
        }

        // Metodo que actualiza un usuario de tipo Guardian en base de datos mediante su token. 

        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET password = :password, firstName = :firstName, lastName = :lastName, birthDate = :birthDate, dni = :dni, profilePicture = :profilePicture, experience = :experience, dischargeDate = :dischargeDate, downDate = :downDate 
                WHERE ".$this->tableName.".token ='".$value->getToken()."';";

                $parameters["password"]       = $value->getPassword();
                $parameters["firstName"]      = $value->getFirstName();
                $parameters["lastName"]       = $value->getLastName();
                $parameters["birthDate"]      = $value->getBirthDate();
                $parameters["dni"]            = $value->getDni();
                $parameters["profilePicture"] = $value->getProfilePicture();
                $parameters["experience"]     = $value->getExperience();
                $parameters["dischargeDate"]  = $value->getDischargeDate();
                $parameters["downDate"]       = $value->getDownDate();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                return false;
            }  

            return true;
        }

        // Metodo que retorna un usuario de tipo Guardian de la base de datos a partir de su nombre de usuario.

        public function getUserNameDAO($username) {

            $admin = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".userName ='".$username."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

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
                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);
                }

            } catch (Exception $e){

                return false;
            }

            return $admin;
        }

        // Metodo que retorna un usuario de tipo Guardian de la base de datos a partir de su token.

        public function getUserTokenDAO($token){

            $guardian = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token ='".$token."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

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
                    $guardian->setDischargeDate($value["dischargeDate"]);
                    $guardian->setDownDate($value["downDate"]);
                }

            } catch (Exception $e){

                return false;
            }

            return $guardian;
        }        
        
    } ?>