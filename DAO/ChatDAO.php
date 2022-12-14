<?php namespace DAO;

    use DAO\Connection as Connection;
    use \Exception as Exception;
    use Models\Chat as Chat;

    class ChatDAO {
        
        private $connection;
        private $tableName = "chat";

        public function addDAO($trasmitter, $receiver, $message){

            try {

                $query = "INSERT INTO ".$this->tableName." (trasmitter, receiver, message) VALUES (:trasmitter, :receiver, :message)";

                $parameters["trasmitter"]   = $trasmitter;
                $parameters["receiver"]     = $receiver;
                $parameters["message"]      = $message;

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

        public function getContactList($token){

            try {

                $query = "SELECT userToken FROM (
                   
                    SELECT id, receiver AS userToken FROM " . $this->tableName. " WHERE " . $this->tableName. ".trasmitter  = :token

                    UNION 

                    SELECT id, trasmitter AS userToken FROM " . $this->tableName. " WHERE " . $this->tableName. ".receiver = :token

                ) AS R GROUP BY userToken ORDER BY id;";

                $parameters["token"] = $token;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);    

                $chatUserList = array();

                foreach ($resultSet as $key => $tokenUser) {                

                    array_push($chatUserList, $tokenUser);
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