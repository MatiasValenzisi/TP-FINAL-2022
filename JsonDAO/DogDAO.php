<?php namespace JsonDAO;

    use Models\Dog as Dog;

    class DogDAO implements IJsonDAO {

        private $dogList;
        private $fileName = ROOT."JsonDAO/Data/Dog.json";

        public function addDAO($dog){  

            $this->retrieveData();

            array_push($this->dogList, $dog);

            $this->SaveData();
        }

        public function getAllDAO(){ 

            $this->retrieveData();

            return $this->dogList;
        }

        public function deleteDAO($value){

            // Eliminar perro.
        }

        public function saveData(){

            $arrayToEncode = array();

            foreach($this->dogList as $dog) {

                $arrayValues["token"]           = $admin->getToken();
                $arrayValues["tokenOwner"]      = $admin->getTokenOwner();
                $arrayValues["name"]            = $admin->getName();
                $arrayValues["race"]            = $admin->getRace();
                $arrayValues["size"]            = $admin->getSize();
                $arrayValues["observations"]    = $admin->getObservations();
                $arrayValues["vaccinationPlan"] = $admin->getVaccinationPlan();
                $arrayValues["photo"]           = $admin->getPhoto();
                $arrayValues["weight"]          = $admin->getWeight();
                
                array_push($arrayToEncode, $arrayValues);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        public function retrieveData(){

            $this->dogList = array();

            if(file_exists($this->fileName)){

                $jsonContent = file_get_contents($this->fileName);

                if($jsonContent){

                    $arrayToDecode = json_decode($jsonContent, true);

                } else {

                    $arrayToDecode = array();
                }
                
                foreach($arrayToDecode as $values) {

                    $dog = new Dog();

                    $dog->setToken($values["token"]);
                    $dog->setTokenOwner($values["tokenOwner"]);
                    $dog->setName($values["name"]);
                    $dog->setRace($values["race"]);
                    $dog->setSize($values["size"]);
                    $dog->setObservations($values["observations"]);
                    $dog->setVaccinationPlan($values["vaccinationPlan"]);
                    $dog->setPhoto($values["photo"]);
                    $dog->setWeight($values["weight"]);
                
                    array_push($this->dogList, $dog);
                }
            }
        }
    }
?>