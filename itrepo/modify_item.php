<!DOCTYPE html>
<html>
<head>
	<title>
		IT Repository Management
	</title>
	<link href="images/icon_32.jpg" rel="icon" type="image/jpg" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="js/show_hide.js"></script>
</head>
<body>
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
	if ($_SESSION['user']!="admin")
	{
		header ("Location: index.php");
	}
	if ($_POST['item_id'] != '')
	{
		$_SESSION['item_edit']=1;
		echo "<script type='text/javascript'>showstuff('itemdetails');</script>";
	}
	if ($_POST['vendor_id'] != '')
	{
		$_SESSION['vendor_edit']=1;
		echo "<script type='text/javascript'>showstuff('vendordetails');</script>";
	}
	if ($_POST['location_id'] != '')
	{
		$_SESSION['location_edit']=1;
		echo "<script type='text/javascript'>showstuff('locationdetails');</script>";
	}
	
?>
	<div id="container">
		<div id="heading"><a href='panel.php'>Control Panel</a></div>
		<div style='float: right;'><a href='logout.php'>Logout</a></div>
		<br /><br />
		<header>
			<nav style='align: center;'>
				<ul id="menu">
					<li style='padding: 6px;'><a href="add.php">Add</a></li>
					<li style='padding: 6px;'><a href="delete.php">Delete</a></li>
					<li style='padding: 6px;'><a href="modify.php">Modify</a></li>
					<li style='padding: 6px;'><a href="view.php">View</a></li>
					<li style='padding: 6px;'><a href="search.php">Search</a></li>
					<li style='padding: 6px;'><a href="complaints.php">Complaints</a></li>
				</ul>
			</nav>
		</header>
		<br /><br /><br />
		<div id="about">
			<form method="POST" action='complaint_update.php'>
			<?php
	$query='SELECT * FROM item WHERE item.item_id = '.$_GET['item_id'];
	$sql=mysql_query($query, $conn_id);
	$row=mysql_fetch_array ($sql);
	$lid=$row['location_id'];
	$vid=$row['vendor_id'];
?>
				<fieldset id='itemdetails'>
					<legend>Item Details</legend>
					<table class='add_item'>
						<tr>
							<td>Name</td>
							<td><input type='text' name='name' value=<?php echo $row['item_name'] ?>>
							<td style='width: 10%;'></td>
							<td>Manufacturer</td>
							<td><input type='text' name='manufacturer' value=<?php echo $row['manufacturer'] ?>>
						</tr>
						<tr>
							<td>Purchased Date</td>
							<td><input type='text' name='purchaseddate' value=<?php echo $row['purchase_date'] ?> ></td>
							<td style='width: 10%;'></td>
							<td>Cost</td>
<?php
	$query1='SELECT * FROM item JOIN hardware on item.item_id = hardware.item_id JOIN complaint ON item.item_id=complaint.item_id WHERE item.complaint=1 AND TIMESTAMPDIFF (DAY, complaint.complaint_date , DATE_ADD(item.purchase_date, INTERVAL hardware.warranty_period MONTH)) >0';
	$sql1=mysql_query($query1,$conn_id);
	$row1=mysql_fetch_array($sql1);
	if ($row1 != '')
		$warrantyflag=1;
?>
							<td><input type='text' name='cost' value="<?php echo $row['cost'] ?>"  <?php if ($warrantyflag) echo "readonly"; ?> /></td>
						</tr>
						<tr>
							<td>Shipment Cost</td>
							<td><input type='text' name='shipment_cost' value="<?php echo $row['shipment_cost'] ?>"  <?php if ($warrantyflag) echo "readonly"; ?> />
							<td style='width: 10%;'></td>
							<td>
								Item Type
							</td>
							<td>
								<input type='radio' name='item_type' value='Hardware' onclick="showstuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff ('freeware_submit');" /><label>Hardware</label><br />
								<input type='radio' name='item_type' value='Licensed' onclick="hidestuff('hardwaredetails'); showstuff('licenseddetails'); hidestuff ('freeware_submit');" /><label>Licensed</label><br />
								<input type='radio' checked='checked' name='item_type' value='Freeware' onclick="hidestuff('hardwaredetails'); hidestuff('licenseddetails'); showstuff ('freeware_submit');" /><label>Freeware</label><br />
							</td>
						</tr>
						<tr>
							<td>Vendor</td>
							<td>
								<select name='item_vendor' >
