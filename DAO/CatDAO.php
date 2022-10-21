<?php namespace DAO;

use DAO\IDAO as IDAO; 
use DAO\Connection as Connection;
use \Exception as Exception;

    use Models\Cat as Cat;

    class CatDAO implements IDAO {

        private $connection;
        private $tableName = "cat";

        public function addDAO($value){   
            

            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenOwner, name, race, size, weight, observations, vaccinationPlan,photo,video) VALUES (:token,:tokenOwner, :name, :race, :size, :weight, :observations, :vaccinationPlan,:photo,:video);";

                $parameters["token"]           = $value->getToken();
                $parameters["tokenOwner"]      = $value->getTokenOwner();
                $parameters["name"]            = $value->getName();
                $parameters["race"]            = $value->getRace();
                $parameters["size"]            = $value->getSize();
                $parameters["weight"]          = $value->getWeight();
                $parameters["observations"]    = $value->getObservations();//aca llega bien
        
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

            $catList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $cat = new Cat();
                    
                   
                    $cat->setToken($value["token"]);
                    $cat->setTokenOwner($value["tokenOwner"]);
                    $cat->setName($value["name"]);
                    $cat->setRace($value["race"]);
                    $cat->setSize($value["size"]);
                    $cat->setWeight($value["weight"]);
                    $cat->setObservations($value["observations"]);
                    $cat->setVaccinationPlan($value["vaccinationPlan"]);
                    $cat->setPhoto($value["photo"]);                    
                    $cat->setVideo($value["video"]);

                    array_push($catList, $cat);

                }

            } catch (Exception $e){

                return false;
            }

            return $catList;

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

        public function getCatTokenDAO($token){

            $cat = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token ='".$token."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $cat = new cat();

                    $cat->setToken($value["token"]);
                    $cat->setTokenOwner($value["tokenOwner"]);
                    $cat->setName($value["name"]);
                    $cat->setRace($value["race"]);
                    $cat->setSize($value["size"]);
                    $cat->setWeight($value["weight"]);
                    $cat->setObservations($value["observations"]);
                    $cat->setVaccinationPlan($value["vaccinationPlan"]);
                    $cat->setPhoto($value["photo"]);                    
                    $cat->setVideo($value["video"]);
                }

            } catch (Exception $e){

                return false;
            }

            return $cat;
        }        
      
    }
?>