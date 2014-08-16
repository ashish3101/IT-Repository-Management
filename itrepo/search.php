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
		<br /><br />
		<fieldset id='itemdetails' #style='display: none;'>
					<legend>Item Search</legend>
					<center>
					<form method="POST">
						<table>
							<tr>
								<td><label><input type="radio" name="item_search" value='id'> Search by ID </label></td>
							</tr>
							<tr>
								<td><br /></td>
							</tr>
							<tr>
								<td colspan=2>
									<center>
									<input type="text" name="itemsearch" placeholder="Search by ID"/>
									<input type="submit" value="Go!" />
									</center>
								</td>
							</tr>
						</table>
					</form>
					</center>
		</fieldset>
<?php
	if (isset($_POST['item_search']) && isset ($_POST['itemsearch']))
	{
		if ($_POST['item_search'] == 'id')
		{
			$query='SELECT * FROM item,vendor,location WHERE item.item_id='.$_POST['itemsearch'].' AND vendor.vendor_id=item.vendor_id AND item.location_id=location.location_id';
		}
		if (isset($query))
		{
			$sql=mysql_query($query, $conn_id);
		}
		if (isset($sql))
		{
			echo "<fieldset id='itemdetails'>
			<legend>Item Details</legend>
				<table>
					<tr>
						<th style='padding: 10px; margin: 10px;'>Item Id</th>
						<th style='padding: 10px; margin: 10px;'>Item Name</th>
						<th style='padding: 10px; margin: 10px;'>Purchase Date</th>
						<th style='padding: 10px; margin: 10px;'>Cost</th>
						<th style='padding: 10px; margin: 10px;'>Vendor Name</th>
						<th style='padding: 10px; margin: 10px;'>Location Name</th>
					</tr>";
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['item_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['purchase_date'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['cost'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['vendor_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['location_name'].'</td>';
				echo '</tr>';
			}
			echo "</table></fieldset></center>";
		}
	}
	
?>
		<fieldset id='vendordetails' #style='display: none;'>
					<legend>Vendor Search</legend>
					<center>
					<form method="POST">
						<table>
							<tr>
								<td><label><input type="radio" name="vendor_search" value='id'> Search by ID </label></td>
							</tr>
							<tr>
								<td><br /></td>
							</tr>
							<tr>
								<td colspan=2>
									<center>
									<input type="text" name="vendorsearch" placeholder="Search by ID"/>
									<input type="submit" value="Go!" />
									</center>
								</td>
							</tr>
						</table>
					</form>
					</center>
		</fieldset>
<?php
	if (isset($_POST['vendor_search']) && isset ($_POST['vendorsearch']))
	{
		if ($_POST['vendor_search'] == 'id')
		{
			$query='SELECT * FROM item, vendor  WHERE item.vendor_id='.$_POST['vendorsearch'].' AND vendor.vendor_id='.$_POST['vendorsearch'].'';
		}
		if (isset($query))
		{
			$sql=mysql_query($query, $conn_id);
		}
		if (isset($sql))
		{
			echo "<fieldset id='vendor'>
			<legend>Vendor Details</legend>
			<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Item ID</th>
				<th style='padding: 10px; margin: 10px;'>Item Name</th>
				<th style='padding: 10px; margin: 10px;'>Vendor Name</th>
			</tr>";
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>					
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['item_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['vendor_name'].'</td>';
			}
			echo "</table></fieldset></center>";
		}
	}
	
?>
		<fieldset id='locationdetails' #style='display: none;'>
					<legend>Location Search</legend>
					<center>
					<form method="POST">
						<table>
							<tr>
								<td><label><input type="radio" name="location_search" value='id'> Search by ID </label></td>
							</tr>
							<tr>
								<td><br /></td>
							</tr>
							<tr>
								<td colspan=2>
									<center>
									<input type="text" name="locationsearch" placeholder="Search by ID "/>
									<input type="submit" value="Go!" />
									</center>
								</td>
							</tr>
						</table>
					</form>
					</center>
		</fieldset>