<?php
	$query='SELECT vendor.vendor_id, vendor.vendor_name FROM vendor';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			if ($row['vendor_id'] != $vid)
				echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['vendor_id']."\" value=\"".$row['vendor_id']."\">".$row['vendor_name']."</option>\n";
			else
				echo "\t\t\t\t\t\t\t\t\t<option selected name=\"".$row['vendor_id']."\" value=\"".$row['vendor_id']."\">".$row['vendor_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
							<td style='width: 10%;'></td>
							<td>Installed Location</td>
							<td>
								<select name='instlocation'>
<?php
	$query='SELECT location.location_id, location.location_name FROM location';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			if ($row['location_id'] != $lid)
				echo "\t\t\t\t\t\t\t\t\t<option value=\"".$row['location_id']."\">".$row['location_name']."</option>\n";
			else
				echo "\t\t\t\t\t\t\t\t\t<option selected value=\"".$row['location_id']."\">".$row['location_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
						</tr>
					</table>
					<input id='freeware_submit' style='float: right; display: none;' type='submit' value='Submit' />
				</fieldset>
<?php
	$query='SELECT * FROM hardware WHERE hardware.item_id = '.$_GET['item_id'];
	$sql=mysql_query($query, $conn_id);
	$row=mysql_fetch_array ($sql);
?>

				<fieldset id='hardwaredetails' style='display: none;'>
					<legend>Hardware Details</legend>
					<table class='add_item'>
						<tr>
							<td>Serial Number</td>
							<td><input type='text' name='serial_no' value="<?php echo $row['serial_number'] ?>">
							<td style='width: 10%;'></td>
							<td>Mfg. Date</td>
							<td><input type='text' name='mfg_date' value="<?php echo $row['mfg_date'] ?>">
						</tr>
						<tr>
							<td>Warranty Period</td>
							<td><input type='text' name='warranty' value="<?php echo $row['warranty_period'] ?>"  <?php if ($warrantyflag) echo "readonly"; ?> />
						</tr>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
<!--<?php
	$query='SELECT * FROM licensed_software WHERE licensed_software.item_id = '.$_GET['item_id'];
	$sql=mysql_query($query, $conn_id);
	$row=mysql_fetch_array ($sql);
?>
				<fieldset id='licenseddetails' style='display: none;'>
					<legend>Licensed Details</legend>
					<table class='add_item'>
						<tr>
							<td>Registered User</td>
							<td><input type='text' name='reg_user' />
							<td style='width: 10%;'></td>
							<td>Licensed Key</td>
							<td><input type='text' name='licensed_key'/>
						</tr>
						<tr>
							<td>Expiration Period</td>
							<td><input type='text' name='exp_period' />
						</tr>
						<input type='hidden' value="<?php echo $_GET['item_id'] ?>" name='previousid'/>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>-->
<?php
	$query='SELECT * FROM licensed_software WHERE licensed_software.item_id = '.$_GET['item_id'];
	$query2='SELECT * FROM item WHERE item.item_id='.$_GET['item_id'];
	$sql2=mysql_query($query2, $conn_id);
	$row2=mysql_fetch_array ($sql2);
	$sql=mysql_query($query, $conn_id);
	$row=mysql_fetch_array ($sql);
	$query1='SELECT ROUND (DATEDIFF ("'.$row['expiry_date'].'", "'.$row2['purchase_date'].'") / 30) As months';
	$sql1=mysql_query($query1, $conn_id);
	$row1=mysql_fetch_array ($sql1);
?>
				<fieldset id='licenseddetails' style='display: none;'>
					<legend>Licensed Details</legend>
					<table class='add_item'>
						<tr>
							<td>Registered User</td>
							<td><input type='text' name='reg_user' value="<?php echo $row['reg_user'] ?>" />
							<td style='width: 10%;'></td>
							<td>Licensed Key</td>
							<td><input type='text' name='licensed_key' value="<?php echo $row['licensed_key'] ?>" />
						</tr>
						<tr>
							<td>Expiration Period</td>
							<td><input type='text' name='exp_period' value="<?php echo $row1['months'] ?>" />
						</tr>
						<input type='hidden' value="<?php echo $_GET['item_id'] ?>" name='previousid'" />
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
				</form>
		</div>
	</div>
	<footer style='position: fixed; margin: 0px;'>
<?php
	if (isset($_SESSION['vendor']))
	{
		if ($_SESSION['vendor'])
			echo "Vendor details updated successfully";
		$_SESSION['vendor']=0;
	}
	if (isset($_SESSION['location']))
	{
		if ($_SESSION['location'])
			echo "Location details updated successfully";
		$_SESSION['location']=0;
	}
	if (isset($_SESSION['item']))
	{
		if ($_SESSION['item'])
			echo "Item details updated successfully";
		$_SESSION['item']=0;
	}
	if (isset($_SESSION['complaint']))
	{
		if ($_SESSION['complaint'])
			echo "Complaint details updated successfully";
		$_SESSION['complaint']=0;
	}
?>
		</footer>
</body>
</html>
