<?php namespace JsonDAO;

    use Models\Cat as Cat;

    class CatDAO implements IJsonDAO {

        private $catList;
        private $fileName = ROOT."JsonDAO/Data/Cat.json";

        public function addDAO($cat){  


            $this->retrieveData();

            array_push($this->catList, $cat);

            $this->SaveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->catList;
        }

        public function deleteDAO($value){

            // Eliminar perro.
        }

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->catList as $cat) {

                $arrayValues["token"]           = $cat->getToken();
                $arrayValues["tokenOwner"]      = $cat->getTokenOwner();
                $arrayValues["name"]            = $cat->getName();
                $arrayValues["race"]            = $cat->getRace();
                $arrayValues["size"]            = $cat->getSize();
                $arrayValues["weight"]          = $cat->getWeight();
                $arrayValues["observations"]    = $cat->getObservations();
                $arrayValues["vaccinationPlan"] = $cat->getVaccinationPlan();
                $arrayValues["photo"]           = $cat->getPhoto();                
                $arrayValues["video"]           = $cat->getVideo();
                
                array_push($arrayToEncode, $arrayValues);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        
        public function retrieveData(){

            $this->catList = array();

            if(file_exists($this->fileName)){

                $jsonContent = file_get_contents($this->fileName);

                if($jsonContent){

                    $arrayToDecode = json_decode($jsonContent, true);

                } else {

                    $arrayToDecode = array();
                }
                
                foreach($arrayToDecode as $values) {

                    $cat = new cat();

                    $cat->setToken($values["token"]);
                    $cat->setTokenOwner($values["tokenOwner"]);
                    $cat->setName($values["name"]);
                    $cat->setRace($values["race"]);
                    $cat->setSize($values["size"]);
                    $cat->setWeight($values["weight"]);
                    $cat->setObservations($values["observations"]);
                    $cat->setVaccinationPlan($values["vaccinationPlan"]);
                    $cat->setPhoto($values["photo"]);                    
                    $cat->setVideo($values["video"]);
                    
                
                    array_push($this->catList, $cat);
                }
            }
        }

        public function getCatTokenDAO($token){ 

            $this->retrieveData();

            $user = null;

            foreach ($this->catList as $value) {

                if(strcmp($value->getToken(), $token) == 0){

                    $user = $value;
                }
            }

            return $user;
        }
    }
?>