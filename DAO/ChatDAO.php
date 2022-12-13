<?php namespace DAO;

    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Chat as Chat;

    class ChatDAO {
        
        private $connection;
        private $tableName = "chat";

        public function addDAO($value){

            try {

                $query = "INSERT INTO ".$this->tableName." (date, transmitter, receiver, message) VALUES (:date, :transmitter, :receiver, :message)";

                $parameters["date"]         = $value->getDate();
                $parameters["transmitter"]  = $value->getTransmitter();
                $parameters["receiver"]     = $value->getReceiver();
                $parameters["message"]      = $value->getMessage();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }  
        }

        public function getAllDAO($user1, $user2){

            var_dump($user1);
            var_dump($user2);

            try {

                $query = "SELECT * FROM (
                   
                    SELECT * FROM " . $this->tableName. " WHERE " . $this->tableName. ".trasmitter  = :user1 AND " . $this->tableName. ".receiver = :user2 
                    UNION 
                    SELECT * FROM " . $this->tableName. " WHERE " . $this->tableName. ".trasmitter  = :user2 AND " . $this->tableName. ".receiver = :user1

                ) AS R ORDER BY id;";

                $parameters["user1"] = $user1;
                $parameters["user2"] = $user2;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);                          
                $resulArrayObject = $this->getArrayChatDAO($resultSet);
                return $resulArrayObject;

            } catch (Exception $e){   
                
                throw $e;
            }
        }

        private function getArrayChatDAO($array){

            $chatList = array();

            foreach ($array as $key => $value) {

                $chat = new Chat();
                $chat->setDate($value["date"]);
                $chat->setTransmitter($value["trasmitter"]);
                $chat->setReceiver($value["receiver"]);
                $chat->setMessage($value["message"]);

                array_push($chatList, $chat);
            }

            return $chatList;
        }

    } 
?>