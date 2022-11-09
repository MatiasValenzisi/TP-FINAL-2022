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

        // Metodo que genera un nuevo usuario de tipo Guardian a la base de datos.

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenPet, dateStart, dateEnd, price, state, tokenGuardian, tokenOwner) VALUES (:token, :tokenPet, :dateStart, :dateEnd, :price, :state, :tokenGuardian, :tokenOwner);";

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

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        // Metodo que retorna todos los usuarios Guardian de la base de datos en forma de lista.

        public function getAllDAO(){

            $bookingList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName.";";

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

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;

        }

        public function getAllGuardianDAO($token = null){

            $bookingList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenGuardian = '".$token."';";

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

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;
        }
        
        public function getAllOwnerDAO($token = null){

            $bookingList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenOwner = '".$token."';";

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

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;
        }

        public function getTokenDAO($token){

            $booking = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.token = '".$token."';";

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
                }

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $booking;
        }

        // Metodo que elimina una reserva.

        public function deleteDAO($value){ 

            try {

                $query = "DELETE FROM ".$this->tableName." WHERE ".$this->tableName.".token = '".$value."';";
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);

            } catch(Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return true;
        }

        public function updateState($bookingToken, $action){

            try {

                $query = "UPDATE ".$this->tableName." SET state = :state WHERE ".$this->tableName.".token ='".$bookingToken."';";

                $parameters["state"] = $action;          

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

                return true;                    
        }
        

        public function getAllGuardianActiveDAO($token, $dateStart, $dateEnd){

            $bookingList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenGuardian = '".$token."' AND B.state = 'Aceptado' AND B.dateEnd > '".$dateStart."' AND B.dateStart < '".$dateEnd."';" ;

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

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;
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

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        public function getAllReviewDAO(){

            $reviewList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName2.";";

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

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $reviewList;            
        }

    } ?>