<?php namespace DAO;

use DAO\IDAO as IDAO; 
use DAO\Connection as Connection;
use \Exception as Exception;

    use Models\Dog as Dog;

    class DogDAO implements IDAO {

        private $connection;
        private $tableName = "dog";

        public function addDAO($value){   

        
            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenOwner, name, race, size, weight, observations, vaccinationPlan,photo,video) VALUES (:token,:tokenOwner, :name, :race, :size, :weight, :observations, :vaccinationPlan,:photo,:video);";

                $parameters["token"]           = $value->getToken();
                $parameters["tokenOwner"]      = $value->getTokenOwner();
                $parameters["name"]            = $value->getName();
                $parameters["race"]            = $value->getRace();
                $parameters["size"]            = $value->getSize();
                $parameters["weight"]          = $value->getWeight();
                $parameters["observations"]    = $value->getObservations();        
                $parameters["vaccinationPlan"] = $value->getVaccinationPlan();
                $parameters["photo"]           = $value->getPhoto();                
                $parameters["video"]           = $value->getVideo();  
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                return false;
            }   

            return true;
        }

        // Metodo que retorna todos los perros de la base de datos en forma de lista.

        public function getAllDAO(){

            $dogList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $dog = new Dog();
                    
                   
                    $dog->setToken($value["token"]);
                    $dog->setTokenOwner($value["tokenOwner"]);
                    $dog->setName($value["name"]);
                    $dog->setRace($value["race"]);
                    $dog->setSize($value["size"]);
                    $dog->setWeight($value["weight"]);
                    $dog->setObservations($value["observations"]);
                    $dog->setVaccinationPlan($value["vaccinationPlan"]);
                    $dog->setPhoto($value["photo"]);                    
                    $dog->setVideo($value["video"]);

                    array_push($dogList, $dog);
                }

            } catch (Exception $e){

                return false;
            }

            return $dogList;

        }


        // Metodo que actualiza un perro en base de datos mediante su token. 

        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET name = :name, race= :race, size= :size, weight= :weight, observations = :observations, vaccinationPlan = :vaccinationPlan, photo = :photo, video= :video
                WHERE ".$this->tableName.".token ='".$value->getToken()."';";

                $parameters["token"]           = $value->getToken();
                $parameters["tokenOwner"]      = $value->getTokenOwner();
                $parameters["name"]            = $value->getName();
                $parameters["race"]            = $value->getRace();
                $parameters["size"]            = $value->getSize();
                $parameters["weight"]          = $value->getWeight();
                $parameters["observations"]    = $value->getObservations();
        
                $parameters["vaccinationPlan"] = $value->getVaccinationPlan();
                $parameters["photo"]           = $value->getPhoto();                
                $parameters["video"]           = $value->getVideo();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                return false;
            }  
                 
            return true;
        }

      
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
        
        // Metodo que retorna un perro de la base de datos a partir de su token.

        public function getDogTokenDAO($token){

            $dog = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token ='".$token."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $dog = new Dog();

                    $dog->setToken($value["token"]);
                    $dog->setTokenOwner($value["tokenOwner"]);
                    $dog->setName($value["name"]);
                    $dog->setRace($value["race"]);
                    $dog->setSize($value["size"]);
                    $dog->setWeight($value["weight"]);
                    $dog->setObservations($value["observations"]);
                    $dog->setVaccinationPlan($value["vaccinationPlan"]);
                    $dog->setPhoto($value["photo"]);                    
                    $dog->setVideo($value["video"]);
                }

            } catch (Exception $e){

                return false;
            }

            return $dog;
        }        
      
    }
?>