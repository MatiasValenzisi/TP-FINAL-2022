<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Booking as Booking;
    use Models\Review as Review;

    class BookingDAO implements IDAO{
        
        private $connection;
        private $tableName = "booking";
        private $tableName2 = "review";

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenPet, dateStart, dateEnd, price, state, tokenGuardian, tokenOwner) VALUES (:token, :tokenPet, :dateStart, :dateEnd, :price, :state, :tokenGuardian, :tokenOwner)";

                $parameters["token"]            = $value->getToken();
                $parameters["tokenPet"]         = $value->getTokenPet();
                $parameters["dateStart"]        = $value->getDateStart();
                $parameters["dateEnd"]          = $value->getDateEnd();
                $parameters["price"]            = $value->getPrice();
                $parameters["state"]            = $value->getState();
                $parameters["tokenGuardian"]    = $value->getTokenGuardian();
                $parameters["tokenOwner"]       = $value->getTokenOwner();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }
        }

        public function getAllDAO(){

            try {

                $bookingList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $booking = new Booking();

                    $booking->setToken($value["token"]);
                    $booking->setTokenPet($value["tokenPet"]);
                    $booking->setDateStart($value["dateStart"]);
                    $booking->setDateEnd($value["dateEnd"]);
                    $booking->setPrice($value["price"]);
                    $booking->setState($value['state']);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);

                    array_push($bookingList, $booking);
                }

                return $bookingList;

            } catch (Exception $e){

                throw $e;
            }
        }

        public function getAllGuardianDAO($token){

            try {

                $bookingList = array();

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenGuardian = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $key => $value) {
                 
                    $booking = new Booking();

                    $booking->setToken($value["token"]);
                    $booking->setTokenPet($value["tokenPet"]);
                    $booking->setDateStart($value["dateStart"]);
                    $booking->setDateEnd($value["dateEnd"]);
                    $booking->setPrice($value["price"]);
                    $booking->setState($value['state']);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);

                    array_push($bookingList, $booking);
                }

                return $bookingList;

            } catch (Exception $e) {

                throw $e;
            }            
        }
        
        public function getAllOwnerDAO($token){

            try {

                $bookingList = array();

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenOwner = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $key => $value) {
                 
                    $booking = new Booking();

                    $booking->setToken($value["token"]);
                    $booking->setTokenPet($value["tokenPet"]);
                    $booking->setDateStart($value["dateStart"]);
                    $booking->setDateEnd($value["dateEnd"]);
                    $booking->setPrice($value["price"]);
                    $booking->setState($value['state']);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);

                    array_push($bookingList, $booking);
                }

                return $bookingList;

            } catch (Exception $e) {

                throw $e;
            }
        }

        public function getTokenDAO($token){

            try {

                $booking = null;

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.token = :token";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);

                foreach ($resultSet as $key => $value) {

                    $booking = new Booking();

                    $booking->setToken($value["token"]);
                    $booking->setTokenPet($value["tokenPet"]);
                    $booking->setDateStart($value["dateStart"]);
                    $booking->setDateEnd($value["dateEnd"]);
                    $booking->setPrice($value["price"]);
                    $booking->setState($value['state']);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);
                }

                return $booking;

            } catch (Exception $e) {

                throw $e;
            }            
        }

        public function deleteDAO($token){ 

            try {

                $query = "DELETE FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";
                
                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch(Exception $e){

                throw $e;
            }
        }

        public function updateState($token, $state){

            try {

                $query = "UPDATE ".$this->tableName." SET state = :state WHERE ".$this->tableName.".token = :token";

                $parameters["state"] = $state;   
                $parameters["token"] = $token;          

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }                 
        }        

        public function getAllGuardianActiveDAO($token, $dateStart, $dateEnd){           

            try {

                $bookingList = array();

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenGuardian = :token AND B.state = 'Aceptado' AND B.dateEnd > :dateStart AND B.dateStart < :dateEnd";

                $parameters["token"]      = $token;
                $parameters["dateStart"]  = $dateStart;
                $parameters["dateEnd"]    = $dateEnd;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $key => $value) {
                 
                    $booking = new Booking();

                    $booking->setToken($value["token"]);
                    $booking->setTokenPet($value["tokenPet"]);
                    $booking->setDateStart($value["dateStart"]);
                    $booking->setDateEnd($value["dateEnd"]);
                    $booking->setPrice($value["price"]);
                    $booking->setState($value['state']);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);

                    array_push($bookingList, $booking);
                }

                return $bookingList;

            } catch (Exception $e) {

                throw $e;
            }            
        }

        public function addReviewDAO($tokenGuardian, $score, $observations){

            try {

                $query = "INSERT INTO ".$this->tableName2." (tokenGuardian, score, observations) VALUES (:tokenGuardian, :score, :observations);";

                $parameters["tokenGuardian"] = $tokenGuardian;
                $parameters["score"]         = $score;
                $parameters["observations"]  = $observations;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }  
        }

        public function getAllReviewDAO(){           

            try {

                $reviewList = array();

                $query = "SELECT * FROM ".$this->tableName2;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $key => $value) {

                    $review = new Review();

                    $review->setTokenGuardian($value["tokenGuardian"]);
                    $review->setScore($value["score"]);
                    $review->setDate($value["date"]);
                    $review->setObservations($value["observations"]);  

                    array_push($reviewList, $review);
                }

                return $reviewList;  

            } catch (Exception $e){

                throw $e;
            }                      
        }

    } ?>