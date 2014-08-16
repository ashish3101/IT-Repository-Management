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
	if (($_POST['complaint_item']!='') && ($_POST['complaint_date']!='') && ($_POST['complaint']!=''))
	{
		$query='INSERT INTO complaint (item_id, complaint_date, resolved_date, complaint) VALUES ("'.$_POST['complaint_item'].'", "'.$_POST['complaint_date'].'", DATE_ADD("'.$_POST['complaint_date'].'", INTERVAL 7 DAY), "'.$_POST['complaint'].'")';
		$sql=mysql_query($query, $conn_id);
		$query='UPDATE item SET complaint=1 WHERE item_id='.$_POST['complaint_item'];
		$sql=mysql_query($query, $conn_id);
		$_SESSION['complaint']=1;
	}
	header ("Location: complaints.php");
?>
