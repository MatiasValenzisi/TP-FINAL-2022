<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;

    use \Exception as Exception;

    use Models\Review as Review;

    class ReviewDAO implements IDAO {

        private $connection;
        private $tableName = "review";

        public function addDAO($value){

            try {

                $query = "INSERT INTO ".$this->tableName." (score, date, observations, tokenGuardian) VALUES (:score, :date, :observations, :tokenGuardian);";

                $parameters["score"]         = $value->getScore();
                $parameters["date"]          = $value->getDate();
                $parameters["observations"]  = $value->getObservations();
                $parameters["tokenGuardian"] = $value->getTokenGuardian();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){
                
                return false;
            }  

            return true;
        }
        
        public function getAllDAO(){

            $reviewList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $review = new Review();
                                       
                    $review->setScore($value["score"]);
                    $review->setDate($value["date"]);
                    $review->setObservations($value["observations"]);
                    $review->setTokenGuardian($value["tokenGuardian"]);

                    array_push($reviewList, $review);
                }

            } catch (Exception $e){

                return false;
            }

            return $reviewList;
        } 

        public function getReviewListTokenGuardianDAO($tokenGuardian){

            $reviewList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".tokenGuardian = '".$tokenGuardian."';";

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $review = new Review();
                                       
                    $review->setScore($value["score"]);
                    $review->setDate($value["date"]);
                    $review->setObservations($value["observations"]);
                    $review->setTokenGuardian($value["tokenGuardian"]);

                    array_push($reviewList, $review);
                }

            } catch (Exception $e){

                return false;
            }

            return $reviewList;

        }
      
    }
?>