<?php namespace DAO;

    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Chat as Chat;

    class ChatDAO {
        
        private $connection;
        private $tableName = "chat";

        public function addDAO($value){

            try {

                $query = "INSERT INTO ".$this->tableName." (date, tranmitter, receiver, message) VALUES (:date, :trasmitter, :receiver, :message)";

                $parameters["date"]         = $value->getDate();
                $parameters["trasmitter"]  = $value->getTrasmitter();
                $parameters["receiver"]     = $value->getReceiver();
                $parameters["message"]      = $value->getMessage();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $e){

                throw $e;
            }  
        }

        public function getAllDAO($user1, $user2){

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

        public function getAllUserList($user){

            try {

                $query = "SELECT userToken FROM (
                   
                    SELECT id, receiver AS userToken FROM " . $this->tableName. " WHERE " . $this->tableName. ".trasmitter  = :user

                    UNION 

                    SELECT id, trasmitter AS userToken FROM " . $this->tableName. " WHERE " . $this->tableName. ".receiver = :user

                ) AS R GROUP BY userToken ORDER BY id;";

                $parameters["user"] = $user;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);    

                $chatUserList = array();

                foreach ($resultSet as $key => $token) {                

                    array_push($chatUserList, $token);
                }
                
                return $chatUserList;

            } catch (Exception $e){   
                
                throw $e;
            }
        }

        private function getArrayChatDAO($array){

            $chatList = array();

            foreach ($array as $key => $value) {

                $chat = new Chat();
                $chat->setDate($value["date"]);
                $chat->setTrasmitter($value["trasmitter"]);
                $chat->setReceiver($value["receiver"]);
                $chat->setMessage($value["message"]);

                array_push($chatList, $chat);
            }

            return $chatList;
        } 
    } 
?>