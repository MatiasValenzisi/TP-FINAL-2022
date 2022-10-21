<?php namespace DAO;

    use DAO\IDAO as IDAO; 
    use DAO\Connection as Connection;

    use \Exception as Exception;

    use Models\Review as Review;

    class ReviewDAO implements IDAO {

        private $connection;
        private $tableName = "review";

        public function addDAO($value){

        }
        
        public function getAllDAO(){

        }   
      
    }
?>