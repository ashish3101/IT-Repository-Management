<?php
	$hostname = 'localhost';
	$dbname   = 'itpero1';
	$username = 'root';
	$password = 'anshul';

	$conn_id = mysql_connect($hostname, $username, $password);
	if (!$conn_id)
		die('Unable to Connect to the Mysql Server. Please try again later!!'.mysql_error());
	if (!mysql_select_db($dbname, $conn_id))
		die('Database Unavailable. Please try again later!!');
?>
<?php
	session_start ();
	$query = 'DELETE FROM item WHERE item_id='.$_POST['item_id'];
	$sql=mysql_query($query, $conn_id);
	$_SESSION ['d_item'] = 1;
	header ("Location: delete.php");
?>
