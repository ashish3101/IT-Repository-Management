<?php
	$hostname = 'localhost';
	$dbname   = 'itrepo';
	$username = 'root';
	$password = 'anshul';

//CONNECT TO SQL SERVER
	$conn_id = mysql_connect($hostname, $username, $password);
	if (!$conn_id)
		die('Unable to Connect to the Mysql Server. Please try again later!!'.mysql_error());
//SELECT THE DATABASE
	if (!mysql_select_db($dbname, $conn_id))
		die('Database Unavailable. Please try again later!!');
?>
