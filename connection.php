<?php
	//Connection Details
	$Server="localhost";
	$User="root";
	$Pass="";
	$DB="online_exams";

	//Creating Connection
	$Connection =new mysqli($Server,$User,$Pass,$DB);

	//Check Connectivity
	if($Connection->connect_error)
		{
			$_SESSION['message'] = "Connection failed: " . $Connection->connect_error;
			$_SESSION['msg_type'] = "danger";
		}
?>