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
	if (($_POST['vendor_name']!='') && ($_POST['vendor_address']!='') && ($_POST['vendor_phone']!=''))
	{
		$query='UPDATE vendor SET vendor_name="'.$_POST['vendor_name'].'", address="'.$_POST['vendor_address'].'", phone="'.$_POST['vendor_phone'].'" WHERE vendor_id='.$_POST['vendor_id'];
		$sql=mysql_query($query, $conn_id);
		$_SESSION['vendor']=1;
	}
	else if (($_POST['location_name']!=''))
	{
		$query='UPDATE location SET location_name="'.$_POST['location_name'].'" WHERE location_id='.$_POST['location_id'];
		$sql=mysql_query($query, $conn_id);
		$_SESSION['location']=1;
	}
	else if (($_POST['name']!='') && ($_POST['manufacturer']!='') && ($_POST['purchaseddate']!='') && ($_POST['cost']!='') && ($_POST['shipment_cost']!='') && ($_POST['item_vendor']!='') && ($_POST['instlocation']!=''))
	{
		$query='UPDATE item SET item_name="'.$_POST['name'].'", manufacturer="'.$_POST['manufacturer'].'", purchase_date="'.$_POST['purchaseddate'].'", cost="'.$_POST['cost'].'", shipment_cost="'.$_POST['shipment_cost'].'", vendor_id="'.$_POST['item_vendor'].'", location_id="'.$_POST['instlocation'].'" WHERE item_id='.$_POST['item_id'];
		$sql=mysql_query($query, $conn_id);
		$query='SELECT item.item_id, item.purchase_date FROM item ORDER BY item_id DESC LIMIT 0, 1';
		$sql=mysql_query($query, $conn_id);;
		$row=mysql_fetch_array($sql);
		$query='UPDATE hardware SET item_id='.$row['item_id'].', serial_number="'.$_POST['serial_no'].'", mfg_date="'.$_POST['mfg_date'].'", warranty_period="'.$_POST['warranty'].'" WHERE item_id='.$_POST['item_id'];
		$sql=mysql_query($query, $conn_id);
		$query='UPDATE licensed_software SET item_id='.$row['item_id'].', licensed_key="'.$_POST['licensed_key'].'", expiry_date=DATE_ADD("'.$row['purchase_date'].'", INTERVAL '.$_POST['exp_period'].' MONTH), reg_user="'.$_POST['reg_user'].'" WHERE item_id='.$_POST['item_id'];
		$sql=mysql_query($query, $conn_id);
		$_SESSION['item']=1;
	}
	header ("Location: modify.php");
?>
