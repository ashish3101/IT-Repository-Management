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
			<form>
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
							<td><input type='text' name='purchased_date' />
							<td style='width: 10%;'></td>
							<td>Cost</td>
							<td><input type='text' name='cost' />
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
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['vendor_id']."\">".$row['vendor_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
							<td style='width: 10%;'></td>
							<td>Installed Location</td>
							<td>
								<select name='installed_location'>
<?php
	$query='SELECT location.location_id, location.location_name FROM location';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['location_id']."\">".$row['location_name']."</option>\n";
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
							<td><input type='text' name='serial_no' required/>
							<td style='width: 10%;'></td>
							<td>Mfg. Date</td>
							<td><input type='text' name='mfg_date' />
						</tr>
						<tr>
							<td>Warranty Period</td>
							<td><input type='text' name='warranty_period' placeholder='Months' />
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
							<td><input type='text' name='licensed_key' required/>
						</tr>
						<tr>
							<td>Expiration Period</td>
							<td><input type='text' name='expiration_period' />
							<td style='width: 10%;'></td>
							<td>Purchased Date</td>
							<td><input type='text' name='purchased_date' />
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
							<td><input type='text' name='vendor_name' />
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
				<fieldset id='complaints' style='display: none;'>
					<legend>Complaints</legend>
					<table>
						<tr>
							<td>Item</td>
							<td>
								<select name='complaint_item'>
<?php
	$query='SELECT item.item_id, item.item_name FROM item';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['item_id']."\">".$row['item_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
							<td style='width: 10%;'></td>
							<td>Complaint Date</td>
							<td><input type='text' name='complaint_date' /></td>
						</tr>
						<tr>
							<td>Resloved Date</td>
							<td><input type='text' name='resolved_date' readonly value='7 days from complaint date' /></td>
							<td style='width: 10%;'></td>
							<td>Complaint</td>
							<td><textarea name='complaint'></textarea></td>
						</tr>
						<tr>
							
						</tr>
					</table>
					<input style='float: right;' type='submit' value='Submit' />
				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>
