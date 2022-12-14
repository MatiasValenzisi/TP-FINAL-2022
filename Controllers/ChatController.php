<?php namespace Controllers;

    use DAO\ChatDAO as ChatDAO;
    use Models\Chat as Chat;
    use \Exception as Exception;

    class ChatController {

        private $chat;
        private $chatDAO;

        public function __construct(){
            
            $this->chat     = new Chat();
            $this->chatDAO  = new ChatDAO();
        }

        public function app($tokenGuardian, $tokenOwner){

            try {
                
                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/chatNav.php";
                require_once ROOT_VIEWS."/chatView.php";
                require_once ROOT_VIEWS."/mainFooter.php";  
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/chat/unknown"); 
            }               
        }

        public function appAction($tokenGuardian, $tokenOwner){

            $time = time();
            echo date("d-m-Y (H:i:s)", $time)." <br><br>";

            $chatList = $this->chatDAO->getAllDAO($tokenGuardian, $tokenOwner);

            foreach ($chatList as $key => $chat) {
                var_dump($chat);
                echo "<br><br>";
            }

        }

        public function list(){

            $userList = $this->chatDAO->getAllUserList($_SESSION['userPH']->getToken());

            foreach ($userList as $key => $user) {
                var_dump($user);
                echo "<br><br>";
            }
        }

    }
?>