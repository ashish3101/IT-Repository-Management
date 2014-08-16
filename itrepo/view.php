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
					<li style='padding: 6px;'><a href="view.php">View</a>
						<ul>
							<li onclick="showstuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff('vendor'); hidestuff('locationdetails'); hidestuff('complaints');"><a href="#">Item Details</a></li>
							<li onclick="hidestuff('itemdetails'); showstuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff('vendor'); hidestuff('locationdetails'); hidestuff('complaints');"><a href="#">Hardware Details</a></li>
							<li onclick="hidestuff('itemdetails'); hidestuff('hardwaredetails'); showstuff('licenseddetails'); hidestuff('vendor'); hidestuff('locationdetails'); hidestuff('complaints');"><a href="#">Software Details</a></li>
							<li onclick="hidestuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); showstuff('vendor'); hidestuff('locationdetails'); hidestuff('complaints');"><a href="#">Vendor Details</a></li>
							<li onclick="hidestuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff('vendor'); showstuff('locationdetails'); hidestuff('complaints');"><a href="#">Location Details</a></li>
							<li onclick="hidestuff('itemdetails'); hidestuff('hardwaredetails'); hidestuff('licenseddetails'); hidestuff('vendor'); hidestuff('locationdetails'); showstuff('complaints');"><a href="#">Complaints</a></li>
							</ul>
					</li>
					<li style='padding: 6px;'><a href="search.php">Search</a></li>
					<li style='padding: 6px;'><a href="complaints.php">Complaints</a></li>
				</ul>
			</nav>
		</header>
		<br /><br /><br />
		<div id="about">
		<div id='view'>
		<br /><br /><br />
		<center>
		<fieldset id='itemdetails' style='display: none;'>
			<legend>Item Details</legend>
			<table>
				<tr>
					<th style='padding: 10px; margin: 10px;'>Item Id</th>
					<th style='padding: 10px; margin: 10px;'>Item Name</th>
					<th style='padding: 10px; margin: 10px;'>Manufacturer</th>
					<th style='padding: 10px; margin: 10px;'>Purchase Date</th>
					<th style='padding: 10px; margin: 10px;'>Cost</th>
					<th style='padding: 10px; margin: 10px;'>Shipment Cost</th>
					<th style='padding: 10px; margin: 10px;'>Location</th>
					<th style='padding: 10px; margin: 10px;'>Complaint</th>
					<th style='padding: 10px; margin: 10px;'>Replaced Id</th>
				</tr>
<?php
		$query='SELECT * FROM item JOIN location ON item.location_id=location.location_id ORDER BY item.item_id ASC';
		
		$sql=mysql_query($query, $conn_id);
		if ($sql)
		{
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['item_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['manufacturer'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['purchase_date'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['cost'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['shipment_cost'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['location_name'].'</td>';
					if ($row['complaint'] == 1)
					{
						echo '<td style="padding: 10px; margin: 10px;">Yes</td>';
					}
					else
					{
						echo '<td style="padding: 10px; margin: 10px;">No</td>';
					}
					if ($row['replaced_item_id'])
					{
						echo '<td style="padding: 10px; margin: 10px;">'.$row['replaced_item_id'].'</td>';
					}
					else
					{
						echo '<td style="padding: 10px; margin: 10px;"> -- </td>';
					}
				echo '</tr>';
				
			}
		}
?>		
		</table>
		</fieldset>
		</center>
		<br /><br />
		<center>
		<fieldset id='vendor' style='display: none;'>
			<legend>Vendor Details</legend>
		<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Vendor Id</th>
				<th style='padding: 10px; margin: 10px;'>Vendor Name</th>
				<th style='padding: 10px; margin: 10px;'>Address</th>
				<th style='padding: 10px; margin: 10px;'>Phone</th>
			</tr>
<?php
		$query='SELECT * FROM vendor';
		
		$sql=mysql_query($query, $conn_id);
		if ($sql)
		{
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['vendor_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['vendor_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['address'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['phone'].'</td>';
			}
		}
?>		
		</table>
		</fieldset>
		</center>
		<center>
		<fieldset id='hardwaredetails' style='display: none;'>
			<legend>Hardware Details</legend>
		<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Item Id</th>
				<th style='padding: 10px; margin: 10px;'>Serial Number</th>
				<th style='padding: 10px; margin: 10px;'>Mfg. Date</th>
				<th style='padding: 10px; margin: 10px;'>Warranty Period</th>
			</tr>
<?php
		$query='SELECT * FROM hardware';
		
		$sql=mysql_query($query, $conn_id);
		if ($sql)
		{
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['serial_number'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['mfg_date'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['warranty_period'].'</td>';
			}
		}
?>		
</table>
</fieldset>
</center>		
		<center>
		<fieldset id='licenseddetails' style='display: none;'>
			<legend>Software Details</legend>
		<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Item ID</th>
				<th style='padding: 10px; margin: 10px;'>Licensed Key</th>
				<th style='padding: 10px; margin: 10px;'>Registered User</th>
				<th style='padding: 10px; margin: 10px;'>Expiry ID</th>
			</tr>
<?php
		$query='SELECT * FROM licensed_software';
		
		$sql=mysql_query($query, $conn_id);
		if ($sql)
		{
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['licensed_key'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['reg_user'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['expiry_date'].'</td>';
			}
		}
?>		
</table>
</fieldset>
</center>
			<center>
		<fieldset id='locationdetails' style='display: none;'>
			<legend>Location Details</legend>
		<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Location ID</th>
				<th style='padding: 10px; margin: 10px;'>Location Name</th>
			</tr>
<?php
		$query='SELECT * FROM location';
		
		$sql=mysql_query($query, $conn_id);
		if ($sql)
		{
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['location_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['location_name'].'</td>';
			}
		}
?>		
</table>
</fieldset>
</center>
			<center>
		<fieldset id='complaints' style='display: none;'>
			<legend>Complaints</legend>
		<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Complaint ID</th>
				<th style='padding: 10px; margin: 10px;'>Item ID</th>
				<th style='padding: 10px; margin: 10px;'>Cost</th>
				<th style='padding: 10px; margin: 10px;'>Complaint Date</th>
				<th style='padding: 10px; margin: 10px;'>Resolved Date</th>
				<th style='padding: 10px; margin: 10px;'>Complaint</th>
			</tr>
<?php
		$query='SELECT * FROM complaint';
		
		$sql=mysql_query($query, $conn_id);
		if ($sql)
		{
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['complaint_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['cost'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['complaint_date'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['resolved_date'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['complaint'].'</td>';
			}
		}
?>		
</table>
</fieldset>
</center>	
		</div>
		</div>
	<footer style='position: fixed; bottom: 0px; padding: 10px; font-align: center; color: #920131;'>
	</footer>
</body>
</html>
