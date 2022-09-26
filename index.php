<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php
		/*
		echo '<script type="text/javascript">sweetAlert("Congratulations !","Successfully booked for a vehicle, email has been sent to approver","success")</script>';

		echo '<script type="text/javascript">sweetAlert("Error !","Try again !","error")</script>';
		*/ 
	?>

</head>


<?php  

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	//error_reporting (E_ERROR | E_WARNING | E_PARSE);

	session_start();
	
	require "Config/Autoload.php";	
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router as Router;
	use Config\Request as Request;
	
	use Controllers\SignController as SignController;
	
	Autoload::start();	

	if (isset($_SESSION['userPH'])){			
		$signController = new SignController();
		$signController->checkSession();
	}

	Router::Route(new Request());	
?>