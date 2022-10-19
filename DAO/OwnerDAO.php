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

                $query = "INSERT INTO ".$this->tableName." (userName, token, password, firstName, lastName, birthDate, dni, profilePicture) VALUES (:userName, :token, :password, :firstName, :lastName, :birthDate, :dni, :profilePicture);";

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

                return false;
            }  

            return true;
        }

        // Metodo que retorna todos los usuarios Owner de la base de datos en forma de lista.

        public function getAllDAO(){

            $ownerList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

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

                return false;
            }

            return $ownerList;

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

        // Metodo que actualiza un usuario de tipo Owner en base de datos mediante su token. 

        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET password = :password, firstName = :firstName, lastName = :lastName, birthDate = :birthDate, dni = :dni, profilePicture = :profilePicture, dischargeDate = :dischargeDate, downDate = :downDate 
                WHERE ".$this->tableName.".token ='".$value->getToken()."';";

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

                return false;
            }  

            return true;
        }

        // Metodo que retorna un usuario de tipo Owner de la base de datos a partir de su nombre de usuario.

        public function getUserNameDAO($username) {

            $owner = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".userName ='".$username."';";

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
                }

            } catch (Exception $e){

                return false;
            }

            return $owner;
        }

        // Metodo que retorna un usuario de tipo Owner de la base de datos a partir de su token.

        public function getUserTokenDAO($token){

            $owner = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token ='".$token."';";

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
                }

            } catch (Exception $e){

                return false;
            }

            return $owner;
        }        
        
    } ?>