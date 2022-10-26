<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    
    use \Exception as Exception;

    use Models\Cat as Cat;
    use Models\Race as Race; 

    class CatDAO implements IDAO {

        private $connection;
        private $tableName = "cat";
        private $tableName2 = "race";

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

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        // Metodo que retorna todos los gatos de la base de datos en forma de lista.

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

                echo ($e->getMessage());
                exit();
            }

            return $catList;

        }

        public function getAllByOwnerDAO($token) {

            $catList = array();

            try {
                
                $query = "SELECT * FROM ".$this->tableName." AS C WHERE C.tokenOwner = ".$token.";";

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

                echo ($e->getMessage());
                exit();
            }

            return $catList;
        }

        // Metodo que actualiza un gatos en base de datos mediante su token. 

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

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }
    
        // Metodo que retorna un gato de la base de datos a partir de su token.

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

                echo ($e->getMessage());
                exit();
            }

            return $cat;
        } 

        public function getAllRace(){

            $raceList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName2." AS P WHERE P.petType = 'cat';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $race = new Race();                    
                   
                    $race->setPetType($value["petType"]);
                    $race->setName($value["name"]);

                    array_push($raceList, $race);
                }

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $raceList;    
        }        
      
    }
?>