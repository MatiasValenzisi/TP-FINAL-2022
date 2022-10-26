<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;

    use Models\Booking as Booking;

    class BookingDAO implements IDAO{
        
        private $connection;
        private $tableName = "booking";

        // Metodo que genera un nuevo usuario de tipo Guardian a la base de datos.

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenPet, dateStart, dateEnd, price, state, couponPayment, remainingPayment, tokenGuardian, tokenOwner, acceptanceDate) VALUES (:token, :tokenPet, :dateStart, :dateEnd, :price, :state, :couponPayment, :remainingPayment, :tokenGuardian, :tokenOwner, :acceptanceDate);";

                $parameters["token"]            = $value->getToken();
                $parameters["tokenPet"]         = $value->getTokenPet();
                $parameters["dateStart"]        = $value->getDateStart();
                $parameters["dateEnd"]          = $value->getDateEnd();
                $parameters["price"]            = $value->getPrice();
                $parameters["state"]            = $value->getState();
                $parameters["couponPayment"]    = $value->getCouponPayment();
                $parameters["remainingPayment"] = $value->getRemainingPayment();
                $parameters["tokenGuardian"]    = $value->getTokenGuardian();
                $parameters["tokenOwner"]       = $value->getTokenOwner();
                $parameters["acceptanceDate"]   = $value->getAcceptanceDate();

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
                    $booking->setCouponPayment($value["couponPayment"]);
                    $booking->setRemainingPayment($value["remainingPayment"]);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);
                    $booking->setAcceptanceDate($value["acceptanceDate"]);

                    array_push($bookingList, $booking);
                }

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;

        }

        public function getAllGuardianDAO($token = null) {

            $bookingList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenGuardian = ".$token.";";

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
                    $booking->setCouponPayment($value["couponPayment"]);
                    $booking->setRemainingPayment($value["remainingPayment"]);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);
                    $booking->setAcceptanceDate($value["acceptanceDate"]);

                    array_push($bookingList, $booking);
                }

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;
        }
        
        public function getAllOwnerDAO($token = null) {

            $bookingList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.tokenOwner = ".$token.";";

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
                    $booking->setCouponPayment($value["couponPayment"]);
                    $booking->setRemainingPayment($value["remainingPayment"]);
                    $booking->setTokenGuardian($value["tokenGuardian"]);
                    $booking->setTokenOwner($value["tokenOwner"]);
                    $booking->setAcceptanceDate($value["acceptanceDate"]);

                    array_push($bookingList, $booking);
                }

            } catch (Exception $e) {

                echo ($e->getMessage());
                exit();
            }

            return $bookingList;
        }

        public function getTokenDAO($token) {
            $booking = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." AS B WHERE B.token = ".$token.";";

                $this->connection = Connection::GetInstance();
                $value = $this->connection->Execute($query);              
                 
                $booking = new Booking();

                $booking->setToken($value["token"]);
                $booking->setTokenPet($value["tokenPet"]);
                $booking->setDateStart($value["dateStart"]);
                $booking->setDateEnd($value["dateEnd"]);
                $booking->setPrice($value["price"]);
                $booking->setState($value['state']);
                $booking->setCouponPayment($value["couponPayment"]);
                $booking->setRemainingPayment($value["remainingPayment"]);
                $booking->setTokenGuardian($value["tokenGuardian"]);
                $booking->setTokenOwner($value["tokenOwner"]);
                $booking->setAcceptanceDate($value["acceptanceDate"]);

                array_push($bookingList, $booking);

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

        // Metodo que actualiza estado de la reserva
        /*
        public function updateDAO($value){

            try {

                $query = "UPDATE ".$this->tableName." SET password = :password, profilePicture = :profilePicture, experience = :experience, servicePrice = :servicePrice, serviceStartDate = :serviceStartDate, serviceEndDate = :serviceEndDate, dischargeDate = :dischargeDate, downDate = :downDate WHERE ".$this->tableName.".token ='".$value->getToken()."';";

                $parameters["password"]         = $value->getPassword();
                $parameters["profilePicture"]   = $value->getProfilePicture();
                $parameters["experience"]       = $value->getExperience();
                $parameters["servicePrice"]     = $value->getServicePrice();
                $parameters["serviceStartDate"] = $value->getServiceStartDate();
                $parameters["serviceEndDate"]   = $value->getServiceEndDate();

                $parameters["dischargeDate"]    = $value->getDischargeDate();
                $parameters["downDate"]         = $value->getDownDate();                

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            if (!is_null($value->getServiceDayList())){

                $this->updateServiceDayListDAO($value->getToken(), $value->getServiceDayList());

            } else {

                return true;
            }            
        }*/
        
    } ?>