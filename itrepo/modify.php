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
			<form method="POST" action='modify1.php'>
				<fieldset id='itemdetails' >
					<legend>Item Details</legend>
					<table class='add_item'>
						<tr>
							<td>
								<label><input type='radio' name='modify_type' onclick="showstuff('modify_item'); hidestuff('modify_vendor'); hidestuff('modify_location')" />Modify Item</label>
								<label><input type='radio' name='modify_type' onclick="hidestuff('modify_item'); showstuff('modify_vendor'); hidestuff('modify_location')" />Modify Vendor</label>
								<label><input type='radio' name='modify_type' onclick="hidestuff('modify_item'); hidestuff('modify_vendor'); showstuff('modify_location')" />Modify Location</label>
							</td>
						</tr>
						<tr id='modify_item' style='display: none;'>
							<td>Item ID</td>
							<td>
								<select name='item_id' >
									<option></option>
<?php
	$query='SELECT item.item_id,item.item_name FROM item';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['item_id']."\" value=\"".$row['item_id']."\">".$row['item_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
						</tr>
						<tr id='modify_vendor' style='display: none;'>
							<td>Vendor ID</td>
							<td>
								<select name='vendor_id' >
									<option></option>
<?php
	$query='SELECT vendor.vendor_id,vendor.vendor_name FROM vendor';
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
						</tr>
						<tr id='modify_location' style='display: none;'>
							<td>Location ID</td>
							<td>
								<select name='location_id' >
									<option></option>
<?php
	$query='SELECT location.location_id, location.location_name FROM location';
	$sql=mysql_query($query, $conn_id);
	if ($sql)
	{
		while ($row=mysql_fetch_array ($sql))
		{
			echo "\t\t\t\t\t\t\t\t\t<option name=\"".$row['location_id']."\" value=\"".$row['location_id']."\">".$row['location_name']."</option>\n";
		}
		
	}
?>
								</select>
							</td>
						</tr>	
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
