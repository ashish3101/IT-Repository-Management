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
<pre>
<?php
	session_start ();
	if (($_POST['name']!='') && ($_POST['manufacturer']!='') && ($_POST['purchaseddate']!='') && ($_POST['cost']!='') && ($_POST['shipment_cost']!='') && ($_POST['item_vendor']!='') && ($_POST['instlocation']!=''))
	{
		print_r ($_POST);
		$query='INSERT INTO item (item_name, manufacturer, purchase_date, cost, shipment_cost, vendor_id, location_id) VALUES ("'.$_POST['name'].'", "'.$_POST['manufacturer'].'", "'.$_POST['purchaseddate'].'", "'.$_POST['cost'].'", "'.$_POST['shipment_cost'].'", "'.$_POST['item_vendor'].'", "'.$_POST['instlocation'].'")';
		$sql=mysql_query($query, $conn_id);
		$query='SELECT item.item_id, item.purchase_date FROM item ORDER BY item_id DESC LIMIT 0, 1';
		$sql=mysql_query($query, $conn_id);
		$row=mysql_fetch_array($sql);
		$query='INSERT INTO hardware (item_id, serial_number, mfg_date, warranty_period) VALUES ('.$row['item_id'].', "'.$_POST['serial_no'].'", "'.$_POST['mfg_date'].'", "'.$_POST['warranty'].'")';
		$sql=mysql_query($query, $conn_id);
		$query='INSERT INTO licensed_software (item_id, licensed_key, expiry_date, reg_user) VALUES ('.$row['item_id'].', "'.$_POST['licensed_key'].'", DATE_ADD("'.$row['purchase_date'].'", INTERVAL '.$_POST['exp_period'].' MONTH), "'.$_POST['reg_user'].'")';
		$sql=mysql_query($query, $conn_id);
		$query='SELECT item.item_id FROM item ORDER BY item_id DESC LIMIT 0, 1';
		$sql=mysql_query($query, $conn_id);
		$row=mysql_fetch_array($sql);
		$query='UPDATE item SET item.replaced_item_id='.$row['item_id'].' WHERE item_id='.$_POST['previousid'];
		$sql=mysql_query($query, $conn_id);
		$query='UPDATE item SET item.replaced=1 WHERE item_id='.$_POST['previousid'];
		$sql=mysql_query($query, $conn_id);
		$_SESSION['item']=1;
	}
	header ("Location: complaints.php");
?>
</pre>
