<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;
    use \Exception as Exception;

    use Models\Payment as Payment;

    class PaymentDAO implements IDAO{
        
        private $connection;
        private $tableName = "payment";

        public function addDAO($value){   

            try {

                $query = "INSERT INTO ".$this->tableName." (token, tokenBooking, amount, dateGenerated, dateIssued, type) VALUES (:token, :tokenBooking, :amount, :dateGenerated, :dateIssued, :type)";

                $parameters["token"]         = $value->getToken();
                $parameters["tokenBooking"]  = $value->getTokenBooking();
                $parameters["amount"]        = $value->getAmount();
                $parameters["dateGenerated"] = $value->getDateGenerated();
                $parameters["dateIssued"]    = $value->getDateIssued();
                $parameters["type"]          = $value->getType();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        public function getAllDAO(){

            $paymentList = array();

            try {

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);  

                foreach ($resultSet as $key => $value) {
                 
                    $payment = new Payment();

                    $payment->setToken($value["token"]);
                    $payment->setTokenBooking($value["tokenBooking"]);
                    $payment->setAmount($value["amount"]);
                    $payment->setDateGenerated($value["dateGenerated"]);
                    $payment->setDateIssued($value["dateIssued"]);
                    $payment->setType($value["type"]);

                    array_push($paymentList, $payment);

                }

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $paymentList;
        }

        public function updateDAO($token, $dateIssued){

            try {

                $query = "UPDATE ".$this->tableName." SET dateIssued = :dateIssued WHERE ".$this->tableName.".token = :token";

                $parameters["token"]      = $token;
                $parameters["dateIssued"] = $dateIssued;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }  

            return true;
        }

        public function getPaymentTokenDAO($token){

            $payment = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".token = :token";

                $parameters["token"]  = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $payment = new Payment();

                    $payment->setToken($value["token"]);
                    $payment->setTokenBooking($value["tokenBooking"]);
                    $payment->setAmount($value["amount"]);
                    $payment->setDateGenerated($value["dateGenerated"]);
                    $payment->setDateIssued($value["dateIssued"]);
                    $payment->setType($value["type"]);

                }

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $payment;
        }   

        public function getPaymentByBookingTokenDAO($tokenBooking){

            $payment = null;

            try {

                $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".tokenBooking = :tokenBooking";

                $parameters["tokenBooking"] = $tokenBooking;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);  

                foreach ($resultSet as $key => $value) {
                 
                    $payment = new Payment();

                    $payment->setToken($value["token"]);
                    $payment->setTokenBooking($value["tokenBooking"]);
                    $payment->setAmount($value["amount"]);
                    $payment->setDateGenerated($value["dateGenerated"]);
                    $payment->setDateIssued($value["dateIssued"]);
                    $payment->setType($value["type"]);

                }

            } catch (Exception $e){

                echo ($e->getMessage());
                exit();
            }

            return $payment;
        }   
        
    } ?>