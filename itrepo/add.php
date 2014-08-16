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
?>
	<div id="container">
		<div id="heading"><a href='panel.php'>Control Panel</a></div>
		<div style='float: right;'><a href='logout.php'>Logout</a></div>
		<br /><br />
		<header>
			<nav style='align: center;'>
				<ul id="menu">
					<li style='padding: 6px;'><a href="add.php">Add</a>
						<ul>
							<li onclick="showstuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff('vendordetails'); hidestuff('locationdetails'); hidestuff('complaints');"><a href="#">Item Details</a></li>
							<li onclick="hidestuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); showstuff('vendordetails'); hidestuff('locationdetails'); hidestuff('complaints');"><a href="#">Vendor Details</a></li>
							<li onclick="hidestuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff('vendordetails'); showstuff('locationdetails'); hidestuff('complaints');"><a href="#">Location Details</a></li>
						</ul>
					</li>
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
			<form method="POST" action='submit.php'>
				<fieldset id='itemdetails' style='display: none;'>
					<legend>Item Details</legend>
					<table class='add_item'>
						<tr>
							<td>Name</td>
							<td><input type='text' name='name' />
							<td style='width: 10%;'></td>
							<td>Manufacturer</td>
							<td><input type='text' name='manufacturer' />
						</tr>
						<tr>
							<td>Purchased Date</td>
							<td><input type='text' name='purchaseddate' /></td>
							<td style='width: 10%;'></td>
							<td>Cost</td>
							<td><input type='text' name='cost' /></td>
						</tr>
						<tr>
							<td>Shipment Cost</td>
							<td><input type='text' name='shipment_cost' />
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
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['vendor_id']."\" value=\"".$row['vendor_id']."\">".$row['vendor_name']."</option>\n";
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
			echo "\t\t\t\t\t\t\t\t\t<option value=\"".$row['location_id']."\">".$row['location_name']."</option>\n";
		}
		
	}
?>	
								</select>
							</td>
						</tr>
					</table>
					<input id='freeware_submit' style='float: right;' type='submit' value='Submit' style='display: none;' />
				</fieldset>
				<fieldset id='hardwaredetails' style='display: none;'>
					<legend>Hardware Details</legend>
					<table class='add_item'>
						<tr>
							<td>Serial Number</td>
							<td><input type='text' name='serial_no' />
							<td style='width: 10%;'></td>
							<td>Mfg. Date</td>
							<td><input type='text' name='mfg_date' />
						</tr>
						<tr>
							<td>Warranty Period</td>
							<td><input type='text' name='warranty' placeholder='Months' />
						</tr>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
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
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
				<fieldset id='vendordetails' style='display: none;'>
					<legend>Vendor Details</legend>
					<table class='add_item'>
						<tr>
							<td>Vendor Name</td>
							<td><input type='text' name='vendor_name' />
							<td style='width: 10%;'></td>
							<td>Address</td>
							<td><input type='text' name='vendor_address' />
						</tr>
						<tr>
							<td>Phone Number</td>
							<td><input type='text' name='vendor_phone' />
						</tr>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
				<fieldset id='locationdetails' style='display: none;'>
					<legend>Location Details</legend>
					<table class='add_item'>
						<tr>
							<td>Location Name</td>
							<td><input type='text' name='location_name' /></td>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
			</form>
		</div>
	</div>
	<footer style='position: fixed; bottom: 0px; padding: 10px; font-align: center; color: #920131;'>
<?php
	if (isset($_SESSION['vendor']))
	{
		if ($_SESSION['vendor'])
			echo "Vendor details entered successfully";
		$_SESSION['vendor']=0;
	}
	if (isset($_SESSION['location']))
	{
		if ($_SESSION['location'])
			echo "Location details entered successfully";
		$_SESSION['location']=0;
	}
	if (isset($_SESSION['item']))
	{
		if ($_SESSION['item'])
			echo "Item details entered successfully";
		$_SESSION['item']=0;
	}
	if (isset($_SESSION['complaint']))
	{
		if ($_SESSION['complaint'])
			echo "Complaint details entered successfully";
		$_SESSION['complaint']=0;
	}
?>
		</footer>
</body>
</html>
