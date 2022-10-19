<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;

    use Models\Admin as Admin;

    class AdminDAO implements IDAO{
        
        private $connection;
        private $tableName = "admin";

        // Metodo que genera un nuevo usuario de tipo Admin a la base de datos.

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

        // Metodo que retorna todos los usuarios Admin de la base de datos en forma de lista.

        public function getAllDAO(){

            $adminList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

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

                    array_push($adminList, $admin);

                }

            } catch (Exception $e){

                return false;
            }

            return $adminList;

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

        // Metodo que actualiza un usuario de tipo Admin en base de datos mediante su token. 

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

        // Metodo que retorna un usuario de tipo Admin de la base de datos a partir de su nombre de usuario.

        public function getUserNameDAO($username) {

            $admin = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".userName ='".$username."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

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

            } catch (Exception $e){

                return false;
            }

            return $admin;
        }

        // Metodo que retorna un usuario de tipo Admin de la base de datos a partir de su token.

        public function getUserTokenDAO($token){

            $admin = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token ='".$token."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

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

            } catch (Exception $e){

                return false;
            }

            return $admin;
        }        
        
    } ?>