<?php
	if (isset($_POST['location_search']) && isset ($_POST['locationsearch']))
	{
		if ($_POST['location_search'] == 'id')
		{
			$query='SELECT * FROM item, location, complaint WHERE item.location_id='.$_POST['locationsearch'].' AND location.location_id='.$_POST['locationsearch'].' AND complaint.item_id=item.item_id AND item.location_id=location.location_id';
		}
		if (isset($query))
		{
			$sql=mysql_query($query, $conn_id);
		}
		if (isset($sql))
		{
			echo "<fieldset id='location'>
			<legend>Location Details</legend>
			<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Item Id</th>
				<th style='padding: 10px; margin: 10px;'>Item Name</th>
				<th style='padding: 10px; margin: 10px;'>Location Name</th>
				<th style='padding: 10px; margin: 10px;'>Complaint</th>
				<th style='padding: 10px; margin: 10px;'>Complaint Date</th>
				<th style='padding: 10px; margin: 10px;'>Replaced</th>
			</tr>";
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['item_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['location_name'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['complaint'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['complaint_date'].'</td>';
					if ($row['replaced'] == 1)
					{
						echo '<td style="padding: 10px; margin: 10px;">Yes</td>';
					}
					else
					{
						echo '<td style="padding: 10px; margin: 10px;">No</td>';
					}
			}
			echo "</table></fieldset></center>";
		}
	}
	
?>
		<fieldset id='locationdetails' #style='display: none;'>
					<legend>Advance Search</legend>
					
					<form method="POST">
						<table>
							<tr>
								<td><label><input type="radio" name="comp_search" value='id'> Items with Complaints register </label></td>
								<td><input type="submit" value="Go!" /></td>
								
							</tr>
							<tr>
								<td><label><input type="radio" name="c_w_search" value='id'> Items with Complaints under Warranty </label></td>
								<td><input type="submit" value="Go!" /></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="c_n_search" value='id'> Items with Complaints not under Warranty </label></td>
								<td><input type="submit" value="Go!" /></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="c_r_search" value='id'> Items that are Replaced </label></td>
								<td><input type="submit" value="Go!" /></td>
							</tr>
						</table>
					</form>
					
		</fieldset>
<?php
	if (isset($_POST['comp_search']) || isset($_POST['c_w_search'])|| isset($_POST['c_n_search']) || isset($_POST['c_r_search']))
	{
		if (isset($_POST['comp_search']))
		{
			if ($_POST['comp_search'] != '')
			{
				$query='SELECT * FROM item WHERE complaint=1 AND replaced!=1';
			}
		}
		if (isset($_POST['c_w_search']))
		{
			if ($_POST['c_w_search'] != '')
			{
				$query='SELECT * FROM item JOIN hardware on item.item_id = hardware.item_id JOIN complaint ON item.item_id=complaint.item_id WHERE item.complaint=1 AND item.replaced !=1 AND TIMESTAMPDIFF (DAY, complaint.complaint_date , DATE_ADD(item.purchase_date, INTERVAL hardware.warranty_period MONTH))>0';
			}
		}
		if (isset($_POST['c_n_search']))
		{
			if ($_POST['c_n_search'] != '')
			{
				$query='SELECT * FROM item JOIN hardware on item.item_id = hardware.item_id JOIN complaint ON item.item_id=complaint.item_id WHERE item.complaint=1 AND item.replaced !=1 AND TIMESTAMPDIFF (DAY, DATE_ADD(item.purchase_date, INTERVAL hardware.warranty_period MONTH),complaint.complaint_date)>0';
			}
		}
		if (isset($_POST['c_r_search']))
		{
			if (isset($_POST['c_r_search']) != '')
			{
				$query='SELECT * FROM item WHERE replaced=1';
			}
		}
		if (isset($query))
		{
			$sql=mysql_query($query, $conn_id);
		}
		if (isset($sql))
		{
			echo "<fieldset id='Complaints'>
			<legend>Advance Search Result</legend>
			<table>
			<tr>
				<th style='padding: 10px; margin: 10px;'>Item Id</th>
				<th style='padding: 10px; margin: 10px;'>Item Name</th>
			</tr>";
			while ($row=mysql_fetch_array ($sql))
			{
				echo '
				<tr>
					<td style="padding: 10px; margin: 10px;">'.$row['item_id'].'</td>
					<td style="padding: 10px; margin: 10px;">'.$row['item_name'].'</td>';
			}
			echo "</table></fieldset></center>";
		}
	}
	
?>
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
	
