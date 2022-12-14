<?php namespace Controllers;

    use Controllers\UserController as UserController;
    use DAO\ChatDAO as ChatDAO;
    use Models\Chat as Chat;
    use \Exception as Exception;

    class ChatController {

        private $chat;
        private $chatDAO;
        private $userController;

        public function __construct(){
            
            $this->chat           = new Chat();
            $this->chatDAO        = new ChatDAO();
            $this->userController = new UserController();
        }

        public function app($tokenGuardian, $tokenOwner){

            try {

                $receiver = $this->userController->getUserToken($tokenGuardian);
                $trasmitter = $this->userController->getUserToken($tokenOwner);

                if ($tokenGuardian == $_SESSION['userPH']->getToken()){

                    $receiver = $this->userController->getUserToken($tokenOwner);
                    $trasmitter = $this->userController->getUserToken($tokenGuardian);
                } 

                $receiverToken = $receiver->getToken();
                $trasmitterToken = $trasmitter->getToken();
        
                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/chatNav.php";
                require_once ROOT_VIEWS."/chatView.php";
                require_once ROOT_VIEWS."/mainFooter.php";  
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/chat/unknown"); 
            }               
        }

        public function appAction($tokenGuardian, $tokenOwner){

            try {
                
                if ($tokenGuardian == $_SESSION['userPH']->getToken()){

                    $receiver = $this->userController->getUserToken($tokenOwner);
                    $trasmitter = $this->userController->getUserToken($tokenGuardian);

                } else {

                    $receiver   = $this->userController->getUserToken($tokenGuardian);
                    $trasmitter = $this->userController->getUserToken($tokenOwner);
                }

                $chatList = $this->chatDAO->getAllDAO($tokenGuardian, $tokenOwner);

                require_once ROOT_VIEWS."/chatAppView.php";
                
            } catch (Exception $e) {

                throw $e;
            }
        }

        public function messageAction(){

            try {

                $receiver   = $_POST['receiver'];
                $trasmitter = $_POST['trasmitter'];
                $message    = $_POST['message'];

                $tokenOwner    = $trasmitter;
                $tokenGuardian = $receiver;

                if ($trasmitter == $_SESSION['userPH']->getToken()) {

                    $tokenOwner    = $receiver;
                    $tokenGuardian = $trasmitter;
                } 

                $this->chatDAO->addDAO($trasmitter, $receiver, $message);

                header("Location: ".FRONT_ROOT."/chat/app/".$tokenGuardian."/".$tokenOwner); 
                
            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/chat/unknown"); 
            }
        }

        public function contact(){

            try {

                $contactList = $this->chatDAO->getContactList($_SESSION['userPH']->getToken());
                $userList = array();
                
                foreach ($contactList as $key => $contact) {

                    $user = $this->userController->getUserToken($contact['userToken']);

                    if (!is_null($user)){
                        array_push($userList, $user);
                    }                
                }

                require_once ROOT_VIEWS."/mainHeader.php";
                require_once ROOT_VIEWS."/mainNav.php";
                require_once ROOT_VIEWS."/chatContactListView.php";
                require_once ROOT_VIEWS."/mainFooter.php";

            } catch (Exception $e) {

                header("Location: ".FRONT_ROOT."/home/administration/error/chat/unknown"); 
            }
        }
    }
?>