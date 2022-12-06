<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;    
    use \Exception as Exception;
    use Models\Dog as Dog; 
    use Models\Race as Race;    

    class DogDAO implements IDAO {

        private $connection;
        private $tableName = "dog";
        private $tableName2 = "race";

        public function addDAO($value){   
        
            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenOwner, name, race, size, weight, observations, vaccinationPlan, photo, video) VALUES (:token,:tokenOwner, :name, :race, :size, :weight, :observations, :vaccinationPlan, :photo, :video)";

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

                throw $e;
            }               
        }

        public function getAllDAO(){            

            try {
                
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayDogDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e){

                throw $e;
            }
        }

        public function getAllByOwnerDAO($tokenOwner){            

            try {

                $query = "SELECT * FROM ".$this->tableName." AS D WHERE D.tokenOwner = :tokenOwner";
                $parameters["tokenOwner"] = $tokenOwner;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                $resulArrayObject = $this->getArrayDogDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e){

                throw $e;
            }
        }

        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET name = :name, race = :race, size = :size, weight = :weight, observations = :observations, vaccinationPlan = :vaccinationPlan, photo = :photo, video = :video WHERE ".$this->tableName.".token = :token";

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

                throw $e;
            }                   
        }      

        public function getDogTokenDAO($token){            

            try {

                $dog = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

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

                return $dog;

            } catch (Exception $e){

                throw $e;
            }            
        } 

        public function getAllRaceDAO(){

            try {

                $query = "SELECT * FROM ".$this->tableName2." AS P WHERE P.petType = 'dog'";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                $resulArrayObject = $this->getArrayRaceDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e){

                throw $e;
            }               
        } 

        private function getArrayDogDAO($array){

            $dogList = array();

            foreach ($array as $key => $value) {
                 
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

            return $dogList;
        }

        private function getArrayRaceDAO($array){

            $raceList = array();

            foreach ($array as $key => $value) {
                 
                $race = new Race();    
                $race->setPetType($value["petType"]);
                $race->setName($value["name"]);
                array_push($raceList, $race);
            }

            return $raceList;
        }
    }
?>