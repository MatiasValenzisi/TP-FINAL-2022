<?php  
	require 'Config/Config.php';

	require_once 'Views/main-header.php';
	require_once 'Views/temporal-login.php';

	function debug_to_console($data) {
	    $output = $data;
	    if (is_array($output))
	        $output = implode(',', $output);
	    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
?>
 
