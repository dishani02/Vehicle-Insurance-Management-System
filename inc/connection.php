<?php 
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "drive_peak";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno()) {
		die('Database connection Failed' .mysqli_connect_error());
	}
	else{
		//echo "Database connection Successful";
	}

 ?> 